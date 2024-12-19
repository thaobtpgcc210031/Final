<?php
session_start();
include_once("connection.php");

// Check access rights and get data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ticket_id"])) {
    $ticket_id = intval($_POST["ticket_id"]);

    // Update payment status
    $sql = "UPDATE ticket SET Payed = 1 WHERE Ticket_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticket_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Ticket payment successful!";
    } else {
        $_SESSION['error_message'] = "An error occurred while processing the payment.";
    }
    $stmt->close();
}

// Redirect to the ticket management page
header("Location: payment.php"); // Change the path as needed
exit();
?>