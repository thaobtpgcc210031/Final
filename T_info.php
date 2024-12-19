<?php
session_start();  // Khởi động session để lấy thông tin phiên người dùng

// Kiểm tra nếu Tourguide_ID đã được lưu trong session (giả sử bạn đã lưu nó khi người dùng đăng nhập)
if (!isset($_SESSION['Tourguide_ID'])) {
    die("Bạn chưa đăng nhập hoặc không có quyền truy cập.");
}

$Tourguide_ID = $_SESSION['Tourguide_ID'];  // Lấy ID của tour guide từ session

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy thông tin của tour guide từ cơ sở dữ liệu
$sql = "SELECT * FROM tourguide WHERE Tourguide_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Tourguide_ID);
$stmt->execute();
$result = $stmt->get_result();
$tourguide = $result->fetch_assoc();

if (!$tourguide) {
    die("Không tìm thấy thông tin tour guide.");
}

// Xử lý khi cập nhật thông tin tourguide
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Tourguide_name = $_POST['Tourguide_name'];
    $Birthday = $_POST['Birthday'];
    $Experience = $_POST['Experience'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];  // Mã hóa lại mật khẩu nếu cần

    $update_sql = "UPDATE tourguide SET Tourguide_name = ?, Birthday = ?, Experience = ?, Email = ?, Password = ? WHERE Tourguide_ID = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $Tourguide_name, $Birthday, $Experience, $Email, $Password, $Tourguide_ID);

    if ($update_stmt->execute()) {
        echo "Cập nhật thông tin thành công!";
    } else {
        echo "Lỗi khi cập nhật thông tin: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin tour guide</title>
</head>

<body>
    <h2>Thông tin Tourguide</h2>
    <form method="POST" action="">
        <label for="Tourguide_name">Tên Tourguide:</label>
        <input type="text" id="Tourguide_name" name="Tourguide_name"
            value="<?php echo htmlspecialchars($tourguide['Tourguide_name']); ?>" required><br><br>

        <label for="Birthday">Ngày sinh:</label>
        <input type="date" id="Birthday" name="Birthday" value="<?php echo $tourguide['Birthday']; ?>" required><br><br>

        <label for="Experience">Kinh nghiệm:</label>
        <textarea id="Experience" name="Experience"
            required><?php echo htmlspecialchars($tourguide['Experience']); ?></textarea><br><br>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($tourguide['Email']); ?>"
            required><br><br>

        <label for="Password">Mật khẩu:</label>
        <input type="password" id="Password" name="Password"
            value="<?php echo htmlspecialchars($tourguide['Password']); ?>" required><br><br>

        <input type="submit" value="Cập nhật">
    </form>
</body>

</html>

<?php
// Đóng kết nối
$conn->close();
?>