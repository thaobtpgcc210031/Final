<?php
// Include database connection file
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $tourguide_name = $_POST['tourguide_name'];
    $birthday = $_POST['birthday'];
    $experience = $_POST['experience'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO tourguide (Tourguide_name, Birthday, Experience, Email, Password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $tourguide_name, $birthday, $experience, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New tour guide added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tour Guide</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
<body>
    <h1>Add New Tour Guide</h1>
    <form action="add_tourguide.php" method="post">
        <label for="tourguide_name">Name:</label>
        <input type="text" id="tourguide_name" name="tourguide_name" required><br><br>
        
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required><br><br>

        <label for="experience">Experience:</label>
        <textarea id="experience" name="experience" rows="4" cols="50" required></textarea><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Add Tour Guide">
    </form>
</body>
</html>

