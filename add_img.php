<?php
include_once('connection.php');
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý tải lên hình ảnh
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tour_id = $_POST['tour_id'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra loại tệp
    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        // Di chuyển tệp vào thư mục uploads
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Thêm URL hình ảnh vào bảng tour_images
            $sql = "INSERT INTO tour_images (tour_id, image_url) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $tour_id, $target_file);

            if ($stmt->execute()) {
                echo "<p>Hình ảnh đã được tải lên thành công.</p>";
            } else {
                echo "<p>Lỗi: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Lỗi khi tải lên hình ảnh.</p>";
        }
    } else {
        echo "<p>Chỉ cho phép các định dạng hình ảnh: JPG, JPEG, PNG, GIF.</p>";
    }
}


?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hình ảnh tour</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    form {
        margin: 20px 0;
    }
    </style>
</head>

<body>
    <h1>Thêm hình ảnh cho tour</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="tour_id">Tour ID:</label>
        <input type="number" name="tour_id" required>

        <label for="image">Chọn hình ảnh:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Tải lên">
    </form>
</body>

</html>