<?php
include_once("connection.php");

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form input
    $tourID = intval($_POST['TourID']);
    $tourName = trim($_POST['Tour_Name']);
    $dateStart = trim($_POST['Date_start']);
    $dateEnd = trim($_POST['Date_end']);
    $price = floatval($_POST['Price']);
    $location = trim($_POST['Location']);
    $description = trim($_POST['Description']);

    // Prepare and execute the update query
    $sql = "UPDATE tour 
            SET Tour_Name = ?, Date_start = ?, Date_end = ?, Price = ?, Location = ?, Description = ? 
            WHERE TourID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssissi", $tourName, $dateStart, $dateEnd, $price, $location, $description, $tourID);
        if ($stmt->execute()) {
            echo "Tour updated successfully.";
        } else {
            echo "Failed to update tour: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request method.";
}

header("Location: ticket_manage.php"); // Redirect back to the list
exit;
?>
