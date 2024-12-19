<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Tour</title>
</head>

<body>

    <h2>Add a New Tour</h2>

    <form action="add_tour.php" method="POST">
        <label for="Tour_Name">Tour Name:</label><br>
        <input type="text" id="Tour_Name" name="Tour_Name" required><br><br>

        <label for="Date_start">Start Date:</label><br>
        <input type="date" id="Date_start" name="Date_start" required><br><br>

        <label for="Date_end">End Date:</label><br>
        <input type="date" id="Date_end" name="Date_end" required><br><br>

        <label for="Tourguide_ID">Tourguide ID:</label><br>
        <input type="number" id="Tourguide_ID" name="Tourguide_ID" required><br><br>

        <label for="Price">Price:</label><br>
        <input type="number" id="Price" name="Price" required><br><br>

        <label for="Description">Description:</label><br>
        <textarea id="Description" name="Description" required></textarea><br><br>

        <label for="Location">Location:</label><br>
        <input type="text" id="Location" name="Location" required><br><br>

        <label for="Features">Features:</label><br>
        <input type="text" id="Features" name="Features" required><br><br>

        <label for="Quantity">Quantity:</label><br>
        <input type="number" id="Quantity" name="Quantity" required><br><br>

        <label for="Max_Tickets">Max Tickets:</label><br>
        <input type="number" id="Max_Tickets" name="Max_Tickets"><br><br>

        <button type="submit">Add Tour</button>
    </form>

</body>

</html><?php
// Connection to the database
$servername = "127.0.0.1";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "final1"; // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Tour_Name = $_POST['Tour_Name'];
    $Date_start = $_POST['Date_start'];
    $Date_end = $_POST['Date_end'];
    $Tourguide_ID = $_POST['Tourguide_ID'];
    $Price = $_POST['Price'];
    $Description = $_POST['Description'];
    $Location = $_POST['Location'];
    $Features = $_POST['Features'];
    $Quantity = $_POST['Quantity'];
    $Max_Tickets = $_POST['Max_Tickets'];

    // Insert query
    $sql = "INSERT INTO tour (Tour_Name, Date_start, Date_end, Tourguide_ID, Price, Description, Location, Features, Quantity, Max_Tickets)
            VALUES ('$Tour_Name', '$Date_start', '$Date_end', '$Tourguide_ID', '$Price', '$Description', '$Location', '$Features', '$Quantity', '$Max_Tickets')";

    if ($conn->query($sql) === TRUE) {
        echo "New tour added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>