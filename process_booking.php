<?php
session_start(); // Start session
include_once('connection.php'); 

// Check if the user is logged in
if (!isset($_SESSION['Traveller_ID'])) {
    die("You are not logged in! Please log in before booking tickets.");
}

$travellerID = $_SESSION['Traveller_ID']; // Get Traveller_ID from session

// Get data from the form
$tourID = isset($_POST['tourID']) ? $_POST['tourID'] : 0;
$quantity = isset($_POST['ticketQuantity']) ? $_POST['ticketQuantity'] : 1;
$price = isset($_POST['price']) ? $_POST['price'] : 0;

// Calculate the total amount
$totalAmount = $quantity * $price;
$dateBooking = date('Y-m-d'); // Current date
$payed = 0; // Payment status: 0 = not paid

// SQL query to insert ticket information into the database
$sql = "INSERT INTO ticket (TourID, Traveller_ID, Date_booking, Payed, Max_Tickets, Total_Amount) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissid", $tourID, $travellerID, $dateBooking, $payed, $quantity, $totalAmount);

// Execute the query
if ($stmt->execute()) {
    $_SESSION['booking_success'] = true; // Set session variable to indicate success
    header("Location: booking_success.php"); // Redirect to the success page
    exit();
} else {
    error_log("Booking error: " . $conn->error);
    die("An error occurred while booking the ticket. Please try again.");
}

// Close connection
$stmt->close();
$conn->close();
?>