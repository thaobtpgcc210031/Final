<?php
session_start();
include_once('connection.php');
// // Kiểm tra xem người dùng đã đăng nhập chưa
// if (!isset($_SESSION['Traveller_ID'])) {
//     header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
//     exit();
// }

$traveller_id = $_SESSION['Traveller_ID'];

// Kiểm tra xem tourguide_id có tồn tại trong URL không
if (!isset($_GET['tourguide_id'])) {
    die("Tour Guide ID not provided.");
}

$tourguide_id = $_GET['tourguide_id']; // Nhận ID của tour guide từ URL

// Gửi tin nhắn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = $_POST['message'];

    // Kiểm tra xem tin nhắn có rỗng không
    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO chat (Traveller_ID, Tourguide_ID, Content) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $traveller_id, $tourguide_id, $message);
        $stmt->execute();
    }
}

// Lấy tất cả các tin nhắn giữa traveler và tour guide
$stmt = $conn->prepare("SELECT * FROM chat WHERE (Traveller_ID = ? AND Tourguide_ID = ?) OR (Traveller_ID = ? AND Tourguide_ID = ?) ORDER BY Date_chat");
$stmt->bind_param("iiii", $traveller_id, $tourguide_id, $tourguide_id, $traveller_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Tour Guide</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link đến file CSS -->
</head>

<body>
    <h1>Chat with Tour Guide</h1>
    <div class="chat-box">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="chat-message <?php echo ($row['Traveller_ID'] == $traveller_id) ? 'me' : 'them'; ?>">
            <p><strong><?php echo ($row['Traveller_ID'] == $traveller_id) ? 'You' : 'Tour Guide'; ?>:</strong>
                <?php echo htmlspecialchars($row['Content']); ?></p>
            <span><?php echo $row['Date_chat']; ?></span>
        </div>
        <?php endwhile; ?>
    </div>

    <form method="post">
        <input type="text" name="message" required placeholder="Type your message here...">
        <button type="submit">Send</button>
    </form>
</body>

</html>