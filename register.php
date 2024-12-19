<?php
include_once("connection.php");

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Kiểm tra xem có trường nào trống không
    if (empty($username)) {
        $error = "Please enter your username.";
    } elseif (empty($birthday)) {
        $error = "Please enter your birthday.";
    } elseif (empty($gender)) {
        $error = "Please select your gender.";
    } elseif (empty($address)) {
        $error = "Please enter your address.";
    } elseif (empty($phone)) {
        $error = "Please enter your phone number.";
    } elseif (empty($email)) {
        $error = "Please enter your email.";
    } elseif (empty($password)) {
        $error = "Please enter your password.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    }
    //  elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
    //     $error = "Password must be at least 8 characters long, contain at least one uppercase letter and one number.";
    // } 
    else {
        // Kiểm tra trùng lặp email, username hoặc số điện thoại
        $check_sql = "SELECT * FROM traveller WHERE Email = ? OR Traveller_Name = ? OR Phone = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("sss", $email, $username, $phone);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email, username, or phone number already exists!";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng vào cơ sở dữ liệu
            $sql = "INSERT INTO traveller (Traveller_Name, Birthday, Gender, Adress, Phone, Email, Password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Error preparing SQL statement: " . $conn->error);
            }

            $stmt->bind_param("sssssss", $username, $birthday, $gender, $address, $phone, $email, $hashed_password);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        $check_stmt->close();
    }

    $conn->close();
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        text-align: center;
    }

    .modal-header {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        cursor: pointer;
    }

    .error-message {
        color: red;
        margin-bottom: 20px;
    }

    .btn-continue {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-continue:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>

    <!-- Modal thông báo lỗi -->
    <?php if (!empty($error)): ?>
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">Error</div>
            <div class="error-message"><?php echo $error; ?></div>
            <button id="continueBtn" class="btn-continue">Continue Registration</button>
        </div>
    </div>
    <?php endif; ?>

    <div class="wrapper">
        <form action="register.php" method="POST">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username (*)" required>
            </div>
            <div class="input-box">
                <input type="date" name="birthday" placeholder="Birthday (*)" required>
            </div>
            <div data-role="main" class="ui-content">
                <fieldset data-role="controlgroup">
                    <legend>Choose your gender:</legend>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male" checked>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="female">
                </fieldset>
            </div>
            <div class="input-box">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="input-box">
                <input type="text" name="phone" placeholder="Phone (*)" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email (*)" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password (*)" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirm Password (*)" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <script>
    var modal = document.getElementById("errorModal");
    var continueBtn = document.getElementById("continueBtn");
    var span = document.getElementsByClassName("close")[0];

    if (modal) {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    continueBtn.onclick = function() {
        modal.style.display = "none";
    }
    </script>

</body>

</html>