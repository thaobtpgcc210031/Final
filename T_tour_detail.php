<?php
// Kết nối cơ sở dữ liệu
include_once 'connection.php';

// Lấy giá trị TourID từ URL nếu có
$tour_id = isset($_GET['TourID']) ? intval($_GET['TourID']) : null;

if (empty($tour_id)) {
    echo "Tour ID does not exist.";
    exit; // Dừng lại nếu không có TourID
}

// Truy vấn lấy thông tin tour dựa vào TourID
$sql = "SELECT * FROM tour WHERE TourID = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    // Nếu không thể chuẩn bị truy vấn, in ra lỗi
    die('Query preparation error:' . $conn->error);
}

$stmt->bind_param("i", $tour_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Tour not found.";
    exit; // Dừng lại nếu không tìm thấy tour nào
}

$tour = $result->fetch_assoc();
$stmt->close();

// Truy vấn lấy danh sách hình ảnh dựa vào TourID từ bảng tour_images
$sql_images = "SELECT image_url FROM tour_images WHERE tour_id = ?";
$stmt_images = $conn->prepare($sql_images);

if ($stmt_images === false) {
die('Error preparing image query: ' . $conn->error);
}

$stmt_images->bind_param("i", $tour_id);
$stmt_images->execute();
$result_images = $stmt_images->get_result();

$images = [];
while ($row = $result_images->fetch_assoc()) {
    $images[] = $row['image_url'];
}

$stmt_images->close();

// Truy vấn lấy lịch trình
$sql_dates = "SELECT Date_start, Date_end FROM tour WHERE TourID = ?";
$stmt_dates = $conn->prepare($sql_dates);

if ($stmt_dates === false) {
die('Error preparing query to get schedule: ' . $conn->error);}

$stmt_dates->bind_param("i", $tour_id);
$stmt_dates->execute();
$result_dates = $stmt_dates->get_result();

$during_tour = [];
while ($row = $result_dates->fetch_assoc()) {
    $during_tour[] = $row;
}

$stmt_dates->close();
$conn->close();

// Nếu không lấy được dữ liệu từ cơ sở dữ liệu
if (!$tour) {
echo "Invalid tour data.";
    exit;
}




?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tour: <?php echo htmlspecialchars($tour['Tour_Name']); ?></title>



</head>
<style>
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    color: #333;
    background: rgba(255, 255, 255, 0.9);
}

.video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    /* Send the video to the background */
}



.tour-details-container {
    display: flex;
    justify-content: center;
    /* Căn giữa các phần tử con */
    max-width: 1800px;
    width: 100%;
    margin: 30px auto;
    padding-top: 100px;
}

.tour-container {
    width: 100%;
    /* Đặt chiều rộng cho form tour */
    max-width: 1400px;
    /* Chiều rộng tối đa */
    background: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    box-shadow: 0 0 75px rgba(0, 0, 0, 0.1);
    padding: 100px;
    color: black;
    margin: 0 auto;
    /* Căn giữa container */
}





.tour-name {
    font-size: 1.8em;
    font-weight: bold;
    margin-bottom: 10px;
    color: #007bff;
    /* Primary color */
}

.tour-description {
    margin-bottom: 15px;
    font-size: 1.1em;
}

.tour-price {
    font-size: 1.5em;
    color: #28a745;
    /* Green color for price */
    margin-bottom: 20px;
}

.image-gallery img {
    border-radius: 5px;
    margin: 5px;
}

.carousel-inner img {
    border-radius: 8px;
}

.full-form-container h3 {
    margin-top: 20px;
    color: #007bff;
    /* Primary color */
}

.tour-info {
    margin-bottom: 20px;
}

.tour-info p {
    margin: 5px 0;
}

.booking-section {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
}

.price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.btn-primary {
    background-color: #007bff;
    /* Primary button color */
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    color: white;
    transition: background 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
    /* Darker shade on hover */
}

.form-group label {
    font-weight: bold;
    color: #333;
}

.footer {
    background: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
    position: relative;
}
</style>


<body>

    <!-- Nền video -->
    <video autoplay muted loop class="video-background">
        <source src="images/Ba1.mp4" type="video/mp4">

    </video>
    <?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra trạng thái đăng nhập
$isLoggedIn = isset($_SESSION['Tourguide_name']);
?>
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
                        <li class="nav-item"><a href="T_manageTour.php" class="nav-link">Manage Tour</a></li>
                        <li class="nav-item"><a href="tours.php" class="nav-link">Tour</a></li>
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

    <div class="tour-details-container">

        <!-- Tour details -->
        <div class="tour-container">
            <div class="tour-name">
                <?php echo isset($tour['Tour_Name']) ? htmlspecialchars($tour['Tour_Name']) : 'No namer'; ?>
            </div>
            <div class="tour-description">
                <?php echo isset($tour['Description']) ? htmlspecialchars($tour['Description']) : 'No Description'; ?>
            </div>
            <div class="tour-price">
                <?php echo isset($tour['Price']) && $tour['Price'] > 0 ? number_format($tour['Price'], 0, ',', '.') . ' $' : 'Liên hệ'; ?>
            </div>


            <!-- Hiển thị hình ảnh của tour -->
            <div class="image-gallery">
                <!-- Hiển thị hình ảnh của tour với carousel -->
                <div id="tourCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
        $active_class = 'active'; // Lớp cho slide đầu tiên
        foreach ($images as $index => $image) {
            echo '<div class="carousel-item ' . $active_class . '">';
            echo '<img src="' . htmlspecialchars($image) . '" class="d-block w-100" alt="Image of tour">';
            echo '</div>';
            $active_class = ''; // Sau slide đầu tiên không còn lớp active
        }
        ?>
                    </div>
                    <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Hình ảnh thu nhỏ dưới carousel -->
                <div class="image-gallery mt-3">
                    <div class="row">
                        <?php
        foreach ($images as $index => $image) {
            echo '<div class="col-4">';
            echo '<img src="' . htmlspecialchars($image) . '" class="img-thumbnail" alt="Image small" onclick="showSlide(' . $index . ')">';
            echo '</div>';
        }
        ?>
                    </div>
                </div>
                <!-- Chèn thông tin tour ở đây -->
                <div class="full-form-container">
                    <h3>
                        <p><?php echo htmlspecialchars($tour['Tour_Name']); ?></p>
                    </h3>
                    <div class="tour-info">
                        <p><strong>Date Start:</strong> <?php echo htmlspecialchars($tour['Date_start']); ?></p>
                        <p><strong>Date End:</strong> <?php echo htmlspecialchars($tour['Date_end']); ?></p>
                        <p><strong>Price:</strong>
                            <?php 
        echo !empty($tour['Price']) ? number_format($tour['Price'], 0, ',', '.') . ' $' : 'Price not available'; 
        ?>
                        </p>
                        <p><strong>Discription:</strong> </p>
                        <p><?php echo nl2br(htmlspecialchars($tour['Description'])); ?></p>
                        <p><strong>Location:</strong> </p>
                        <?php echo htmlspecialchars($tour['Location']); ?></p>
                        <p><strong>Features</strong> <?php echo nl2br(htmlspecialchars($tour['Features'])); ?>
                        </p>
                    </div>

                    <div class="form-row">

                        <div class="image-gallery">

                        </div>
                    </div>

                    <div class="col-xs-12 tourHeaderContent panel-detail" id="detail-visainfo">
                        <div class="bordered-container">
                            <div class="col-xs-12 no-padding tourDetailContainer">
                                <div class="col-xs-12 no-padding tourDetailMainDiv">
                                    <div class="col-xs-12 no-padding" id="tour-visainfo">
                                        <h3 class="tourDetailheadLine">Departure schedule</h3>
                                        <div class="search-date">
                                            <label readonly type="text"
                                                class="form-control date-input dates-date btn-general"
                                                id="DepartureField">
                                                <span class="icon ico-ic_date"></span>
                                                <span class="DepartureText" id="DepartureText">
                                                    <?php echo htmlspecialchars($tour['Date_start']); ?>
                                                </span>
                                            </label>
                                            <input type="hidden" class="Getdeparture" value="">
                                        </div>
                                    </div>
                                    <div class="row title-form">
                                        <div class="col-xs-4 col-sm-3 date-mobile item-m">Date Start</div>
                                        <div class="col-xs-4 col-sm-3">
                                            <?php echo htmlspecialchars($tour['Date_start']); ?>
                                        </div>
                                        <div class="col-xs-4 col-sm-3 hidden-xs">Date end</div>
                                        <div class="col-xs-4 col-sm-3">
                                            <?php echo htmlspecialchars($tour['Date_end']); ?>
                                        </div>
                                    </div>
                                    <div class="row title-form">
                                        <div class="col-xs-4 col-sm-3 hidden-xs">Price:</div>
                                        <div class="col-xs-4 col-sm-3">
                                            <?php echo htmlspecialchars($tour['Price']); ?>
                                        </div>
                                    </div>
                                    <div class="loader" style="display: none;">Loading...</div>
                                    <div class="list-calendar-departure">
                                        <div class="panel-group" id="accordion" role="tablist"
                                            aria-multiselectable="true">
                                            <a href="#" id="loadMore" class="loadMore-departure hidden">
                                                Xem thêm <div class="fa fa-angle-down"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>




                <div class="col-xs-12 tourHeaderContent panel-detail" id="detail-visainfo">

                    <div class="col-xs-12 no-padding tourDetailContainer">
                        <div class="col-xs-12 no-padding tourDetailMainDiv">
                            <div class="col-xs-12 no-padding" id="tour-visainfo">
                                <h3 class="tourDetailheadLine">
                                    Essentials when traveling
                                </h3>
                                <div class="col-xs-12 tourScheduleContainer">
                                    <div class="tourSchedule">
                                        <p>When traveling, you need to prepare some important information to have a
                                            smooth and safe trip. Here is the necessary information:&nbsp;</p>
                                        <p>- ID card or CCCD (if traveling domestically).</p>
                                        <p>- Check the trip information and refund and exchange policies.</p>
                                        <p>- Print or save the reservation information and hotel address.</p>
                                        <p>- Bring necessary medicines, especially if you have a medical condition.
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 tourHeaderContent panel-detail" id="detail-tourguide">
                    <div class="col-xs-12 no-padding tourDetailContainer">
                        <div class="col-xs-12 no-padding tourDetailMainDiv">
                            <div class="col-xs-12 no-padding" id="tour-tourguide">
                                <h3 class="tourDetailheadLine vcolor-primary">
                                    <b>TourGuide</b>
                                </h3>
                                <div class="col-xs-12 tourScheduleContainer">
                                    <div class="tourSchedule">
                                        <p>- The Tour Guide will contact you about 2-3 days before departure to
                                            arrange pick-up time and provide necessary information for the trip.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>




            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Feedback</title>
                <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
                <style>
                .container {

                    border-radius: 10px;
                    padding: 20px;
                    margin-top: 40px;
                    /* Giảm từ 50px xuống 40px để đưa lên 1cm */
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                }

                .form-control {
                    border-radius: 6px;
                    width: 100%;
                    /* Đảm bảo chiều rộng 100% */
                }

                .btn-primary {
                    background-color: #007bff;
                    border-color: #007bff;
                    width: 100%;
                    /* Đảm bảo chiều rộng 100% */
                }

                .btn-primary:hover {
                    background-color: #0056b3;
                    border-color: #0056b3;
                }

                h2 {
                    color: #0072ff;
                    text-align: center;
                    /* Căn giữa tiêu đề */
                }

                #chat-container {
                    position: fixed;
                    bottom: 20px;
                    right: 20px;
                }

                #chat-bubble {
                    width: 50px;
                    height: 50px;
                    background-color: #0084ff;
                    color: white;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                }

                #chat-box {
                    width: 300px;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    background-color: white;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    position: relative;
                    display: flex;
                    flex-direction: column;
                }

                #messages {
                    height: 200px;
                    overflow-y: auto;
                    padding: 10px;
                }

                #chat-input {
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    margin: 10px;
                }
                </style>
            </head>

            <body>

                <?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'final1');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}


if (!isset($_SESSION['Tourguide_name']) && !isset($_SESSION['Traveller_name'])) {
    echo "Vui lòng đăng nhập để xem hoặc gửi phản hồi.";
    exit;
}

// Lấy giá trị TourID từ URL
$tour_id = isset($_GET['TourID']) ? intval($_GET['TourID']) : null;

if (empty($tour_id)) {
    echo "Tour ID không tồn tại.";
    exit;
}

// Hiển thị các phản hồi đã gửi cho tour này
$query = "SELECT * FROM feedback WHERE TourID = ? ORDER BY created_at DESC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $tour_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="feedback-history">';
    while ($feedback = mysqli_fetch_assoc($result)) {
        echo '<div class="feedback-details">';
        echo "<p><strong>Traveller Name:</strong> " . htmlspecialchars($feedback['Traveller_Name']) . "</p>";
        echo "<p><strong>Feedback:</strong> " . htmlspecialchars($feedback['Comment']) . "</p>";
        echo "<p><strong>Date Feedback:</strong> " . htmlspecialchars($feedback['created_at']) . "</p>";
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>There are no reviews for this tour yet.</p>';
}

// Kiểm tra xem người dùng có phải là Traveller không để hiển thị form gửi phản hồi
if (isset($_SESSION['Traveller_name'])) {
    // Xử lý form gửi feedback
    if (isset($_POST['submit_feedback'])) {
        $comment = $_POST['comment'];
        $traveller_name = $_SESSION['Traveller_Name'];  // Lấy tên người dùng từ session
        $traveller_id = $_SESSION['Traveller_ID'];  // Lấy ID người dùng từ session

        // Chèn phản hồi vào bảng feedback
        $query = "INSERT INTO feedback (Traveller_ID, Traveller_Name, TourID, Comment) 
                  VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'isis', $traveller_id, $traveller_name, $tour_id, $comment);

            // Thực thi câu lệnh
            if (mysqli_stmt_execute($stmt)) {
                // Lấy thông tin phản hồi vừa chèn
                $feedback_id = mysqli_insert_id($conn); // ID của feedback vừa tạo
                $result = mysqli_query($conn, "SELECT * FROM feedback WHERE Feedback_ID = $feedback_id");
                $feedback = mysqli_fetch_assoc($result);

                // Hiển thị thông tin phản hồi
                echo '<div class="success-message">Cảm ơn bạn đã gửi phản hồi!</div>';
                echo '<div class="feedback-details">';
                echo "<p><strong>Traveller Name:</strong> " . htmlspecialchars($feedback['Traveller_Name']) . "</p>";
                echo "<p><strong>Feedbak:</strong> " . htmlspecialchars($feedback['Comment']) . "</p>";
                echo "<p><strong>Date Feedback:</strong> " . htmlspecialchars($feedback['created_at']) . "</p>";
                echo '</div>';
            } else {
                echo '<div class="error-message">An error occurred. Please try again.</div>';
            }

            // Đóng statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Command preparation error: " . mysqli_error($conn);
        }
    }
} else {
    echo '<div class="error-message">Only Travelers can submit feedback for this tour.</div>';
}
?>

                <div class="container mt-5">


                    <!-- Hiển thị tên người dùng đã đăng nhập -->


                    <!-- Nếu là Traveller thì hiển thị form gửi feedback -->
                    <?php if (isset($_SESSION['Traveller_name'])): ?>
                    <form method="POST" class="mt-4">
                        <div class="form-group">
                            <label for="comment">Your feedback:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4"
                                placeholder="Enter your feedback..." required></textarea>
                        </div>
                        <button type="submit" name="submit_feedback" class="btn btn-primary">Send Feedback</button>
                    </form>
                    <?php endif; ?>
                </div>

                <style>
                /* Cải thiện giao diện của form
                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f9f9f9;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    text-align: center;
                    font-size: 28px;
                    color: #333;
                    margin-bottom: 30px;
                }

                p {
                    font-size: 18px;
                    color: #333;
                    text-align: center;
                    margin-bottom: 20px;
                } */

                .form-group {
                    margin-bottom: 20px;
                }

                label {
                    font-size: 16px;
                    font-weight: bold;
                    color: #555;
                    margin-bottom: 5px;
                    display: block;
                }

                textarea {
                    width: 100%;
                    padding: 15px;
                    font-size: 16px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    resize: vertical;
                    min-height: 150px;
                    background-color: #fff;
                    color: #333;
                }

                textarea:focus {
                    border-color: #007bff;
                    outline: none;
                }

                button {
                    display: inline-block;
                    padding: 10px 20px;
                    font-size: 16px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                button:hover {
                    background-color: #0056b3;
                }

                button:focus {
                    outline: none;
                }

                .success-message {
                    background-color: #d4edda;
                    color: #155724;
                    padding: 15px;
                    border: 1px solid #c3e6cb;
                    border-radius: 5px;
                    margin-top: 20px;
                    text-align: left;
                    /* Căn lề trái */
                }

                .error-message {
                    background-color: #f8d7da;
                    color: #721c24;
                    padding: 15px;
                    border: 1px solid #f5c6cb;
                    border-radius: 5px;
                    margin-top: 20px;
                    text-align: left;
                    /* Căn lề trái */
                }

                /* Phần thông tin phản hồi */
                .feedback-details {
                    background-color: #f0f8ff;
                    padding: 20px;
                    margin-top: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    text-align: left;
                    /* Căn lề trái */
                    width: 100%;
                    /* Đảm bảo thông tin chiếm toàn bộ chiều rộng */
                }

                .feedback-details p {
                    margin-bottom: 10px;
                    font-size: 16px;
                    color: #333;
                    text-align: left;
                    /* Căn lề trái */
                }

                /* Đảm bảo tất cả các thông báo thành công/lỗi và thông tin phản hồi căn lề trái */
                .feedback-details,
                .success-message,
                .error-message {
                    margin-left: 0;
                    /* Đảm bảo không có khoảng cách bên trái */
                }
                </style>


                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                $('#chat-bubble').on('click', function() {
                    $('#chat-box').toggle();
                });
                </script>
            </body>



</html>

</div>
</div>



</div>








<script>
function calculateTotal() {
    var pricePerTicket = <?php echo $tour['Price']; ?>;
    var quantity = document.getElementById("ticketQuantity").value;
    var total = pricePerTicket * quantity;
    document.getElementById("totalPrice").innerText = "Money Total:  " + total.toLocaleString() + " VND";
}

function showSlide(index) {
    $('#tourCarousel').carousel(index);
}
</script>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>
<style>
/* Chat Container */
#chat-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    display: flex;
    flex-direction: column;
}

/* Chat Bubble Button */
#chat-bubble {
    width: 60px;
    height: 60px;
    background-color: #0084ff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

#chat-bubble:hover {
    transform: scale(1.1);
}

/* Chat Box */
#chat-box {
    display: none;
    flex-direction: column;
    width: 350px;
    max-height: 500px;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    position: fixed;
    bottom: 90px;
    right: 20px;
}

/* Messages Section */
#messages {
    flex: 1;
    overflow-y: auto;
    margin-bottom: 15px;
    padding: 10px;
    font-family: Arial, sans-serif;
    color: #333;
}

.message {
    margin-bottom: 12px;
    padding: 10px;
    border-radius: 8px;
    max-width: 80%;
    font-size: 14px;
    word-wrap: break-word;
    line-height: 1.5;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
}

.tourguide-message {
    background-color: #e0f7fa;
    align-self: flex-end;
    text-align: right;
}

.traveller-message {
    background-color: #f1f1f1;
    align-self: flex-start;
    text-align: left;
}

.message .date-chat {
    font-size: 12px;
    color: #888;
    margin-top: 5px;
    display: block;
}

/* Input Section */
#input-wrapper {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

#chat-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 20px;
    font-size: 14px;
    outline: none;
}

#chat-input:focus {
    border-color: #0084ff;
    box-shadow: 0 0 8px rgba(0, 132, 255, 0.4);
}

#send-btn {
    background-color: #0084ff;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 5px 12px;
    font-size: 14px;
    cursor: pointer;
    margin-left: 10px;
    transition: all 0.3s ease;
}

#send-btn:hover {
    background-color: #0072d1;
    transform: scale(1.05);
}

#send-btn:active {
    transform: scale(0.95);
}
</style>
<?php
include_once("connection.php");



// Check login status
$tourguideName = isset($_SESSION['Tourguide_name']) ? $_SESSION['Tourguide_name'] : null;
$tourguideId = isset($_SESSION['Tourguide_ID']) ? intval($_SESSION['Tourguide_ID']) : null;
$tourId = isset($_GET['TourID']) ? intval($_GET['TourID']) : (isset($_SESSION['Tour_ID']) ? intval($_SESSION['Tour_ID']) : null);

if (!$tourguideId || !$tourId) {
    echo "Missing tourguide or tour information!";
    exit;
}

// Fetch travellers
$sqlTravellers = "SELECT DISTINCT t.Traveller_ID, t.Traveller_Name
                  FROM traveller t
                  JOIN chat c ON t.Traveller_ID = c.Traveller_ID
                  WHERE c.TourID = ?";
$stmtTravellers = $conn->prepare($sqlTravellers);
$stmtTravellers->bind_param("i", $tourId);
$stmtTravellers->execute();
$resultTravellers = $stmtTravellers->get_result();

$travellers = [];
while ($row = $resultTravellers->fetch_assoc()) {
    $travellers[] = $row;
}
$stmtTravellers->close();

// Fetch messages
$selectedTravellerId = isset($_GET['Traveller_ID']) ? intval($_GET['Traveller_ID']) : null;
$messages = [];

if ($selectedTravellerId) {
    $sqlMessages = "SELECT c.*, t.Traveller_Name, tg.Tourguide_name
                    FROM chat c
                    LEFT JOIN traveller t ON c.Traveller_ID = t.Traveller_ID
                    LEFT JOIN tourguide tg ON c.Tourguide_ID = tg.Tourguide_ID
                    WHERE c.TourID = ? AND (c.Traveller_ID = ? OR c.Tourguide_ID = ?)
                    ORDER BY c.Date_chat";

    $stmtMessages = $conn->prepare($sqlMessages);
    $stmtMessages->bind_param("iii", $tourId, $selectedTravellerId, $tourguideId);
    $stmtMessages->execute();
    $resultMessages = $stmtMessages->get_result();

    while ($row = $resultMessages->fetch_assoc()) {
        $messages[] = $row;
    }
    $stmtMessages->close();
}

$conn->close();
?>
<div id="chat-container">
    <div id="chat-bubble" onclick="toggleChat()">💬</div>
    <div id="chat-box" style="display: none;">
        <h3>Traveller List</h3>
        <ul>
            <?php foreach ($travellers as $traveller): ?>
            <li>
                <a href="?TourID=<?php echo $tourId; ?>&Traveller_ID=<?php echo $traveller['Traveller_ID']; ?>">
                    <?php echo htmlspecialchars($traveller['Traveller_Name']); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($selectedTravellerId): ?>
        <div id="messages">
            <?php foreach ($messages as $message): ?>
            <div
                class="message <?php echo ($message['type'] == 'tourguide') ? 'tourguide-message' : 'traveller-message'; ?>">
                <strong>
                    <?php 
                        // Hiển thị tên của người gửi dựa trên loại tin nhắn
                        echo htmlspecialchars(
                            $message['type'] == 'tourguide' 
                                ? $message['Tourguide_name'] 
                                : $message['Traveller_Name']
                        );
                    ?>:
                </strong>
                <?php echo htmlspecialchars($message['Content']); ?>
                <span class="date-chat"><?php echo htmlspecialchars($message['Date_chat']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <div id="input-wrapper">
            <input type="text" id="chat-input" placeholder="Enter your message">
            <button id="send-btn">Send</button>
        </div>
        <?php else: ?>
        <p>Select a traveller to start chatting.</p>
        <?php endif; ?>
    </div>
</div>

<script>
let chatVisible = false;

function toggleChat() {
    chatVisible = !chatVisible;
    document.getElementById('chat-box').style.display = chatVisible ? 'flex' : 'none';
}

document.getElementById('send-btn')?.addEventListener('click', function() {
    const messageInput = document.getElementById('chat-input');
    const message = messageInput.value.trim();

    if (message) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', 'tourguide-message');
        messageDiv.innerHTML =
            `<strong><?php echo htmlspecialchars($tourguideName); ?>:</strong> ${message} <span class="date-chat">Just now</span>`;
        document.getElementById('messages').appendChild(messageDiv);

        saveMessageToDatabase(message);
        messageInput.value = '';
    }
});

function saveMessageToDatabase(message) {
    const tourguideId = <?php echo json_encode($tourguideId); ?>;
    const tourId = <?php echo json_encode($tourId); ?>;
    const selectedTravellerId = <?php echo json_encode($selectedTravellerId); ?>;

    fetch('T_save_chat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                tourguideId,
                tourId,
                travellerId: selectedTravellerId,
                content: message,
                type: 'tourguide' // Set the type to 'tourguide' for tourguide messages
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'error') {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}
</script>


<div class="footer">
    <?php include 'footer.php'; ?>
</div>

</html>