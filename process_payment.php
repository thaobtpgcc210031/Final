<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .success-message {
        text-align: center;
        color: green;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .error-message {
        text-align: center;
        color: red;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .details {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9;
        border-left: 5px solid #4CAF50;
    }

    .details span {
        display: block;
        font-size: 14px;
        color: #555;
        margin: 5px 0;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .button-container a {
        text-decoration: none;
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .button-container a:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Processing</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paymentMethod = $_POST['payment_method'] ?? '';

            if ($paymentMethod === 'credit_card') {
                $cardNumber = $_POST['card_number'] ?? '';
                $expiryDate = $_POST['expiry_date'] ?? '';
                $cvv = $_POST['cvv'] ?? '';

                if (preg_match('/^\d{16}$/', $cardNumber) && preg_match('/^\d{2}\/\d{4}$/', $expiryDate) && preg_match('/^\d{3}$/', $cvv)) {
                    echo "<div class='success-message'>Payment successful via Credit Card!</div>";
                    echo "<div class='details'>
                            <span><strong>Card Number:</strong> ************" . substr($cardNumber, -4) . "</span>
                            <span><strong>Expiry Date:</strong> $expiryDate</span>
                          </div>";
                } else {
                    echo "<div class='error-message'>Invalid Credit Card details. Please try again.</div>";
                }
            } elseif ($paymentMethod === 'debit_card') {
                $debitCardNumber = $_POST['debit_card_number'] ?? '';
                $debitExpiryDate = $_POST['debit_expiry_date'] ?? '';
                $debitCvv = $_POST['debit_cvv'] ?? '';

                if (preg_match('/^\d{16}$/', $debitCardNumber) && preg_match('/^\d{2}\/\d{4}$/', $debitExpiryDate) && preg_match('/^\d{3}$/', $debitCvv)) {
                    echo "<div class='success-message'>Payment successful via Debit Card!</div>";
                    echo "<div class='details'>
                            <span><strong>Card Number:</strong> ************" . substr($debitCardNumber, -4) . "</span>
                            <span><strong>Expiry Date:</strong> $debitExpiryDate</span>
                          </div>";
                } else {
                    echo "<div class='error-message'>Invalid Debit Card details. Please try again.</div>";
                }
            } elseif ($paymentMethod === 'paypal') {
                $paypalEmail = $_POST['paypal_email'] ?? '';

                if (filter_var($paypalEmail, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='success-message'>Payment successful via PayPal!</div>";
                    echo "<div class='details'>
                            <span><strong>PayPal Email:</strong> $paypalEmail</span>
                          </div>";
                } else {
                    echo "<div class='error-message'>Invalid PayPal email address. Please try again.</div>";
                }
            } elseif ($paymentMethod === 'bank_transfer') {
                $bankName = $_POST['bank_name'] ?? '';
                $accountNumber = $_POST['account_number'] ?? '';

                if (!empty($bankName) && preg_match('/^\d{9,18}$/', $accountNumber)) {
                    echo "<div class='success-message'>Payment successful via Bank Transfer!</div>";
                    echo "<div class='details'>
                            <span><strong>Bank Name:</strong> $bankName</span>
                            <span><strong>Account Number:</strong> ********" . substr($accountNumber, -4) . "</span>
                          </div>";
                } else {
                    echo "<div class='error-message'>Invalid Bank Transfer details. Please try again.</div>";
                }
            } else {
                echo "<div class='error-message'>Invalid payment method selected. Please try again.</div>";
            }
        } else {
            echo "<div class='error-message'>Invalid request. Please go back and try again.</div>";
        }
        ?>

        <div class="button-container">
            <a href="cart.php">Go Back</a>
        </div>
    </div>
</body>

</html>