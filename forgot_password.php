<?php
include_once("connection.php");
// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = "";
$success = "";

if (isset($_POST['btnSubmit'])) {
    $email = trim($_POST['txtEmail']);

    if (empty($email)) {
        $error = "Please enter your email.";
    } else {
        // Sử dụng kết nối $conn đã được khai báo
        $email = mysqli_real_escape_string($conn, $email);

        // Kiểm tra email có tồn tại trong bảng traveller không
        $sql = "SELECT * FROM traveller WHERE Email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);

            // Tạo mã reset
            $reset_code = rand(100000, 999999); // Mã 6 chữ số
            $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Mã hết hạn trong 1 giờ

            // Cập nhật mã reset và thời gian hết hạn trong cơ sở dữ liệu
            $update_sql = "UPDATE traveller SET reset_code='$reset_code', code_expiry='$expiry_time' WHERE Email='$email'";
            mysqli_query($conn, $update_sql);

            // Gửi mã reset qua email
            $subject = "Password Reset Request";
            $message = "You have requested a password reset. Please use the following code: <b>$reset_code</b>. This code will expire in 1 hour.";
            $headers = "From: thaobtpgcc210031@fpt.edu.vn\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if (mail($email, $subject, $message, $headers)) {
                $success = "Password reset code has been sent to your email.";
            } else {
                $error = "Message could not be sent.";
            }
        } else {
            $error = "No account found with that email address.";
        }
    }
}

// Đóng kết nối cơ sở dữ liệu khi không còn sử dụng
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>
    <h1>Forgot Password</h1>

    <?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
    <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="txtEmail">Enter your email:</label>
        <input type="email" name="txtEmail" id="txtEmail" required>
        <button type="submit" name="btnSubmit">Send Reset Code</button>
    </form>
</body>

</html>