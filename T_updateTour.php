<script src="css/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/style.css">

<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dream Destinations<span>Travel Friendly</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="tours.php" class="nav-link">Tour</a></li>
                    <li class="nav-item"><a href="hotel.php" class="nav-link">Hotel</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php if (isset($_SESSION['Traveller_Name'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo htmlspecialchars($_SESSION['Traveller_Name']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="T_infor.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php
session_start();
include_once('connection.php'); // Connect to the database

// Initialize variables for the form
$tour = null;
$editMode = false;

// Check if there is a TourID in the URL for updating or deleting
if (isset($_GET['TourID'])) {
    $id = intval($_GET['TourID']);
    
    // Check if the action is to delete the tour
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $sql = "DELETE FROM tour WHERE TourID = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('The tour has been successfully deleted.');</script>";
        } else {
            echo "Error: " . $conn->error;
        }
        header("Location: T_manageTour.php");
        exit;
    }

    // Fetch tour details for editing
    $sql = "SELECT * FROM tour WHERE TourID = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc();
        $editMode = true; // Set edit mode if tour exists
    } else {
        echo "<script>alert('No tour found with ID: $id');</script>";
    }
}

// Handle form submission for adding or updating a tour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tour_name = $_POST['Tour_Name'];
    $location = $_POST['Location'];
    $date_start = $_POST['Date_start'];
    $date_end = $_POST['Date_end'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $features = $_POST['Features'];

    // Check if there is a TourID to determine if we are updating
    if (isset($_POST['TourID']) && $_POST['TourID'] != '') { // Update existing tour
        $id = intval($_POST['TourID']);
        $sql = "UPDATE tour SET 
            Tour_Name = '$tour_name',
            Location = '$location',
            Date_start = '$date_start',
            Date_end = '$date_end',
            Price = $price,
            Description = '$description',
            Features = '$features' 
            WHERE TourID = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Tour updated successfully.');</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else { // Add new tour
        $sql = "INSERT INTO tour (Tour_Name, Location, Date_start, Date_end, Price, Description, Features) 
                VALUES ('$tour_name', '$location', '$date_start', '$date_end', $price, '$description', '$features')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New tour added successfully.');</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    header("Location: T_manageTour.php");
    exit;
}
?>

<div class="container">
    <h2><?php echo $editMode ? 'Update Tour' : 'Add New Tour'; ?></h2>
    <form action="" method="post">
        <input type="hidden" name="TourID" value="<?php echo $editMode ? htmlspecialchars($tour['TourID']) : ''; ?>">
        <div class="form-group">
            <label for="Tour_Name">Tour Name:</label>
            <input type="text" name="Tour_Name" id="Tour_Name" required
                value="<?php echo $editMode ? htmlspecialchars($tour['Tour_Name']) : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Location">Location:</label>
            <input type="text" name="Location" id="Location" required
                value="<?php echo $editMode ? htmlspecialchars($tour['Location']) : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Date_start">Start Date:</label>
            <input type="date" name="Date_start" id="Date_start" required
                value="<?php echo $editMode ? htmlspecialchars($tour['Date_start']) : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Date_end">End Date:</label>
            <input type="date" name="Date_end" id="Date_end" required
                value="<?php echo $editMode ? htmlspecialchars($tour['Date_end']) : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Price">Price (VND):</label>
            <input type="number" name="Price" id="Price" required
                value="<?php echo $editMode ? htmlspecialchars($tour['Price']) : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Description">Description:</label>
            <textarea name="Description" id="Description"
                required><?php echo $editMode ? htmlspecialchars($tour['Description']) : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="Features">Features:</label>
            <textarea name="Features" id="Features"
                required><?php echo $editMode ? htmlspecialchars($tour['Features']) : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $editMode ? 'Update' : 'Add'; ?></button>
        <a href="T_manageTour.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/main.js"></script>
<style>
/* Nền đen và chữ trắng cho toàn trang */
body {
    background-color: #000;
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

/* Căn chỉnh phần container */
.container {
    margin-top: 3cm;
    /* Đưa container xuống 3cm */
    background-color: #222;
    /* Nền xám đậm cho container */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
}

/* Tiêu đề của form */
.container h2 {
    text-align: center;
    color: #fff;
    font-weight: 600;
    margin-bottom: 20px;
}

/* Căn chỉnh nhãn (label) */
.form-group label {
    color: #ddd;
    font-weight: 500;
    display: block;
    margin-bottom: 8px;
}

/* Căn chỉnh input và textarea */
.form-group input[type="text"],
.form-group input[type="date"],
.form-group input[type="number"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    background-color: #333;
    border: 1px solid #555;
    border-radius: 5px;
    color: #fff;
    margin-bottom: 15px;
}

/* Style cho nút bấm */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: #fff;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    margin-right: 10px;
}

.btn:hover {
    opacity: 0.9;
}

/* Dropdown */
.dropdown-menu {
    background-color: #333;
    border: none;
}

.dropdown-item {
    color: #fff;
}

.dropdown-item:hover {
    background-color: #555;
    color: #fff;
}
</style>