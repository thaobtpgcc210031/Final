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
                            <a class="dropdown-item" href="infor.php">Profile</a>
                            <a class="dropdown-item" href="my_ticket.php">Cart</a>
                            <t class="dropdown-item" href="cart.php">Checkout</a>
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





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel Information</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            /* Cho phép các item nằm gọn trong nhiều hàng */
            justify-content: space-between;
            /* Chia đều không gian giữa các khách sạn */
        }

        .hotel {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
            width: 30%;
            /* Mỗi khách sạn chiếm 30% bề ngang */
            box-sizing: border-box;
            /* Bao gồm padding và border vào kích thước của phần tử */
        }

        .hotel img {
            border-radius: 8px;
            width: 100%;
            max-width: 100%;
            margin-bottom: 15px;
        }

        .hotel h2 {
            font-size: 2rem;
            color: #333;
            margin: 10px 0;
        }

        .hotel p {
            font-size: 1.1rem;
            color: #555;
            margin: 5px 0;
        }

        .hotel p strong {
            font-weight: bold;
            color: #333;
        }

        .amenities {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-top: 15px;
        }

        .amenities p {
            font-size: 1rem;
            color: #333;
        }

        .hotel-contact {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .hotel-contact p {
            margin: 5px 0;
        }

        .hotel-contact a {
            color: #007bff;
            text-decoration: none;
        }

        .hotel-contact a:hover {
            text-decoration: underline;
        }

        .hotel-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff6347;
            margin-top: 15px;
        }

        .hotel-location {
            font-size: 1rem;
            font-style: italic;
            color: #777;
        }

        /* Responsive layout cho các màn hình nhỏ hơn */
        @media screen and (max-width: 900px) {
            .hotel {
                width: 45%;
                /* Trên màn hình nhỏ, mỗi khách sạn chiếm 45% */
            }
        }

        @media screen and (max-width: 600px) {
            .hotel {
                width: 100%;
                /* Trên màn hình rất nhỏ, mỗi khách sạn chiếm 100% */
            }
        }
        </style>
    </head>

    <body>
        <div class="container">
            <?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final1";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn để lấy thông tin khách sạn
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả
if ($result->num_rows > 0) {
    // Lặp qua từng hàng và hiển thị thông tin khách sạn
    while($row = $result->fetch_assoc()) {
        echo "<div class='hotel'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p class='hotel-location'><strong>Location:</strong> " . $row["location"] . "</p>";
        echo "<img src='" . $row["image_url"] . "' alt='Hotel Image'>";
        echo "<p><strong>Price:</strong> $" . $row["price"] . " per night</p>";
        echo "<p><strong>Days:</strong> " . $row["days"] . " days</p>";
        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
        echo "<div class='amenities'><strong>Amenities:</strong><p>" . $row["amenities"] . "</p></div>";
        echo "<div class='hotel-contact'>";
        echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
        echo "<p><strong>Email:</strong> <a href='mailto:" . $row["email"] . "'>" . $row["email"] . "</a></p>";
        echo "</div>";
        echo "<p class='hotel-price'>$" . $row["price"] . " per night</p>";
        echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}

// Đóng kết nối
$conn->close();
?>

        </div>
    </body>ss

    </html>


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