<?php
include_once("connection.php");

// Check if TourID is provided in the URL
if (isset($_GET['TourID'])) {
    $tourID = intval($_GET['TourID']);

    // Prepare and execute the query to delete the tour
    $sql = "DELETE FROM tour WHERE TourID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tourID);
        if ($stmt->execute()) {
            echo "Tour deleted successfully.";
        } else {
            echo "Failed to delete tour.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
    }

    $conn->close();
} else {
    echo "No TourID provided.";
}

header("Location: ticket_manage.php"); // Redirect back to the list
exit;
?>
