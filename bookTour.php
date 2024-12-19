<?php
// Connect to the database
include_once('connection.php'); // Change the database connection file name if needed

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"));

// Check data
if (isset($data->tourID) && isset($data->travellerID)) {
    $tourID = $data->tourID;
    $travellerID = $data->travellerID;
    $dateBooking = $data->dateBooking;
    $adultCount = $data->adultCount;
    $childCount = $data->childCount;
    $infantCount = $data->infantCount;

    // Calculate the total number of tickets
    $maxTickets = $adultCount + $childCount + $infantCount;

    // Save the information into the database
    $query = "INSERT INTO ticket (TourID, Traveller_ID, Date_booking, Payed, Max_Tickets) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($query)) {
        $payed = 1; // Assume payment is made, you can change if needed
        $stmt->bind_param("iisis", $tourID, $travellerID, $dateBooking, $payed, $maxTickets);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Unable to save tour booking information."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Error preparing the query."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Incomplete data."]);
}

$conn->close();
?>