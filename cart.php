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
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            <a class="dropdown-item" href="cart.php">Cart</a>
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
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        font-family: 'Poppins', sans-serif;
        background-color: #f9f9f9;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    table th {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        text-align: center;
        margin: 20px 0;
        color: #333;
    }

    table td:last-child {
        text-align: right;
        font-weight: bold;
        color: #007bff;
    }

    table td a {
        text-decoration: none;
        color: #007bff;
        font-weight: 600;
    }

    table td a:hover {
        text-decoration: underline;
    }
    </style>


    <?php
    // Giả sử bạn đã lưu Traveller_ID trong phiên làm việc sau khi đăng nhập
    $traveller_id = $_SESSION['Traveller_ID'];

    // Truy vấn dữ liệu vé
    $sql = "SELECT t.Ticket_ID, t.TourID, t.Date_booking, t.Payed, t.Max_Tickets, t.Total_Amount, tour.Tour_Name
            FROM ticket t
            JOIN tour ON t.TourID = tour.TourID
            WHERE t.Traveller_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $traveller_id);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <h1 class="page-title">MANAGE YOUR TICKETS</h1>

    <table border="1">
        <tr>
            <th>Ticket IDID</th>
            <th>Tour NameName</th>
            <th>Date Booking</th>
            <th>Status PaidPaid</th>
            <th>Quantity of Ticketet</th>
            <th>Total MoneyMoney</th>
            <th>ActionAction</th>
        </tr>
        <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Ticket_ID"] . "</td>
                    <td><a href='tour_detail.php?TourID=" . $row['TourID'] . "'>" . $row['Tour_Name'] . "</a></td>
                    <td>" . $row["Date_booking"] . "</td>
                    <td>" . ($row["Payed"] == '1' ? 'Paid' : 'Unpaid') . "</td>
                    <td>" . $row["Max_Tickets"] . "</td>
                    <td>" . number_format($row["Total_Amount"], 2) . " $</td>";

            // Thêm nút "Thanh toán" nếu chưa thanh toán
            if ($row["Payed"] == '0') {
                echo "<td>
                        <form method='POST' action='update_payment.php'>
                            <input type='hidden' name='ticket_id' value='" . $row["Ticket_ID"] . "'>
                            <button type='submit' class='btn btn-primary'>Pay</button>
                        </form>
                    </td>";
            } else {
                echo "<td>Paid</td>";
            }

            // Thêm nút "Xóa"
            echo "<td>
                    <form method='POST' action='delete_ticket.php' onsubmit='return confirm(\"Are you sure you want to delete this ticket?\");'>
                        <input type='hidden' name='ticket_id' value='" . $row["Ticket_ID"] . "'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                  </td>";

            echo "</tr>";
        }
    } else {
        echo "<tr>
            <td colspan='7'>No tickets available.</td>
        </tr>";
    }
    ?>
    </table>


    <?php
    // Lấy danh sách tour mà hướng dẫn viên được giao nhiệm vụ
    if (isset($_SESSION['Tourguide_ID'])) {
        $tourguide_id = $_SESSION['Tourguide_ID']; // Giả sử bạn đã lưu ID của hướng dẫn viên trong session
        $sql = "SELECT * FROM tour WHERE Tourguide_ID = '$tourguide_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID Tour</th>
                        <th>Tour NameName</th>
                        <th>Start DateDate</th>
                        <th>End DateDate</th>
                        <th>PricePrice</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['TourID'] . "</td>
                        <td>" . $row['Tour_Name'] . "</td>
                        <td>" . $row['Date_start'] . "</td>
                        <td>" . $row['Date_end'] . "</td>
                        <td>" . $row['Price'] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No tour has been assigned to you.</p>";
        }
    }
    // Đóng kết nối
    $conn->close();
    ?>

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