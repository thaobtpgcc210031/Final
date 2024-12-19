<?php
// Connect to the database
include_once('connection.php');
// Get form data
$destination = $_GET['destination'];
$checkin_date = $_GET['checkin_date'];
$checkout_date = $_GET['checkout_date'];
$price_limit = $_GET['price_limit'];

// Create SQL query
$sql = "SELECT * FROM hotels WHERE destination LIKE ? AND checkin_date >= ? AND checkout_date <= ? AND price <= ?";
$stmt = $conn->prepare($sql);
$destination = "%" . $destination . "%";
$stmt->bind_param("sssi", $destination, $checkin_date, $checkout_date, $price_limit);

// Execute query
$stmt->execute();
$result = $stmt->get_result();

// Check if results were found
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Destination: " . $row["destination"]. " - Price: " . $row["price"]. " - Check-in Date: " . $row["checkin_date"]. " - Check-out Date: " . $row["checkout_date"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
