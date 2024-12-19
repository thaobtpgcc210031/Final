<?php
session_start();
include_once("connection.php");

if (isset($_POST['btnVerifyCode'])) {
    $email = $_POST['email'];
    $code = trim($_POST['txtCode']);
    $error = "";

    if (empty($code)) {
        $error = "Vui lòng nhập mã xác thực.";
    }

    if (empty($error)) {
        $roles = ['admin', 'tourguide', 'traveller'];
        $isValid = false;

        foreach ($roles as $role) {
            $sql = "SELECT * FROM $role WHERE Email='$email' AND reset_code='$code' AND code_expiry > NOW()";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) == 1) {
                $isValid = true;
                break;
            }
        }

        if ($isValid) {
            header("Location: reset_password.php?email=" . urlencode($email));
            exit();
        } else {
            $error = "Mã không hợp lệ hoặc đã hết hạn.";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xác Nhận Mã Xác Thực</title>
</head>

<body>
    <form method="POST" action="">
        <h1>Xác Nhận Mã Xác Thực</h1>

        <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <div>
            <label>Mã xác thực:</label>
            <input type="text" name="txtCode" placeholder="Nhập mã xác thực" required>
        </div>

        <input type="hidden" name="email"
            value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">

        <button type="submit" name="btnVerifyCode">Xác nhận</button>
    </form>
</body>

</html>