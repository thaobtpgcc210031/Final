<?php
include_once('connection.php'); // Ensure that the database connection has been established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the fields exist
    if (isset($_POST['TourID'], $_POST['Traveller_ID'], $_POST['Traveller_Name'], $_POST['Comment'])) {
        // Get data from the form
        $tour_id = $_POST['TourID'];
        $traveller_id = $_POST['Traveller_ID'];
        $traveller_name = $_POST['Traveller_Name'];
        $comment = $_POST['Comment'];

        // Prepare the SQL query to insert the comment
        $sql = "INSERT INTO feedback (TourID, Traveller_ID, Traveller_Name, Comment) VALUES (?, ?, ?, ?)";

        // Use a prepared statement to prevent SQL Injection
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo json_encode(['success' => false, 'error' => $conn->error]);
            exit;
        }

        $stmt->bind_param("iiss", $tour_id, $traveller_id, $traveller_name, $comment);

        // Execute the query
        if ($stmt->execute()) {
            // Return a JSON response with the new comment
            echo json_encode(['success' => true, 'comment' => $comment]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        // Close the connection
        $stmt->close();
    } else {
        // In case of missing input data
        echo json_encode(['success' => false, 'error' => 'Missing input data']);
    }
} else {
    // In case the request is not POST
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>