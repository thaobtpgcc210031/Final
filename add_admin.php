<?php
include_once('connection.php');
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $admin_name = $_POST['admin_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Băm mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Câu lệnh SQL để thêm admin
    $stmt = $conn->prepare("INSERT INTO admin (admin_name, birthday, gender, address, phone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Sửa lại số lượng tham số trong bind_param và kiểu dữ liệu
    $stmt->bind_param("sssssss", $admin_name, $birthday, $gender, $address, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Admin đã được thêm thành công.";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Admin</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .form-group input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <h1>Thêm Admin</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="admin_name">Tên Admin:</label>
            <input type="text" id="admin_name" name="admin_name" required>
        </div>
        <div class="form-group">
            <label for="birthday">Ngày sinh:</label>
            <input type="date" id="birthday" name="birthday" required>
        </div>
        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <input type="text" id="gender" name="gender" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br><br>
        </div>
        <div class="form-group">
            <input type="submit" value="Thêm Admin">
        </div>
    </form>
</body>

</html>