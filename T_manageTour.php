<?php
session_start();
include_once("connection.php");
$sql = "SELECT tour.TourID, tour.Date_start, tour.Date_end, tourguide.Tourguide_name, tour.Price, tour.Description, tour.Location, tour.Image
        FROM tour
        JOIN tourguide ON tour.Tourguide_ID = tourguide.Tourguide_ID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dream Destinations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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

    <link rel=" stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
.tour-results {
    margin: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.tour-results h3 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
}

.tour-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    /* Chia thành 3 cột */
    gap: 20px;
    /* Khoảng cách giữa các mục */
}

.tour-item {
    padding: 15px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.tour-item h4 {
    margin: 0;
    font-size: 20px;
    color: #007bff;
}

.tour-item p {
    margin: 5px 0;
    color: #555;
}

.tour-item p.price {
    font-weight: bold;
    color: #28a745;
}

.tour-item p.location,
.tour-item p.date-start,
.tour-item p.date-end {
    font-style: italic;
}

/* Đảm bảo rằng lưới hoạt động trên màn hình nhỏ hơn */
@media (max-width: 1200px) {
    .tour-grid {
        grid-template-columns: repeat(2, 1fr);
        /* 2 cột cho màn hình nhỏ hơn */
    }
}

@media (max-width: 768px) {
    .tour-grid {
        grid-template-columns: 1fr;
        /* 1 cột cho màn hình nhỏ nhất */
    }
}

/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.ftco-section {
    padding: 40px 0;
    background: #fff;
}

.heading-section {
    margin-bottom: 20px;
}

.subheading {
    color: #f47c3c;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 10px;
}

h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Tours Grid */
.tours-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    /* Đảm bảo có đúng 4 cột */
    gap: 20px;
    justify-content: center;
    align-items: stretch;
    /* Đảm bảo các ô đều chiều cao */
    padding: 0 15px;
}

/* Tour Item */
.tour-item {
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    padding: 10px;
    height: 100%;
    /* Đảm bảo chiều cao của mỗi ô tour là bằng nhau */
    display: flex;
    flex-direction: column;
}

.tour-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

/* Tour Image */
.tour-item img {
    width: 100%;
    height: 160px;
    /* Giảm chiều cao hình ảnh */
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

/* Tour Content */
.tour-content {
    flex: 1;
    /* Đảm bảo nội dung chiếm hết chiều cao còn lại */
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.tour-content h3 {
    font-size: 16px;
    /* Giảm kích thước tiêu đề */
    margin: 0 0 10px;
    color: #333;
    line-height: 1.3;
}

.tour-content p {
    margin: 5px 0;
    font-size: 12px;
    /* Giảm kích thước văn bản */
    color: #666;
}

.tour-content .full-booked {
    color: red;
    font-weight: bold;
    font-size: 12px;
}

.tour-content .tour-buttons {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.tour-content .tour-buttons button {
    flex: 1;
    padding: 8px;
    /* Giảm padding của nút */
    border: none;
    border-radius: 5px;
    background-color: #f47c3c;
    color: #fff;
    font-size: 12px;
    /* Giảm kích thước nút */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tour-content .tour-buttons button:hover {
    background-color: #e36a29;
}
</style>
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dream Destinations<span>Travel Friendly</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="indexT.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="T_manageTour.php" class="nav-link">Manage Tour</a></li>
                    <li class="nav-item"><a href="T_tours.php" class="nav-link">Tour</a></li>
                    <li class="nav-item"><a href="check_ticket.php" class="nav-link">Check Ticket</a></li>
                    <li class="nav-item"><a href="T_assigned.php" class="nav-link">Assigned</a></li>
                    <li class="nav-item"><a href="T_contact.php" class="nav-link">Contact</a></li>
                    <?php if (isset($_SESSION['Tourguide_name'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo htmlspecialchars($_SESSION['Tourguide_name']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="infor.php">Profile</a>
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





    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">

                    <h1 class="mb-4">Discover Your Favorite Place with Us</h1>
                    <p class="caps">Travel to the any corner of the world, without going around in circles</p>
                </div>
                <!-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
					<span class="fa fa-play"></span>
				</a> -->
                <video height="300px" width="400px" src="images/Vietnam.mp4" type="video/mp4" autoplay muted
                    loop></video>
            </div>
        </div>
    </div>
    <style>
    /* Cải thiện kiểu dáng cho bảng */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Bóng đổ cho bảng */
    }

    /* Cải thiện kiểu dáng cho tiêu đề */
    .table th {
        padding: 10px 1cm;
        background-color: #4CAF50;
        /* Màu nền tiêu đề */
        color: white;
        font-weight: bold;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }

    /* Cải thiện kiểu dáng cho các ô dữ liệu */
    .table td {
        padding: 10px 1cm;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Thêm hiệu ứng hover cho các hàng */
    .table tr:hover {
        background-color: rgb(49, 95, 65);
        /* Màu nền khi di chuột qua hàng */
        cursor: pointer;
    }

    /* Cải thiện viền của các ô */
    .table th,
    .table td {
        border: 1px solid #ddd;
        border-radius: 5px;
        /* Làm mềm các góc */
    }


    /* Cải thiện giao diện nút (Add, Update, Delete) */
    .btn {
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
        /* Thêm hiệu ứng chuyển màu */
    }

    /* Màu nút thêm tour */
    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    /* Màu nút cập nhật tour */
    .btn-warning {
        background-color: rgb(94, 87, 67);
        color: white;
    }

    .btn-warning:hover {
        background-color: rgb(7, 7, 7);
    }

    /* Màu nút xóa tour */
    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Cải thiện bảng khi không có dữ liệu */
    .table tbody tr td {
        text-align: center;
        color: #888;
    }
    </style>
    <?php
include_once('connection.php'); // Connect to the database


// Process add or update tour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tour_name = $_POST['Tour_Name'];
    $location = $_POST['Location'];
    $date_start = $_POST['Date_start'];
    $date_end = $_POST['Date_end'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $features = $_POST['Features'];

    try {
        // Check if TourID is set for updating
        if (!empty($_POST['TourID'])) { // Update tour
            $id = intval($_POST['TourID']);
            $stmt = $conn->prepare("UPDATE tour SET 
                Tour_Name = ?, 
                Location = ?, 
                Date_start = ?, 
                Date_end = ?, 
                Price = ?, 
                Description = ?, 
                Features = ? 
                WHERE TourID = ?");
            $stmt->bind_param("ssssissi", $tour_name, $location, $date_start, $date_end, $price, $description, $features, $id);
            if ($stmt->execute()) {
                echo "Tour updated successfully.";
            } else {
                throw new Exception("Error updating tour: " . $stmt->error);
            }
            $stmt->close();
        } else { // Add a new tour
            $stmt = $conn->prepare("INSERT INTO tour (Tour_Name, Location, Date_start, Date_end, Price, Description, Features) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssiss", $tour_name, $location, $date_start, $date_end, $price, $description, $features);
            if ($stmt->execute()) {
                echo "New tour added successfully.";
            } else {
                throw new Exception("Error adding tour: " . $stmt->error);
            }
            $stmt->close();
        }
        header("Location: T_manageTour.php");
        exit;
    } catch (Exception $e) {
        echo "Failed to process the request: " . $e->getMessage();
    }
}

// Fetch all tours
$sql = "SELECT * FROM tour";
$result = $conn->query($sql);
?>

    <h2>Tour List</h2>

    <a href="add_tour.php" class="btn btn-success">Add New Tour</a> <!-- Button to add tour -->

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tour Name</th>
                <th>Location</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Price</th>
                <th>Description</th>
                <th>Features</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row["TourID"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Tour_Name"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Location"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Date_start"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Date_end"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Price"]) . ' $</td>';
                echo '<td>' . htmlspecialchars($row["Description"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["Features"]) . '</td>';
                echo '<td>
                    <a href="T_updateTour.php?TourID=' . htmlspecialchars($row["TourID"]) . '" class="btn btn-warning">
                        Update
                    </a>
                  </td>';
                echo '<td>
                    <a href="T_deleteTour.php?TourID=' . htmlspecialchars($row["TourID"]) . '" 
                       onclick="return confirm(\'Are you sure you want to delete this tour?\');" 
                       class="btn btn-danger">
                        Delete
                    </a>
                  </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>
                <td colspan="10">No tours available.</td>
            </tr>';
        }
        ?>
        </tbody>
    </table>








    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far away, beyond the mountains of words, far from the lands of Sound and Rhyme, there
                            dwell
                            the silent letters.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Infromation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Tour</a></li>
                            <li><a href="#" class="py-2 d-block">Hotel</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Place</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Ho Chi Minh</a></li>
                            <li><a href="#" class="py-2 d-block">Da Nang</a></li>
                            <li><a href="#" class="py-2 d-block">Ha Noi</a></li>
                            <li><a href="#" class="py-2 d-block">Hoi An</a></li>
                            <li><a href="#" class="py-2 d-block">Can Tho</a></li>
                            <li><a href="#" class="py-2 d-block">Kien Giang</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">26, Pham Ngoc
                                        Thach,
                                        Thi Tran Tan Hiep, huyen Tan Hiep, tinh Kien Giang, Viet Nam
                                    </span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span
                                            class="text">+84522120895</span></a>
                                </li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text">buitha29012003@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>