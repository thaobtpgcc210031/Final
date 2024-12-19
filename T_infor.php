<?php
session_start();  // Start session to get user session info

$Tourguide_ID = $_SESSION['Tourguide_ID'];  // Get the Tourguide ID from session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get tour guide's information from the database
$sql = "SELECT * FROM tourguide WHERE Tourguide_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Tourguide_ID);
$stmt->execute();
$result = $stmt->get_result();
$tourguide = $result->fetch_assoc();

if (!$tourguide) {
    die("Tour guide information not found.");
}

// Handle update when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Tourguide_name = $_POST['Tourguide_name'];
    $Birthday = $_POST['Birthday'];
    $Experience = $_POST['Experience'];
    $Email = $_POST['Email'];

    // Password is only updated if a new one is provided
    $Password = isset($_POST['Password']) && $_POST['Password'] != '' ? $_POST['Password'] : $tourguide['Password'];

    $update_sql = "UPDATE tourguide SET Tourguide_name = ?, Birthday = ?, Experience = ?, Email = ?, Password = ? WHERE Tourguide_ID = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $Tourguide_name, $Birthday, $Experience, $Email, $Password, $Tourguide_ID);

    if ($update_stmt->execute()) {
        echo "Information updated successfully!";
    } else {
        echo "Error updating information: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tourguide Information</title>
    <style>
    /* Basic styling for the body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    /* Styling the container */
    .container {
        width: 60%;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Heading style */
    h2 {
        text-align: center;
        color: #333;
        font-size: 28px;
        margin-bottom: 30px;
    }

    /* Label styling */
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555;
    }

    /* Input field and textarea styling */
    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="password"],
    textarea {
        width: 100%;
        padding: 14px;
        margin-bottom: 18px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 16px;
        color: #333;
    }

    /* Textarea specific styles */
    textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Buttons styling */
    input[type="submit"],
    .cancel-button {
        background-color: #4CAF50;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        width: 48%;
        display: inline-block;
        text-align: center;
        transition: background-color 0.3s;
    }

    /* Cancel button with different color */
    .cancel-button {
        background-color: #f44336;
        margin-right: 0;
    }

    /* Hover effect for buttons */
    input[type="submit"]:hover,
    .cancel-button:hover {
        background-color: #45a049;
    }

    /* Form buttons container */
    .form-buttons {
        margin-top: 20px;
        text-align: center;
    }

    /* Additional spacing for form groups */
    .form-group {
        margin-bottom: 25px;
    }

    /* Success message styling */
    .message {
        text-align: center;
        font-size: 18px;
        color: green;
        font-weight: bold;
        margin-top: 20px;
    }

    /* Error message styling */
    .error-message {
        text-align: center;
        font-size: 18px;
        color: red;
        font-weight: bold;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Tourguide Information</h2>
        <?php if (isset($update_stmt) && $update_stmt->execute()): ?>
        <div class="message">Information updated successfully!</div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="Tourguide_name">Tourguide Name:</label>
                <input type="text" id="Tourguide_name" name="Tourguide_name"
                    value="<?php echo htmlspecialchars($tourguide['Tourguide_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Birthday">Birthday:</label>
                <input type="date" id="Birthday" name="Birthday" value="<?php echo $tourguide['Birthday']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Experience">Experience:</label>
                <textarea id="Experience" name="Experience"
                    required><?php echo htmlspecialchars($tourguide['Experience']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($tourguide['Email']); ?>"
                    required>
            </div>

            <div class="form-buttons">
                <input type="submit" value="Update">
                <input type="button" value="Cancel" class="cancel-button" onclick="window.history.back();">
            </div>


        </form>
    </div>
</body>

</html>