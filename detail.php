<?php
// Database connection
include_once('connection.php');

// Get the tour_id from URL
$tourID = isset($_GET['TourID']) ? intval($_GET['TourID']) : 0;

// Prepare and execute query to fetch tour details
$query = "SELECT * FROM tour WHERE TourID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $tourID);
$stmt->execute();
$result = $stmt->get_result();

// Check if the tour exists
if ($result->num_rows > 0) {
    $tour = $result->fetch_assoc();
} else {
    echo "Tour not found.";
    exit;
}

// Close the connection
$stmt->close();
$conn->close();
?>
<style>
<style>

/* Your CSS for detail.php */
.product-image img {
    width: 100%;
    height: auto;
    max-width: 400px;
}

.product-details {
    margin-left: 20px;
}

.product-details h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-details .price {
    font-size: 20px;
    color: #ff4081;
    margin-bottom: 10px;
}

.product-info p {
    font-size: 16px;
    margin: 5px 0;
}

.quantity {
    margin: 15px 0;
}

.quantity input {
    width: 50px;
    padding: 5px;
}

.buttons {
    margin-top: 15px;
}

.add-to-cart,
.buy-now {
    background-color: #ff4081;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
    border-radius: 5px;
}

.add-to-cart:hover,
.buy-now:hover {
    background-color: #e60073;
}
</style>

</style>
<div class="product-image">
    <img src="<?php echo htmlspecialchars($tour['Image']); ?>"
        alt="<?php echo htmlspecialchars($tour['Tour_Name']); ?>">
</div>
<div class="product-details">
    <h2><?php echo htmlspecialchars($tour['Tour_Name']); ?></h2>
    <p class="price"><?php echo number_format($tour['Price'], 0, ',', '.'); ?>₫</p>
    <div class="product-info">
        <p><i class="icon-delivery"></i> Giao hàng toàn quốc</p>
        <p><i class="icon-payment"></i> Thanh toán khi nhận hàng</p>
        <p><i class="icon-return"></i> Cam kết đổi/trả hàng miễn phí</p>
        <p><i class="icon-warranty"></i> Hàng chính hãng/Bảo hành 10 năm</p>
    </div>
    <div class="quantity">
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
    </div>
    <div class="buttons">
        <button class="add-to-cart">Thêm vào giỏ hàng</button>
        <button class="buy-now">Mua ngay</button>
    </div>
</div>