<?php
include_once('connection.php');
$error = "";
$success = "";

if (isset($_POST['btnReset'])) {
    $reset_code = trim($_POST['txtCode']);
    $new_password = trim($_POST['txtNewPassword']);

    if (empty($reset_code) || empty($new_password)) {
        $error = "Please fill out both fields.";
    } else {
        // Verify the reset code
        $sql = "SELECT * FROM traveller WHERE reset_code='$reset_code' AND code_expiry > NOW()";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);

            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password and clear reset code
            $update_sql = "UPDATE traveller SET Password='$hashed_password', reset_code=NULL, code_expiry=NULL WHERE reset_code='$reset_code'";
            if (mysqli_query($conn, $update_sql)) {
                $success = "Your password has been successfully reset.";
            } else {
                $error = "An error occurred. Please try again.";
            }
        } else {
            $error = "Invalid or expired reset code.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <h1>Reset Your Password</h1>

    <?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
    <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="txtCode">Enter Reset Code:</label>
        <input type="text" name="txtCode" id="txtCode" required>

        <label for="txtNewPassword">Enter New Password:</label>
        <input type="password" name="txtNewPassword" id="txtNewPassword" required>

        <button type="submit" name="btnReset">Reset Password</button>
    </form>
</body>

</html>