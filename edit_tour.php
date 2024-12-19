<?php
include_once("connection.php");


// Check if TourID is provided in the URL
if (isset($_GET['TourID'])) {
    $tourID = intval($_GET['TourID']);

    // Prepare and execute the query to get tour details
    $sql = "SELECT Tour_Name, Date_start, Date_end, Price, Location, Description
            FROM tour
            WHERE TourID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tourID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $tour = $result->fetch_assoc();
        } else {
            echo "No tour found.";
            exit;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
        exit;
    }

    $conn->close();
} else {
    echo "No TourID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour</title>
</head>

<body>
    <h1>Edit Tour</h1>
    <form action="edit_tour_process.php" method="post">
        <input type="hidden" name="TourID" value="<?php echo htmlspecialchars($tour["TourID"]); ?>">

        <label for="Tour_Name">Tour Name:</label>
        <input type="text" id="Tour_Name" name="Tour_Name" value="<?php echo htmlspecialchars($tour["Tour_Name"]); ?>"
            required><br>

        <label for="Date_start">Date Start:</label>
        <input type="date" id="Date_start" name="Date_start"
            value="<?php echo htmlspecialchars($tour["Date_start"]); ?>" required><br>

        <label for="Date_end">Date End:</label>
        <input type="date" id="Date_end" name="Date_end" value="<?php echo htmlspecialchars($tour["Date_end"]); ?>"
            required><br>

        <label for="Price">Price:</label>
        <input type="number" id="Price" name="Price" value="<?php echo htmlspecialchars($tour["Price"]); ?>" step="0.01"
            required><br>

        <label for="Location">Location:</label>
        <input type="text" id="Location" name="Location" value="<?php echo htmlspecialchars($tour["Location"]); ?>"
            required><br>

        <label for="Description">Description:</label>
        <textarea id="Description" name="Description"
            required><?php echo htmlspecialchars($tour["Description"]); ?></textarea><br>

        <input type="submit" value="Update Tour">
    </form>
    <a href="index.php">Back to List</a>
</body>

</html>