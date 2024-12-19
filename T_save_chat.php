<?php
include_once("connection.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['tourguideId'], $data['tourId'], $data['travellerId'], $data['content'], $data['type'])) {
    $tourguideId = $data['tourguideId'];
    $tourId = $data['tourId'];
    $travellerId = $data['travellerId'];
    $content = $data['content'];
    $type = $data['type'];
    $dateChat = date('Y-m-d'); // Get the current date

    // Insert chat message into the database
    $sql = "INSERT INTO chat (Traveller_ID, Tourguide_ID, Content, Date_chat, TourID, type)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($type === 'traveller') {
        $stmt->bind_param("iissis", $travellerId, $tourguideId, $content, $dateChat, $tourId, $type);
    } else {
        $stmt->bind_param("iissis", $travellerId, $tourguideId, $content, $dateChat, $tourId, $type);
    }
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
}
?>