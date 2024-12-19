<?php
session_start();
include_once('connection.php');


// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['Traveller_ID']) && !isset($_SESSION['Tourguide_ID'])) {
    echo "Please log in to send a message.";
    exit;
}

// Kết nối với cơ sở dữ liệu
include_once("connection.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy thông tin từ session và từ form
$traveller_id = $_SESSION['Traveller_ID'] ?? null; // ID của traveller
$tourguide_id = $_SESSION['Tourguide_ID'] ?? null; // ID của tour guide
$content = trim($_POST['content']);
$tour_id = trim($_POST['TourID']);
$date_chat = date('Y-m-d'); // Lấy ngày hiện tại

// Kiểm tra xem content có rỗng không
if (empty($content)) {
    echo "Message content cannot be empty.";
    exit;
}

// Kiểm tra xem Tour ID có tồn tại không
if ($tour_id) {
    $check_tour_sql = "SELECT * FROM tour WHERE TourID = ?";
    $stmt_check = mysqli_prepare($conn, $check_tour_sql);
    
    mysqli_stmt_bind_param($stmt_check, 'i', $tour_id);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) === 0) {
        echo "Tour ID does not exist.";
        mysqli_stmt_close($stmt_check);
        exit;
    }

    mysqli_stmt_close($stmt_check);
}

// Chuẩn bị và thực thi câu lệnh SQL để lưu tin nhắn
$sql = "INSERT INTO chat (Traveller_ID, Tourguide_ID, Content, Date_chat, TourID) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Gán giá trị cho các tham số
    mysqli_stmt_bind_param($stmt, 'iissi', $traveller_id, $tourguide_id, $content, $date_chat, $tour_id);
    
    // Thực thi câu lệnh
    if (mysqli_stmt_execute($stmt)) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message: " . mysqli_error($conn);
    }

    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);

// Quay về trang chat
header("Location: testT.php"); // Thay thế với trang chat của bạn
exit();
?>