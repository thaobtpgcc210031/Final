

<?php
// Connect to the database
include_once('connection.php');

// Check if form data exists
if (isset($_GET['Tour_name']) && isset($_GET['Date_start']) && isset($_GET['Date_end']) && isset($_GET['Price']) && isset($_GET['Location'])) {
    // Get form data
    $tour_name = $_GET['Tour_name'];
    $date_start = $_GET['Date_start'];
    $date_end = $_GET['Date_end'];
    $price_limit = $_GET['Price'];
    $location = $_GET['Location'];

    // Create SQL query with placeholders
    $sql = "SELECT * FROM tour WHERE Tour_name LIKE ? OR Date_start >= ? OR Date_end <= ? OR Price <= ? OR Location LIKE ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Add wildcards for LIKE comparison
        $tour_name = "%" . $tour_name . "%";
        $location = "%" . $location . "%";

        // Bind parameters to the statement
        $stmt->bind_param("sssds", $tour_name, $date_start, $date_end, $price_limit, $location);

        // Execute query
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if results were found
        if ($result && $result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "Tour Name: " . $row["Tour_name"] . " - Price: " . $row["Price"] . " - Start Date: " . $row["Date_start"] . " - End Date: " . $row["Date_end"] . " - Location: " . $row["Location"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Required parameters not set.";
}

// Close connection
$conn->close();
?>
