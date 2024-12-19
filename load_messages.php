<?php
session_start();

include_once('connection.php'); 


// Ensure user is logged in
if (isset($_SESSION['Traveller_ID'])) {
    $traveller_id = $_SESSION['Traveller_ID'];
    $tourguide_id = $_POST['tourguide_id'];
    $tour_id = $_POST['tour_id'];

    // Fetch messages
    $stmt = $conn->prepare("SELECT Content, (Traveller_ID = ?) AS isSentByUser FROM chat WHERE Tour_ID = ? ORDER BY Date_chat ASC");
    $stmt->bind_param("ii", $traveller_id, $tour_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    echo json_encode(['messages' => $messages]);
} else {
    echo json_encode(['messages' => []]);
}
$conn->close();
?>