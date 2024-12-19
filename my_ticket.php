<?php
session_start();
include_once("connection.php");
$sql = "SELECT tour.TourID, tour.Date_start, tour.Date_end, tourguide.Tourguide_name, tour.Price, tour.Description, tour.Location, tour.Image
        FROM tour
        JOIN tourguide ON tour.Tourguide_ID = tourguide.Tourguide_ID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dream Destinations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="css/jquery.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel=" stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dream Destinations<span>Travel Friendly</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="tours.php" class="nav-link">Tour</a></li>
                    <li class="nav-item"><a href="hotel.php" class="nav-link">Hotel</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php if (isset($_SESSION['Traveller_Name'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo htmlspecialchars($_SESSION['Traveller_Name']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="infor.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            <a class="dropdown-item" href="cart.php">Cart</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- END nav -->


    <?php
include_once("connection.php");

// Remove the login requirement
// session_start();  // No need to start session if login isn't required

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Handle ticket payment
if (isset($_POST['pay_selected'])) {
    if (isset($_POST['pay_ticket_ids']) && is_array($_POST['pay_ticket_ids']) && count($_POST['pay_ticket_ids']) > 0) {
        // Get the selected ticket IDs
        $ticket_ids = array_map('intval', $_POST['pay_ticket_ids']); // Ensure IDs are integers
        $placeholders = implode(',', array_fill(0, count($ticket_ids), '?'));

        // Prepare the SQL statement to update the "Payed" field for the selected tickets
        $sql_update = "UPDATE ticket SET Payed = 1 WHERE Ticket_ID IN ($placeholders)";
        if ($stmt_update = $conn->prepare($sql_update)) {
            $types = str_repeat('i', count($ticket_ids));  // Prepare the types for binding
            // Bind the parameters and execute the statement
            $stmt_update->bind_param($types, ...$ticket_ids);
            $stmt_update->execute();

            echo "<p class='alert alert-success'>Payment successful, selected tickets updated as paid.</p>";
            // Redirect to payment page after updating status
            $ticket_ids_str = implode(',', $ticket_ids);
            header("Location: payment.php?ticket_ids=" . urlencode($ticket_ids_str));
            exit();
        } else {
            echo "<p class='alert alert-danger'>Failed to update payment status: " . $stmt_update->error . "</p>";
        }
    } else {
        echo "<script>alert('Please select at least one ticket to proceed with payment.');</script>";
    }
}

// Handle ticket deletion
if (isset($_POST['delete_selected'])) {
    if (isset($_POST['pay_ticket_ids']) && is_array($_POST['pay_ticket_ids']) && count($_POST['pay_ticket_ids']) > 0) {
        $ticket_ids = array_map('intval', $_POST['pay_ticket_ids']); // Ensure IDs are integers
        $placeholders = implode(',', array_fill(0, count($ticket_ids), '?'));

        $sql_delete = "DELETE FROM ticket WHERE Ticket_ID IN ($placeholders)";
        if ($stmt_delete = $conn->prepare($sql_delete)) {
            $types = str_repeat('i', count($ticket_ids));
            $stmt_delete->bind_param($types, ...$ticket_ids);
            $stmt_delete->execute();

            echo "<p class='alert alert-success'>Selected tickets successfully deleted.</p>";
            header("Location: my_ticket.php");
            exit();
        } else {
            echo "<p class='alert alert-danger'>Failed to delete tickets: " . $stmt_delete->error . "</p>";
        }
    } else {
        echo "<script>alert('No tickets selected to delete.');</script>";
    }
}

// Fetch user tickets (no session-based Traveller_ID)
$sql_tickets = "SELECT t.*, ti.Ticket_ID, ti.Date_booking, ti.Payed
                FROM ticket ti
                INNER JOIN tour t ON ti.TourID = t.TourID
                WHERE ti.Payed = 0";  // No Traveller_ID restriction

$stmt_tickets = $conn->prepare($sql_tickets);
$stmt_tickets->execute();
$result_tickets = $stmt_tickets->get_result();

// Fetch total amount spent (no session-based Traveller_ID)
$sql_total_spent = "SELECT SUM(t.Price) AS total_spent
                    FROM tour t
                    INNER JOIN ticket ti ON t.TourID = ti.TourID
                    WHERE ti.Payed = 0";

$stmt_total_spent = $conn->prepare($sql_total_spent);
$stmt_total_spent->execute();
$result_total_spent = $stmt_total_spent->get_result();

$total_spent = 0;
if ($result_total_spent->num_rows > 0) {
    $row = $result_total_spent->fetch_assoc();
    $total_spent = $row['total_spent'];
}

$conn->close();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Tickets and Total Spent</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h1>My Tickets</h1>

            <form action="my_ticket.php" method="POST">
                <?php
            if ($result_tickets->num_rows > 0) {
            ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Tour Name</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Date Booked</th>
                            <th>Payed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result_tickets->fetch_assoc()) {
                            $payed_status = ($row['Payed'] == '1') ? 'Yes' : 'No';
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="pay_ticket_ids[]"
                                    value="<?php echo htmlspecialchars($row['Ticket_ID']); ?>">
                            </td>
                            <td>
                                <a href="detail_tour.php?TourID=<?php echo htmlspecialchars($row['TourID']); ?>">
                                    <?php echo htmlspecialchars($row['Tour_Name']); ?>
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($row['Description']); ?></td>
                            <td><?php echo htmlspecialchars($row['Location']); ?></td>
                            <td><?php echo '$' . number_format($row['Price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['Date_start']); ?></td>
                            <td><?php echo htmlspecialchars($row['Date_end']); ?></td>
                            <td><?php echo htmlspecialchars($row['Date_booking']); ?></td>
                            <td><?php echo $payed_status; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit" name="pay_selected" class="btn btn-primary mt-3">Pay Selected Tickets</button>
                <button type="submit" name="delete_selected" class="btn btn-danger mt-3">Delete Selected
                    Tickets</button>
                <?php
            } else {
                echo "<p>No tickets found.</p>";
            }
            ?>
            </form>

            <div class="total-spent mt-5">
                <h2>Total Spent on Tours</h2>
                <p><?php echo '$' . number_format($total_spent, 2); ?></p>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>


    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far away, beyond the mountains of words, far from the lands of Sound and Rhyme, there dwell
                            the silent letters.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Infromation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Tour</a></li>
                            <li><a href="#" class="py-2 d-block">Hotel</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Place</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Ho Chi Minh</a></li>
                            <li><a href="#" class="py-2 d-block">Da Nang</a></li>
                            <li><a href="#" class="py-2 d-block">Ha Noi</a></li>
                            <li><a href="#" class="py-2 d-block">Hoi An</a></li>
                            <li><a href="#" class="py-2 d-block">Can Tho</a></li>
                            <li><a href="#" class="py-2 d-block">Kien Giang</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">26, Pham Ngoc
                                        Thach,
                                        Thi Tran Tan Hiep, huyen Tan Hiep, tinh Kien Giang, Viet Nam
                                    </span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span
                                            class="text">+84522120895</span></a>
                                </li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text">buitha29012003@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>