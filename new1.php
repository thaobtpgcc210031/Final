<?php
include_once('connection.php');
// Ensure $pro_id is set from the request
if (isset($_GET['id'])) {
    $pro_id = intval($_GET['id']); // Ensure it's an integer
} else {
    die("Product ID is not specified.");
}

// Initialize can_comment
$can_comment = false; // Default to false

// Logic to set $can_comment
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $order_check_query = "SELECT COUNT(*) as order_count FROM orders WHERE user_id = '$user_id' AND status = 'completed'";
    $order_result = mysqli_query($conn, $order_check_query);
    
    if ($order_result) {
        $order_row = mysqli_fetch_assoc($order_result);
        if ($order_row['order_count'] > 0) {
            $can_comment = true; // User can comment
        }
    } else {
        die("Failed to check orders: " . mysqli_error($conn));
    }
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    if ($can_comment) {
        $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
        $traveller_id = $user_id; // Assuming user ID is stored in session
        $traveller_name = $_SESSION['user_name']; // Assuming you have traveller's name in session

        $insert_comment_query = "INSERT INTO feedback (Traveller_ID, Traveller_Name, TourID, Comment) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_comment_query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'isis', $traveller_id, $traveller_name, $pro_id, $comment_text);
            if (mysqli_stmt_execute($stmt)) {
                echo "<p>Comment submitted successfully!</p>";
            } else {
                echo "<p>Error submitting comment: " . mysqli_stmt_error($stmt) . "</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<p>Prepare failed: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>You can only comment on this product once you have completed your order.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Detail</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional: Your CSS file -->
</head>

<body>
    <div class="comment-section">
        <h3>Comments:</h3>
        <?php if ($can_comment): ?>
        <form action="?page=detail&id=<?php echo $pro_id; ?>" method="post">
            <textarea name="comment_text" rows="4" required placeholder="Leave your comment..."></textarea>
            <button type="submit" name="submit_comment">Submit Comment</button>
        </form>
        <?php else: ?>
        <p>You can only comment on this product once you have completed your order.</p>
        <?php endif; ?>

        <div class="existing-comments">
            <?php
            // Fetch existing comments for the tour
            $comments_query = "SELECT f.Comment, f.created_at, f.Traveller_Name 
                               FROM feedback f 
                               WHERE f.TourID = ? 
                               ORDER BY f.created_at DESC";

            // Use a prepared statement
            $stmt = mysqli_prepare($conn, $comments_query);
            if (!$stmt) {
                die("Prepare failed: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, 'i', $pro_id); // Assuming $pro_id is TourID
            mysqli_stmt_execute($stmt);
            $comments_result = mysqli_stmt_get_result($stmt);

            if ($comments_result && mysqli_num_rows($comments_result) > 0) {
                while ($comment_row = mysqli_fetch_assoc($comments_result)) {
                    echo "<div class='comment'>";
                    echo "<p><strong>" . htmlspecialchars($comment_row['Traveller_Name']) . ":</strong> " . htmlspecialchars($comment_row['Comment']) . "</p>";
                    echo "<small>Posted on: " . htmlspecialchars($comment_row['created_at']) . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>No comments yet. Be the first to comment!</p>";
            }
            mysqli_stmt_close($stmt);
            ?>
        </div>
    </div>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>