<?php
// Kết nối đến cơ sở dữ liệu
include_once('connection.php');

// Kiểm tra xem Tour_ID có tồn tại không
if (isset($_GET['Tour_ID'])) {
    $tour_id = $_GET['Tour_ID']; // Lấy Tour ID từ URL

    // Kiểm tra kết nối PDO
    if (isset($pdo)) {
        // Lấy tất cả các tin nhắn liên quan đến Tour_ID
        $query = "SELECT * FROM chat WHERE Tour_ID = :Tour_ID ORDER BY Date_chat ASC";
        $statement = $pdo->prepare($query);
        $statement->execute([':Tour_ID' => $tour_id]);
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        die("Database connection is not established.");
    }
} else {
    die("Tour_ID is not provided in the URL.");
}
?>

<div id="chatMessages" class="chat-messages">
    <?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
    <p class="<?= $message['Traveller_ID'] == $_SESSION['Traveller_ID'] ? 'sent' : 'received'; ?>">
        <?= htmlspecialchars($message['Content']); ?>
    </p>
    <?php endforeach; ?>
    <?php else: ?>
    <p>No messages found for this tour.</p>
    <?php endif; ?>
</div>