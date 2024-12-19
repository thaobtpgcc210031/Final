<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
    /* Your existing styles */
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

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        color: #555;
    }

    select,
    input[type="text"],
    input[type="email"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    select:focus,
    input[type="text"]:focus,
    input[type="email"]:focus {
        border-color: #4CAF50;
        outline: none;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .payment-details {
        display: none;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: -10px;
        margin-bottom: 10px;
        display: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Page</h1>

        <label for="method_pay">Select Payment Method:</label>
        <select id="method_pay" name="method_pay" onchange="showPaymentDetails(this.value)" required>
            <option value="">-- Select Method --</option>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
            <option value="paypal">PayPal</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>

        <p id="method_error" class="error-message">Please select a payment method.</p>

        <!-- Credit Card Form -->
        <div id="credit_card_details" class="payment-details">
            <form id="creditCardForm" method="POST" action="process_payment.php"
                onsubmit="return validateCreditCardForm()">
                <h3>Credit Card Payment</h3>
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" placeholder="Enter your card number"
                    maxlength="16" pattern="\d{16}" required>
                <p id="card_error" class="error-message">Card number must be 16 digits.</p>

                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" pattern="\d{2}/\d{4}"
                    required>
                <p id="expiry_error" class="error-message">Expiry date must be in MM/YYYY format.</p>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" maxlength="3" pattern="\d{3}" required>
                <p id="cvv_error" class="error-message">CVV must be 3 digits.</p>

                <input type="hidden" name="payment_method" value="credit_card">
                <input type="submit" value="Pay Now">
            </form>
        </div>

        <!-- Debit Card Form -->
        <div id="debit_card_details" class="payment-details">
            <form id="debitCardForm" method="POST" action="process_payment.php"
                onsubmit="return validateDebitCardForm()">
                <h3>Debit Card Payment</h3>
                <label for="debit_card_number">Debit Card Number:</label>
                <input type="text" id="debit_card_number" name="debit_card_number"
                    placeholder="Enter your debit card number" maxlength="16" pattern="\d{16}" required>
                <p id="debit_card_error" class="error-message">Debit card number must be 16 digits.</p>

                <label for="debit_expiry_date">Expiry Date:</label>
                <input type="text" id="debit_expiry_date" name="debit_expiry_date" placeholder="MM/YYYY"
                    pattern="\d{2}/\d{4}" required>
                <p id="debit_expiry_error" class="error-message">Expiry date must be in MM/YYYY format.</p>

                <label for="debit_cvv">CVV:</label>
                <input type="text" id="debit_cvv" name="debit_cvv" placeholder="Enter CVV" maxlength="3" pattern="\d{3}"
                    required>
                <p id="debit_cvv_error" class="error-message">CVV must be 3 digits.</p>

                <input type="hidden" name="payment_method" value="debit_card">
                <input type="submit" value="Pay Now">
            </form>
        </div>

        <!-- PayPal Form -->
        <div id="paypal_details" class="payment-details">
            <form id="paypalForm" method="POST" action="process_payment.php" onsubmit="return validatePayPalForm()">
                <h3>PayPal Payment</h3>
                <label for="paypal_email">PayPal Email:</label>
                <input type="email" id="paypal_email" name="paypal_email" placeholder="Enter your PayPal email"
                    required>
                <p id="paypal_error" class="error-message">Please enter a valid PayPal email address.</p>

                <input type="hidden" name="payment_method" value="paypal">
                <input type="submit" value="Pay Now">
            </form>
        </div>

        <!-- Bank Transfer Form -->
        <div id="bank_transfer_details" class="payment-details">
            <form id="bankTransferForm" method="POST" action="process_payment.php"
                onsubmit="return validateBankTransferForm()">
                <h3>Bank Transfer Payment</h3>
                <label for="bank_name">Bank Name:</label>
                <input type="text" id="bank_name" name="bank_name" placeholder="Enter your bank name" required>
                <p id="bank_name_error" class="error-message">Please enter a valid bank name.</p>

                <label for="account_number">Account Number:</label>
                <input type="text" id="account_number" name="account_number" placeholder="Enter your account number"
                    pattern="\d{9,18}" required>
                <p id="account_error" class="error-message">Account number must be between 9 and 18 digits.</p>

                <input type="hidden" name="payment_method" value="bank_transfer">
                <input type="submit" value="Pay Now">
            </form>
        </div>
    </div>

    <script>
    function showPaymentDetails(method) {
        const paymentDetails = document.getElementsByClassName("payment-details");
        for (let i = 0; i < paymentDetails.length; i++) {
            paymentDetails[i].style.display = "none";
        }
        if (method) {
            document.getElementById(method + "_details").style.display = "block";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        showPaymentDetails("");
    });

    function validateCreditCardForm() {
        const cardNumber = document.getElementById('card_number').value;
        const expiryDate = document.getElementById('expiry_date').value;
        const cvv = document.getElementById('cvv').value;

        const cardNumberRegex = /^\d{16}$/;
        const expiryDateRegex = /^\d{2}\/\d{4}$/;
        const cvvRegex = /^\d{3}$/;

        if (!cardNumberRegex.test(cardNumber)) {
            document.getElementById('card_error').style.display = 'block';
            return false;
        }

        if (!expiryDateRegex.test(expiryDate)) {
            document.getElementById('expiry_error').style.display = 'block';
            return false;
        }

        if (!cvvRegex.test(cvv)) {
            document.getElementById('cvv_error').style.display = 'block';
            return false;
        }

        return true;
    }

    function validateDebitCardForm() {
        const debitCardNumber = document.getElementById('debit_card_number').value;
        const debitExpiryDate = document.getElementById('debit_expiry_date').value;
        const debitCvv = document.getElementById('debit_cvv').value;

        const debitCardNumberRegex = /^\d{16}$/;
        const debitExpiryDateRegex = /^\d{2}\/\d{4}$/;
        const debitCvvRegex = /^\d{3}$/;

        if (!debitCardNumberRegex.test(debitCardNumber)) {
            document.getElementById('debit_card_error').style.display = 'block';
            return false;
        }

        if (!debitExpiryDateRegex.test(debitExpiryDate)) {
            document.getElementById('debit_expiry_error').style.display = 'block';
            return false;
        }

        if (!debitCvvRegex.test(debitCvv)) {
            document.getElementById('debit_cvv_error').style.display = 'block';
            return false;
        }

        return true;
    }

    function validatePayPalForm() {
        const paypalEmail = document.getElementById('paypal_email').value;

        const paypalEmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!paypalEmailRegex.test(paypalEmail)) {
            document.getElementById('paypal_error').style.display = 'block';
            return false;
        }

        return true;
    }

    function validateBankTransferForm() {
        const bankName = document.getElementById('bank_name').value;
        const accountNumber = document.getElementById('account_number').value;

        const accountNumberRegex = /^\d{9,18}$/;

        if (bankName === '') {
            document.getElementById('bank_name_error').style.display = 'block';
            return false;
        }

        if (!accountNumberRegex.test(accountNumber)) {
            document.getElementById('account_error').style.display = 'block';
            return false;
        }

        return true;
    }
    </script>
</body>

</html>