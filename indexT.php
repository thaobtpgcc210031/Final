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
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="T_manageTour.php" class="nav-link">Manage Tour</a></li>
                    <li class="nav-item"><a href="T_tours.php" class="nav-link">Tour</a></li>
                    <li class="nav-item"><a href="check_ticket.php" class="nav-link">Check Ticket</a></li>
                    <li class="nav-item"><a href="T_assigned.php" class="nav-link">Assigned</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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
    <?php
// Include the connection script
include_once('connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$location = isset($_GET['location']) ? $_GET['location'] : '';
$date_start = isset($_GET['date_start']) ? $_GET['date_start'] : '';
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] : '';
$tour_name = isset($_GET['tour_name']) ? $_GET['tour_name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// Initialize result variable
$result = null;

// Prepare SQL query only if there are search criteria
if ($location || $date_start || $date_end || $tour_name || $price) {
    // Prepare SQL query
    $sql = "SELECT * FROM tour WHERE 1=1";

    // Apply filters if they are provided
    if ($location) {
        $sql .= " AND Location LIKE '%" . $conn->real_escape_string($location) . "%'";
    }

    if ($date_start) {
        $sql .= " AND Date_start >= '" . $conn->real_escape_string($date_start) . "'";
    }

    if ($date_end) {
        $sql .= " AND Date_end <= '" . $conn->real_escape_string($date_end) . "'";
    }

    if ($tour_name) {
        $sql .= " AND Tour_Name LIKE '%" . $conn->real_escape_string($tour_name) . "%'";
    }

    if ($price) {
        $sql .= " AND Price <= " . $conn->real_escape_string($price); // Assuming you want <= for price
    }

    // Execute SQL query
    $result = $conn->query($sql);
}
?>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Search Tour</a>

                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab">
                                        <form action="" method="GET" class="search-property-1">
                                            <div class="row no-gutters">
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="tour_name">Name</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span></div>
                                                            <input type="text" name="tour_name" id="tour_name"
                                                                class="form-control" placeholder="Tour Name"
                                                                value="<?php echo htmlspecialchars($tour_name); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="date_start">Date Start</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                                            <input type="date" name="date_start" id="date_start"
                                                                class="form-control" placeholder="Date Start"
                                                                value="<?php echo htmlspecialchars($date_start); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="date_end">Date End</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                                            <input type="date" name="date_end" id="date_end"
                                                                class="form-control" placeholder="Date End"
                                                                value="<?php echo htmlspecialchars($date_end); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="price">Price</label>
                                                        <div class="form-field">
                                                            <input type="number" name="price" id="price"
                                                                class="form-control" placeholder="Price"
                                                                value="<?php echo htmlspecialchars($price); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="location">Location</label>
                                                        <div class="form-field">
                                                            <input type="text" name="location" id="location"
                                                                class="form-control" placeholder="Location"
                                                                value="<?php echo htmlspecialchars($location); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <input type="submit" value="Search"
                                                                class="align-self-stretch form-control btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    \
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                    .price {
                        font-size: 20px;
                        color: #EE6363;
                    }
                    </style>

                    <!-- Display Tours -->
                    <div class="tour-results">
                        <?php if ($result && $result->num_rows > 0): ?>
                        <h3>Available Tours</h3>
                        <div class="tour-grid">
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="tour-item">
                                <h4>Tour Name: <?php echo htmlspecialchars($row["Tour_Name"]); ?></h4>
                                <p>Location: <?php echo htmlspecialchars($row["Location"]); ?></p>
                                <p>Start Date: <?php echo htmlspecialchars($row["Date_start"]); ?></p>
                                <p>End Date: <?php echo htmlspecialchars($row["Date_end"]); ?></p>
                                <p class="price">Price: <?php echo htmlspecialchars($row["Price"]); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                        <path
                                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                                    </svg>
                                </p>

                                <a href="T_tour_detail.php?TourID=<?php echo urlencode($row['TourID']); ?>"
                                    class="btn btn-primary">View Details</a>

                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php else: ?>
                        <p>No tours found.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>



    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">

                        <h2 class="mb-4">IWelcome to Destination Travel</h2>
                        <p>Discover a hidden paradise where stunning landscapes meet unforgettable experiences. This
                            enchanting destination is filled with opportunities for exploration and relaxation.</p>
                        <p>Far away from the mundane, nestled between majestic mountains, lies a unique realm filled
                            with vibrant cultures and breathtaking views. Join us on a journey that promises to create
                            lasting memories, with personalized tours designed just for you.</p>
                        <p>A gentle river flows through this paradise, bringing life and beauty to every corner of your
                            adventure. Book your tour today and let the journey begin!</p>

                        <p><a href="#" class="btn btn-primary py-3 px-4">Search Tour</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(images/services-1.jpg);">
                                <div class="media-body">
                                    <h3 class="heading mb-3">Activities</h3>
                                    <p>Explore a variety of exciting activities tailored to your interests, ensuring a
                                        memorable experience.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(images/services-2.jpg);">
                                <div class="media-body">
                                    <h3 class="heading mb-3">Hotel & Restaurant</h3>
                                    <p>Enjoy comfortable accommodations and delicious dining options that enhance your
                                        journey.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(images/services-3.jpg);">

                                <div class="media-body">
                                    <h3 class="heading mb-3">Vehicle</h3>
                                    <p>Choose from a range of transportation options to make your travel seamless and
                                        convenient.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php
include_once("connection.php");
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy thông tin các tour và một hình ảnh ngẫu nhiên
$sql = "
    SELECT t.TourID, t.Tour_Name, t.Description, t.Location, t.Price, t.Date_start, t.Date_end, t.Max_Tickets,
           COUNT(k.Ticket_ID) AS Tickets_Booked, 
           (SELECT image_url FROM tour_images WHERE tour_id = t.TourID ORDER BY RAND() LIMIT 1) AS image_url
    FROM tour t
    LEFT JOIN ticket k ON t.TourID = k.TourID AND k.Payed = '1'  -- Chỉ đếm những vé đã thanh toán (Payed = '1')
    GROUP BY t.TourID
    ORDER BY t.TourID
";

$result = $conn->query($sql);
?>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destination</span>
                    <h2 class="mb-4">Tour Listings</h2>
                </div>
            </div>
            <div class="tours-grid">
                <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="tour-item">';
                    echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="Tour Image">';
                    echo '<div class="tour-content">';
                    echo '<h3>' . htmlspecialchars($row['Tour_Name']) . '</h3>';
                    echo '<p><strong>LocationLocation:</strong> ' . htmlspecialchars($row['Location']) . '</p>';
                    echo '<p><strong>Price:</strong> ' . number_format($row['Price'], 0, ',', '.') . ' $</p>';
                    echo '<p><strong>BookedBooked:</strong> ' . htmlspecialchars($row['Tickets_Booked']) . ' / ' . htmlspecialchars($row['Max_Tickets']) . ' Ticket</p>';
                    echo '<p><strong>DateDate:</strong> ' . htmlspecialchars($row['Date_start']) . ' - ' . htmlspecialchars($row['Date_end']) . '</p>';

                    if ((int)$row['Tickets_Booked'] >= (int)$row['Max_Tickets']) {
                        echo '<p class="full-booked">This tour is sold out.</p>';
                    }

                    echo '<div class="tour-buttons">';
                
                    echo '<button onclick="window.location.href=\'T_tour_detail.php?TourID=' . $row['TourID'] . '\'">View Detail</button>';
                    echo '</div>';
                    echo '</div>'; // Đóng div "tour-content"
                    echo '</div>'; // Đóng div "tour-item"
                }
            } else {
                echo '<p>There are no tours to display.</p>';
            }
            $conn->close();
            ?>
            </div>
        </div>
    </section>






    <!-- Modal HTML -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <!-- Content for modal will be dynamically loaded here -->
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
    var modal = document.getElementById("myModal");
    var modalBody = document.querySelector(".modal-body");
    var span = document.getElementsByClassName("close")[0];

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    span.onclick = function() {
        closeModal();
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }

    function loadModalContent(tourID) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'detail.php?TourID=' + tourID, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                modalBody.innerHTML = response;
                openModal();
            } else {
                console.error('Failed to load content');
            }
        };
        xhr.send();
    }

    document.querySelectorAll('.view-details').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var tourID = this.getAttribute('data-tour-id');
            loadModalContent(tourID);
        });
    });
    </script>




    <section class="ftco-section ftco-about img" style="background-image: url(images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container py-md-5">
            <div class="row py-md-5">
                <div class="col-md d-flex align-items-center justify-content-center">
                    <a href="https://vimeo.com/45830194"
                        class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                        <span class="fa fa-play"></span>

                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about ftco-no-pt img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center"
                                style="background-image:url(images/about-1.jpg);">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">About Us</span>
                                    <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                                        right at the coast of the Semantics, a large language ocean.</p>
                                    <p><a href="#" class="btn btn-primary">Book Your Tour</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-intro ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url(images/bg_2.jpg);">
                        <div class="overlay"></div>
                        <h2>We Are Pacific A Travel Agency</h2>
                        <p>We can manage your dream building A small river named Duden flows by their place</p>
                        <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far away, beyond the mountains of words, far from the lands of Sound and Rhyme, there dwell
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