<?php
session_start();
include_once("connection.php");

// Check if the user is logged in
if (!isset($_SESSION["Traveller_ID"])) {
    header("Location: login.php");
    exit();
}

// Get the user ID from session
$user_id = $_SESSION["Traveller_ID"];

// Fetch user details from the database
$query = "SELECT * FROM traveller WHERE Traveller_ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $id = $user["Traveller_ID"];
    $name = $user["Traveller_Name"];
    $birt = $user["Birthday"];
    $gen = $user["Gender"];
    $tel = $user["Phone"];
    $adress = $user["Adress"];
    $mail = $user["Email"];
} else {
    echo "User not found.";
    exit();
}

// Handle form submission for updating profile
if (isset($_POST['btnUpdate'])) {
    $traveller_id = $id; // Use the ID of the logged-in user
    $traveller_name = $_POST['txtTraveller_Name'];
    $birthday = $_POST['txtBirthday'];
    $gender = $_POST['cbGender'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['txtAdress'];
    $email = $_POST['txtEmail'];

    // SQL statement to update user information
    $update_sql = "UPDATE traveller SET 
        Traveller_Name = ?,
        Birthday = ?,
        Gender = ?,
        Phone = ?,
        Adress = ?,
        Email = ?
        WHERE Traveller_ID = ?";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssssi", $traveller_name, $birthday, $gender, $phone, $address, $email, $traveller_id);

    if ($stmt->execute()) {
        echo "<script>alert('Update successful');</script>";
        // Redirect after successful update if needed
        // header("Location: profile.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   
</head>
<style>
    body {
    font-family: Montserrat, sans-serif;
    background: #28223f;
    margin: 0;
    padding: 0;
}

.container {
    user-select: none;
    margin: 50px auto;
    background: #231e39;
    color: #b3b8cd;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 15px 30px rgba(0,0,0,.75);
    padding: 20px;
    box-sizing: border-box;
}

.cover-photo {
    background: url(cover.jpg) no-repeat center center;
    background-size: cover;
    height: 160px;
    width: 100%;
    border-radius: 10px 10px 0 0;
    position: relative;
}

.profile {
    height: 120px;
    width: 120px;
    border-radius: 50%;
    border: 3px solid #1f1a32;
    background: #292343;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    object-fit: cover;
}

.profile-name {
    font-size: 26px;
    font-weight: bold;
    margin: 80px 0 20px;
    color: #fff;
}

label {
    label {
    font-weight: bold;
    color: #d0d0d0;
    display: block;
    margin-bottom: 5px;
    font-size: 16px; /* Adjust the font size as needed */
}

}

input[type="text"],
input[type="date"],
input[type="email"],
select {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #444;
    background: #333;
    color: #ddd;
}

input[type="text"]:focus,
input[type="date"]:focus,
input[type="email"]:focus,
select:focus {
    border-color: #03bfbc;
    outline: none;
}

button {
    margin: 10px 5px;
    padding: 10px 20px;
    border-radius: 5px;
    font-family: Montserrat, sans-serif;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.msg-btn {
    background: #03bfbc;
    color: #231e39;
}

.msg-btn:hover {
    background: #02899c;
    color: #fff;
}

.follower-btn {
    background: transparent;
    border: 1px solid #03bfbc;
    color: #03bfbc;
}

.follower-btn:hover {
    color: #231e39;
    background: #03bfbc;
}

.container i {
    font-size: 24px;
    margin: 10px 5px;
    color: #d0d0d0;
    transition: color 0.3s;
}

.container i:hover {
    color: #03bfbc;
}

.btn-back {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #03bfbc;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-back:hover {
    background: #02899c;
}


   </style>
<body>
    <div class="container">
        <div class="cover-photo">
            <img id="profileImage" class="profile" alt="Random Anime Avatar">
        </div>
        <h2>Profile Information</h2>
        <div class="profile-name">
        <label for="txtTraveller_Name"><?php echo htmlspecialchars($name); ?></label>
        <input type="text" name="txtTraveller_Name" value="<?php echo htmlspecialchars($name); ?>" id="txtTraveller_Name">

        </div>
       
        <div class="birthday">
        <label for="txtBirthday">Birthday:</label>
            <input type="date" name="txtBirthday" value="<?php echo htmlspecialchars($birt); ?>" id="txtBirthday">
        </div>
        <div class="gender">
        <label for="cbGender">Gender:</label>
            <select name="cbGender" id="cbGender">
                <option value="Male" <?php if ($gen == "Male") echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($gen == "Female") echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if ($gen == "Other") echo 'selected'; ?>>Other</option>
            </select>

        </div>
<div class="phone">
<label for="txtPhone">Phone:</label>
<input type="text" name="txtPhone" value="<?php echo htmlspecialchars($tel); ?>" id="txtPhone">
</div>

<div class="address">
<label for="txtAdress">Address:</label>
            <input type="text" name="txtAdress" value="<?php echo htmlspecialchars($adress); ?>" id="txtAdress">      
</div>
<div class="email">
<label for="txtEmail">Email:</label>
<input type="email" name="txtEmail" value="<?php echo htmlspecialchars($mail); ?>" id="txtEmail">
</div>

        
        <button class="msg-btn" name="btnUpdate">Update</button>
        <button class="follower-btn">Following</button>
        <div>
            <i class="fa fa-facebook-f"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-twitter"></i>
            
        </div>
        <a href="javascript:history.back()" class="btn-back">Back</a>
    </div>

    <script>
        function fetchAvatar() {
            const avatarUrl = 'https://api.waifu.pics/sfw/waifu';
            fetch(avatarUrl)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('profileImage').src = data.url;
                })
                .catch(error => console.error('Error fetching avatar:', error));
        }

        // Fetch an avatar when the page loads
        window.onload = fetchAvatar;
    </script>
</body>
</html>
