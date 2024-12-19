<?php
session_start();
header('Content-Type: application/json');

// Lấy tin nhắn từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT Comment, created_at FROM feedback WHERE Traveller_ID = ? ORDER BY created_at ASC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row; // Mỗi tin nhắn là một mảng kết hợp
    }
}

// Gửi phản hồi về cho client
echo json_encode(['status' => 'success', 'feedback' => $messages]);

$stmt->close();
$conn->close();
?>