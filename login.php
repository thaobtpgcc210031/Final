<?php
session_start();
include_once('connection.php');

if (isset($_POST['btnLogin'])) {
    $us = trim($_POST['txtEmail']);
    $pa = trim($_POST['txtpassword']);
    $error = "";

    if (empty($us)) {
        $error .= "Enter Email, please<br/>";
    }
    if (empty($pa)) {
        $error .= "Enter Password, please<br/>";
    }

    if (empty($error)) {
        include_once("connection.php");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $us = mysqli_real_escape_string($conn, $us);

        // Check in admin table
        $sql = "SELECT * FROM admin WHERE Email='$us'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            $hashed_password = $row['Password'];

            if (password_verify($pa, $hashed_password)) {
                $_SESSION['Admin_ID'] = $row['Admin_ID'];
                $_SESSION['Admin_Name'] = $row['Admin_Name'];
                
                // Redirect to the last page if available, otherwise to admin.php
                $redirect_url = isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'Admin/admin.php';
                unset($_SESSION['last_page']); // Clear the last page after redirect
                header("Location: $redirect_url");
                exit();
            } else {
                $error = "Login failed: Incorrect password";
            }
        } else {
            // Check in tourguide table
            $sql = "SELECT * FROM tourguide WHERE Email='$us'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) == 1) {
                $row = mysqli_fetch_assoc($res);
                $hashed_password = $row['Password'];

                if (password_verify($pa, $hashed_password)) {
                    $_SESSION['Tourguide_ID'] = $row['Tourguide_ID'];
                    $_SESSION['Tourguide_name'] = $row['Tourguide_name'];

                    // Redirect to the last page if available, otherwise to indexT.php
                    $redirect_url = isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'indexT.php';
                    unset($_SESSION['last_page']); // Clear the last page after redirect
                    header("Location: $redirect_url");
                    exit();
                } else {
                    $error = "Login failed: Incorrect password";
                }
            } else {
                // Check in traveller table
                $sql = "SELECT * FROM traveller WHERE Email='$us'";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $hashed_password = $row['Password'];

                    if (password_verify($pa, $hashed_password)) {
                        $_SESSION['Traveller_ID'] = $row['Traveller_ID'];
                        $_SESSION['Traveller_Name'] = $row['Traveller_Name'];

                        // Redirect to the last page if available, otherwise to index.php
                        $redirect_url = isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'index.php';
                        unset($_SESSION['last_page']); // Clear the last page after redirect
                        header("Location: $redirect_url");
                        exit();
                    } else {
                        $error = "Login failed: Incorrect password";
                    }
                } else {
                    $error = "Login failed: User not found";
                }
            }
        }

        mysqli_close($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="">
            <h1>Login</h1>

            <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="txtEmail" id="txtEmail" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="txtpassword" id="txtpassword" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember">Remember me</label>
                <a href="forgot_password.php">Forgot password?</a>
            </div>

            <!-- Show password checkbox -->
            <div class="show-password">
                <label><input type="checkbox" id="showPassword"> Show Password</label>
            </div>

            <button type="submit" name="btnLogin" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <script>
    // Toggle password visibility based on checkbox
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordField = document.getElementById('txtpassword');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordField.type = 'text'; // Show password
        } else {
            passwordField.type = 'password'; // Hide password
        }
    });
    </script>
</body>

</html>