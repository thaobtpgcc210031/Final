<?php
// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'final1') 
        or die("Cannot connect database: " . mysqli_connect_error());

// Handle when the form is submitted
$successMessage = "";  // Variable to store success message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get information from the form
    $tourID = $_POST['tour_id'];
    $tourguideID = $_POST['tourguide_id'];

    // Update Tourguide for the Tour
    $updateQuery = "UPDATE tour SET Tourguide_ID = ? WHERE TourID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ii", $tourguideID, $tourID);
    
    if (mysqli_stmt_execute($stmt)) {
        $successMessage = "The Tour has been successfully assigned to the Tourguide!";
    } else {
        $successMessage = "An error occurred while assigning the tour.";
    }
}

// Get list of tours and tourguides
$tourQuery = "SELECT TourID, Tour_Name FROM tour";
$tourResult = mysqli_query($conn, $tourQuery);

$tourguideQuery = "SELECT Tourguide_ID, Tourguide_name FROM tourguide";
$tourguideResult = mysqli_query($conn, $tourguideQuery);

// Display list of assigned tours and tourguides
$query = "SELECT t.TourID, t.Tour_Name, tg.Tourguide_name
          FROM tour t
          LEFT JOIN tourguide tg ON t.Tourguide_ID = tg.Tourguide_ID";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour and Tourguide Assignment Management</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #4CAF50;
        margin-top: 20px;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .alert {
        padding: 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .alert-error {
        background-color: #f44336;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    select,
    button {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table th {
        background-color: #4CAF50;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .form-container {
        margin-bottom: 20px;
    }

    .form-container select,
    .form-container button {
        display: inline-block;
        width: 48%;
        margin-right: 4%;
    }

    .form-container button {
        width: 48%;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tour and Tourguide Assignment Management</h2>

        <?php if ($successMessage): ?>
        <div class="alert <?php echo (strpos($successMessage, "error") !== false) ? "alert-error" : ""; ?>">
            <?php echo $successMessage; ?>
        </div>
        <?php endif; ?>

        <!-- Tour and Tourguide Assignment Form -->
        <div class="form-container">
            <form action="manage_assignments.php" method="post">
                <label for="tour">Select Tour:</label>
                <select name="tour_id" id="tour" required>
                    <?php while ($tour = mysqli_fetch_assoc($tourResult)): ?>
                    <option value="<?= $tour['TourID'] ?>"><?= $tour['Tour_Name'] ?></option>
                    <?php endwhile; ?>
                </select>

                <label for="tourguide">Select Tourguide:</label>
                <select name="tourguide_id" id="tourguide" required>
                    <?php while ($tourguide = mysqli_fetch_assoc($tourguideResult)): ?>
                    <option value="<?= $tourguide['Tourguide_ID'] ?>"><?= $tourguide['Tourguide_name'] ?></option>
                    <?php endwhile; ?>
                </select>

                <button type="submit">Assign Tour to Tourguide</button>
            </form>
        </div>

        <hr>

        <!-- Display list of assigned Tours and Tourguides -->
        <h3>List of Assigned Tours and Tourguides</h3>
        <table>
            <tr>
                <th>TourID</th>
                <th>Tour Name</th>
                <th>Tourguide Name</th>
            </tr>
            <?php while ($tour = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $tour['TourID'] ?></td>
                <td><?= $tour['Tour_Name'] ?></td>
                <td><?= $tour['Tourguide_name'] ? $tour['Tourguide_name'] : 'No Tour Guide yet' ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>

<?php
// Close database connection
mysqli_close($conn);
?>