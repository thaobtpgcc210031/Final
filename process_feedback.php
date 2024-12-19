<?php
session_start();
include 'database_connection.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get information from the POST request
    $travellerId = $_POST['travellerId'];
    $travellerName = $_POST['travellerName'];
    $tourId = $_POST['tourId'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d'); // Get the current date

    // Execute the query to insert the feedback
    $sql = "INSERT INTO feedback (Traveller_ID, Traveller_Name, TourID, Comment, date) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issss", $travellerId, $travellerName, $tourId, $comment, $date);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Feedback has been saved.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'An error occurred.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Unable to prepare the query.']);
    }

    $conn->close();
}
?>