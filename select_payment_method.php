<?php
// Lấy dữ liệu từ URL
$ticket_id = htmlspecialchars($_GET['ticket_id']);
$total_with_tax = htmlspecialchars($_GET['total_with_tax']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method</title>
</head>

<body>
    <h1>Select Payment Method</h1>
    <p>Ticket ID: <?php echo $ticket_id; ?></p>
    <p>Total Amount: <?php echo $total_with_tax; ?> VND</p>
    <form action="process_payment.php" method="POST">
        <label for="payment_method">Choose Payment Method:</label>
        <select id="payment_method" name="payment_method" required>
            <option value="">-- Select Method --</option>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
            <option value="paypal">PayPal</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>
        <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
        <input type="hidden" name="total_with_tax" value="<?php echo $total_with_tax; ?>">
        <input type="submit" value="Continue">
    </form>
</body>

</html>