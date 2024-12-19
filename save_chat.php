<?php
include_once("connection.php");

// Đảm bảo rằng yêu cầu là POST và dữ liệu có đầy đủ thông tin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra dữ liệu đầu vào
    if (!isset($data['travellerId'], $data['tourId'], $data['content'], $data['type'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit;
    }

    $travellerId = intval($data['travellerId']);
    $tourId = intval($data['tourId']);
    $content = trim($data['content']);
    $type = trim($data['type']);

    // Kiểm tra nội dung tin nhắn không được để trống
    if (empty($content)) {
        echo json_encode(['status' => 'error', 'message' => 'Message content cannot be empty']);
        exit;
    }

    // Lấy Tourguide_ID từ bảng `tour` dựa trên TourID
    $sqlGetTourguide = "SELECT Tourguide_ID FROM tour WHERE TourID = ?";
    $stmtTourguide = $conn->prepare($sqlGetTourguide);
    if (!$stmtTourguide) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
        exit;
    }

    $stmtTourguide->bind_param("i", $tourId);
    $stmtTourguide->execute();
    $resultTourguide = $stmtTourguide->get_result();
    $tourguideId = null;

    if ($row = $resultTourguide->fetch_assoc()) {
        $tourguideId = intval($row['Tourguide_ID']);
    }
    $stmtTourguide->close();

    // Nếu không tìm thấy Tourguide_ID, báo lỗi
    if (!$tourguideId) {
        echo json_encode(['status' => 'error', 'message' => 'Tourguide not found for the given TourID']);
        exit;
    }

    // Lưu tin nhắn vào cơ sở dữ liệu
    $sqlInsert = "INSERT INTO chat (TourID, Traveller_ID, Tourguide_ID, Content, Type, Date_chat) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sqlInsert);
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("iiiss", $tourId, $travellerId, $tourguideId, $content, $type);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Message saved']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
$conn->close();