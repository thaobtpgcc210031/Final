<?php
session_start(); // Đảm bảo phiên làm việc được khởi tạo
include_once('connection.php'); // Kết nối đến cơ sở dữ liệu

// Kiểm tra nếu có dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $tour_id = $_POST['TourID'];
    $traveller_id = $_POST['Traveller_ID'];
    $traveller_name = $_POST['Traveller_Name'];
    $comment = $_POST['comment'];

    // Chuẩn bị truy vấn SQL để chèn bình luận
    $sql = "INSERT INTO feedback (TourID, Traveller_ID, Traveller_Name, comment) VALUES (?, ?, ?, ?)";
    
    // Sử dụng prepared statement để tránh SQL Injection
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi chuẩn bị câu truy vấn: " . $conn->error);
    }

    $stmt->bind_param("iiss", $tour_id, $traveller_id, $traveller_name, $comment);
    
    // Thực thi truy vấn
    if ($stmt->execute()) {
        echo "Bình luận đã được gửi thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();
}

// Lấy tất cả các bình luận cho tour_id cụ thể
$sql = "SELECT Traveller_Name, comment FROM feedback WHERE TourID = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$result = $stmt->get_result();

// Hiển thị bình luận
if ($result->num_rows > 0) {
    echo "<div class='comments-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<strong>" . htmlspecialchars($row['Traveller_Name']) . ":</strong> ";
        echo htmlspecialchars($row['comment']);
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Chưa có bình luận nào.";
}

// Đóng kết nối
$conn->close();
?>