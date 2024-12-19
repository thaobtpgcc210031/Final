<?php
// Kết nối đến cơ sở dữ liệu
include_once('connection.php'); 



// Ensure user is logged in
if (isset($_SESSION['Traveller_ID'])) {
    $traveller_id = $_SESSION['Traveller_ID'];
    $tourguide_id = $_POST['tourguide_id'];
    $tour_id = $_POST['TourID'];
    $message = $_POST['message'];

    // Prepare statement to insert message
    $stmt = $conn->prepare("INSERT INTO chat (Tour_ID, Traveller_ID, Content, Date_chat) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $tour_id, $traveller_id, $message);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => $message]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Database error']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}

$conn->close();
?>