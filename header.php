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


    </div>







    <?php
session_start(); // Khởi động phiên để sử dụng biến $_SESSION
include_once('connection.php');

// Lấy danh sách tour mà hướng dẫn viên được giao nhiệm vụ
if (isset($_SESSION['Tourguide_ID'])) {
    $tourguide_id = $_SESSION['Tourguide_ID']; // Giả sử bạn đã lưu ID của hướng dẫn viên trong session
    $sql = "SELECT * FROM tour WHERE Tourguide_ID = '$tourguide_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID Tour</th>
                    <th>Tên Tour</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Giá</th>
                </tr>";
        // Hiển thị dữ liệu của các tour
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
        echo "<p>Không có tour nào được giao cho bạn.</p>";
    }
} else {
    echo "<p>Vui lòng đăng nhập để xem thông tin tour.</p>";
}

// Đóng kết nối
$conn->close();
?>

    <script src="js/jquery.min.js">
    </script>
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