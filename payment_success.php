<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        text-align: center;
        margin-top: 100px;
    }

    h1 {
        color: #4CAF50;
    }
    </style>
</head>

<body>

    <h1>Payment Successful!</h1>
    <p>Thank you for your payment.</p>
    <p><a href="my_ticket.php">Back to My Tickets and Total Spent</a></p>
    <form method="post" action="my_ticket.php">
        <input type="hidden" name="pay_ticket_id" value="<?php echo $ticket['Ticket_ID']; ?>">
        <button type="submit" class="btn btn-primary">Mark as Paid</button>
    </form>


</body>

</html>