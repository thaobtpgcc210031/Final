<?php
session_start();
include_once("connection.php");

// Check if the ticket ID is provided in the request
if (isset($_POST['ticket_id'])) {
    $ticket_id = $_POST['ticket_id'];

    // Step 1: Check if the ticket is paid or not
    $check_sql = "SELECT Payed FROM ticket WHERE Ticket_ID = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $ticket_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Step 2: If ticket is paid, deny deletion
        if ($row['Payed'] == '1') {
            $_SESSION['message'] = "Ticket has already been paid, and cannot be deleted.";
            header("Location: cart.php");
            exit();
        }

        // Step 3: If ticket is not paid, delete the ticket
        $sql = "DELETE FROM ticket WHERE Ticket_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ticket_id);

        if ($stmt->execute()) {
            // Redirect back with success message
            $_SESSION['message'] = "Ticket has been deleted successfully!";
            header("Location: cart.php");
            exit();
        } else {
            // Redirect back with error message if deletion fails
            $_SESSION['message'] = "Failed to delete the ticket!";
            header("Location: cart.php");
            exit();
        }
    } else {
        // If the ticket ID does not exist
        $_SESSION['message'] = "Ticket not found!";
        header("Location: cart.php");
        exit();
    }
} else {
    // If no ticket ID is provided
    $_SESSION['message'] = "No ticket ID provided!";
    header("Location: cart.php");
    exit();
}
?>