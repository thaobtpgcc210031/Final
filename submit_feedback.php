<?php
include_once('connection.php');

// Get information from the form
$user_name = $_POST['Traveller_Name']; // Name of the person providing feedback
$feedback = $_POST['feedback'];
$date = date("Y-m-d"); // Get current date

// Get TourID of the current tour, assuming you have a specific tour name
$current_tour_name = 'Tour 1'; // Change this to the name of the tour for which you want to get the TourID
$checkStmt = $conn->prepare($checkTourSql);

// Check for errors when preparing the query
if (!$checkStmt) {
    die("Error preparing tour check statement: " . $conn->error);
}

// Bind parameters and execute
$checkStmt->bind_param("s", $current_tour_name);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

// Check the number of records
if ($checkResult->num_rows > 0) {
    // Get TourID of the current tour
    $tourData = $checkResult->fetch_assoc();
    $tour_id = $tourData['TourID']; // Get TourID from the result

    // If TourID exists, proceed to save the feedback
    $sql = "INSERT INTO feedback (TourID, Traveller_Name, Comment, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check for errors when preparing the query
    if (!$stmt) {
        die("Prepare error: " . $conn->error); // Display error message
    }

    // Bind parameters
    $stmt->bind_param("isss", $tour_id, $user_name, $feedback, $date);

    // Execute the query and check
    if ($stmt->execute()) {
        echo "Feedback has been successfully submitted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
} else {
    echo "Error: TourID for the current tour not found.";
}

// Close connection
$checkStmt->close();
$conn->close();
?>
<?php
include_once('connection.php');

// Get information from the form
$user_name = $_POST['Traveller_Name']; // Name of the person providing feedback
$feedback = $_POST['feedback'];
$date = date("Y-m-d"); // Get current date

// Get TourID of the current tour, assuming you have a specific tour name
$current_tour_name = 'Tour 1'; // Change this to the name of the tour for which you want to get the TourID
$checkStmt = $conn->prepare($checkTourSql);
$checkStmt->bind_param("s", $current_tour_name);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

// Check the number of records
if ($checkResult->num_rows > 0) {
    // Get TourID of the current tour
    $tourData = $checkResult->fetch_assoc();
    $tour_id = $tourData['TourID']; // Get TourID from the result

    // If TourID exists, proceed to save the feedback
    $sql = "INSERT INTO feedback (TourID, Traveller_Name, Comment, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check for errors when preparing the query
    if ($stmt === false) {
        die("Prepare error: " . $conn->error); // Display error message
    }

    // Bind parameters
    $stmt->bind_param("isss", $tour_id, $user_name, $feedback, $date);

    // Execute the query and check
    if ($stmt->execute()) {
        echo "Feedback has been successfully submitted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
} else {
    echo "Error: TourID for the current tour not found.";
}

// Close connection
$checkStmt->close();
$conn->close();
?>