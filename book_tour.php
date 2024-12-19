<?php
include_once('connection.php'); 

$tourID = isset($_GET['TourID']) ? $_GET['TourID'] : 1; 

// Query to get tour details
$sql = "SELECT 
            t.TourID,
            t.Tour_Name,
            t.Date_start,
            t.Date_end,
            t.Price,
            t.Description AS Tour_Description,
            t.Location AS Tour_Location,
            d.Discription AS Detail_Description,
            d.Note,
            l.Location_Name,
            h.Hotel_Name,
            h.HAdress AS Hotel_Address,
            h.HPhone AS Hotel_Phone,
            r.Rest_Name AS Restaurant_Name,
            a.Activity_Name AS Activity_Name,
            v.Vehicle_Name AS Vehicle_Name
        FROM 
            tour t
        JOIN 
            detail_tour d ON t.TourID = d.Tour_ID
        JOIN 
            location l ON d.Location_ID = l.Location_ID
        JOIN 
            hotel h ON d.Hotel_ID = h.Hotel_ID
        JOIN 
            restaurant r ON d.Rest_ID = r.Rest_ID
        JOIN 
            activity a ON d.Activity_ID = a.Activity_ID
        JOIN 
            vehicle v ON d.Vehicle_ID = v.Vehicle_ID
        WHERE 
            t.TourID = $tourID";

$result = $conn->query($sql);

// Check if the tour was found
if ($result->num_rows > 0) {
    // Get the tour data
    $row = $result->fetch_assoc();
} else {
    echo "Không tìm thấy tour!";
    exit; // Stop if the tour is not found
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    .tour-info p {
        font-size: 16px;
    }

    .total-price {
        font-weight: bold;
        margin-top: 10px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
    <script>
    function calculateTotal() {
        var pricePerTicket = <?php echo $row['Price']; ?>;
        var quantity = document.getElementById("ticketQuantity").value;
        var total = pricePerTicket * quantity;
        document.getElementById("totalPrice").innerText = "Tổng tiền: " + total.toLocaleString() + " VND";
    }
    </script>
</head>

<body>

    <div class="container">
        <h1>Đặt Tour</h1>

        <div class="tour-info">
            <p><strong>Tên tour:</strong> <?php echo $row['Tour_Name']; ?></p>
            <p><strong>Thời gian:</strong> <?php echo $row['Date_start']; ?> - <?php echo $row['Date_end']; ?></p>
            <p><strong>Giá vé:</strong> <?php echo $row['Price']; ?> VND</p>
            <p><strong>Địa điểm:</strong> <?php echo $row['Tour_Location']; ?></p>
            <p><strong>Mô tả:</strong> <?php echo $row['Tour_Description']; ?></p>
        </div>

        <div class="section">
            <h2>Đặt Tour Ngay</h2>
            <form action="process_booking.php" method="POST">
                <label for="ticketQuantity">Số lượng vé:</label>
                <input type="number" id="ticketQuantity" name="ticketQuantity" min="1" value="1"
                    onchange="calculateTotal()">
                <div id="totalPrice" class="total-price">Tổng tiền: <?php echo $row['Price']; ?> VND</div>
                <input type="hidden" name="tourID" value="<?php echo $row['TourID']; ?>">
                <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
                <button type="submit">Đặt Tour</button>
            </form>
        </div>
    </div>

</body>

</html>