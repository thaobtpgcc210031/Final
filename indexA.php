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
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Dream Destinations<span>Travel Friendly</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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
                <?php if (isset($_SESSION['Admin_Name'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo htmlspecialchars($_SESSION['Admin_Name']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="infor.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
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
	
	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate">
					<span class="subheading">Welcome to Dream Destinations</span>
					<h1 class="mb-4">Discover Your Favorite Place with Us</h1>
					<p class="caps">Travel to the any corner of the world, without going around in circles</p>
				</div>
				<!-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
					<span class="fa fa-play"></span>
				</a> -->
				<video height="300px" width="400px" src="images/Vietnam.mp4" type="video/mp4" autoplay muted loop></video>
			</div>
		</div>
	</div>
	
	<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ftco-search d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>
                                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>
                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                    <form action="search_tour.php" method="GET" class="search-property-1">
                                        <div class="row no-gutters">
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="tour_name">Name</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input type="text" name="tour_name" id="tour_name" class="form-control" placeholder="Tour Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="date_start">Date Start</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="date_start" id="date_start" class="form-control" placeholder="Date Start">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="date_end">Date End</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="date_end" id="date_end" class="form-control" placeholder="Date End">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="price">Price</label>
                                                    <div class="form-field">
                                                        <input type="number" name="price" id="price" class="form-control" placeholder="Price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="location">Location</label>
                                                    <div class="form-field">
                                                        <input type="text" name="location" id="location" class="form-control" placeholder="Location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Hotel Search Form -->
                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                    <form action="search_hotel.php" method="GET" class="search-property-1">
                                        <div class="row no-gutters">
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="destination">Destination</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input type="text" name="destination" id="destination" class="form-control" placeholder="Search place">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="checkin_date">Check-in Date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="checkin_date" id="checkin_date" class="form-control" placeholder="Check In Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="checkout_date">Check-out Date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="checkout_date" id="checkout_date" class="form-control" placeholder="Check Out Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="price_limit">Price Limit</label>
                                                    <div class="form-field">
                                                        <input type="number" name="price_limit" id="price_limit" class="form-control" placeholder="Price Limit">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="hotel_location">Location</label>
                                                    <div class="form-field">
                                                        <input type="text" name="hotel_location" id="hotel_location" class="form-control" placeholder="Location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
// Connection
include_once('connection.php');

// Variables
$location = isset($_GET['location']) ? $_GET['location'] : '';
$date_start = isset($_GET['date_start']) ? $_GET['date_start'] : '';
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] : '';
$tour_name = isset($_GET['tour_name']) ? $_GET['tour_name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// Search query
if ($location || $date_start || $date_end || $tour_name || $price) {
    $sql = "SELECT * FROM tour WHERE 1=1";

    if ($location) {
        $sql .= " AND Location LIKE '%" . $conn->real_escape_string($location) . "%'";
    }

    if ($date_start) {
        $sql .= " AND Date_start >= '" . $conn->real_escape_string($date_start) . "'";
    }

    if ($date_end) {
        $sql .= " AND Date_end <= '" . $conn->real_escape_string($date_end) . "'";
    }

    if ($tour_name) {
        $sql .= " AND Tour_Name LIKE '%" . $conn->real_escape_string($tour_name) . "%'";
    }

    if ($price) {
        $sql .= " AND Price <= " . $conn->real_escape_string($price); // Assuming you want <= for price
    }

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Tour Name: " . $row["Tour_Name"] . "<br>";
            echo "Location: " . $row["Location"] . "<br>";
            echo "Start Date: " . $row["Date_start"] . "<br>";
            echo "End Date: " . $row["Date_end"] . "<br>";
            echo "Price: " . $row["Price"] . "<br><br>";
        }
    } else {
        echo "No results found";
    }
} else {
    echo "Please enter search criteria.";
}

$conn->close();
?>
    </div>
</section>



		<section class="ftco-section services-section">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
						<div class="w-100">
							<span class="subheading">Welcome to Pacific</span>
							<h2 class="mb-4">It's time to start your adventure</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
							A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							<p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-1 d-block img" style="background-image: url(images/services-1.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Activities</h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-2 d-block img" style="background-image: url(images/services-2.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Travel Arrangements</h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary</p>
									</div>
								</div>    
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-3 d-block img" style="background-image: url(images/services-3.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Private Guide</h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-4 d-block img" style="background-image: url(images/services-4.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Location Manager</h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary</p>
									</div>
								</div>      
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section img ftco-select-destination" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Pacific Provide Places</span>
						<h2 class="mb-4">Select Your Destination</h2>
					</div>
				</div>
			</div>
			<div class="container container-2">
				<div class="row">
					<div class="col-md-12">
						<div class="carousel-destination owl-carousel ftco-animate">
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url(images/place-1.jpg);">
										<div class="text">
											<h3>Philippines</h3>
											<span>8 Tours</span>
										</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url(images/place-2.jpg);">
										<div class="text">
											<h3>Canada</h3>
											<span>2 Tours</span>
										</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url(images/place-3.jpg);">
										<div class="text">
											<h3>Thailand</h3>
											<span>5 Tours</span>
										</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url(images/place-4.jpg);">
										<div class="text">
											<h3>Autralia</h3>
											<span>5 Tours</span>
										</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url(images/place-5.jpg);">
										<div class="text">
											<h3>Greece</h3>
											<span>7 Tours</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Destination</span>
						<h2 class="mb-4">Tour Destination</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-1.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">8 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-mountains"></span>Near Mountain</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-2.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">10 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-3.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">7 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-4.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">8 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-5.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">10 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<a href="#" class="img" style="background-image: url(images/destination-6.jpg);">
								<span class="price">$550/person</span>
							</a>
							<div class="text p-4">
								<span class="days">7 Days Tour</span>
								<h3><a href="#">Banaue Rice Terraces</a></h3>
								<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
								<ul>
									<li><span class="flaticon-shower"></span>2</li>
									<li><span class="flaticon-king-size"></span>3</li>
									<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
	<?php
	  include_once("connection.php");

	$sql = "SELECT t.TourID, t.Date_start, t.Date_end, t.Price, t.Description, t.Location, t.Image, l.Location_Name
        FROM tour t
        JOIN detail_tour dt ON t.TourID = dt.Tour_ID
        JOIN location l ON dt.Location_ID = l.Location_ID
        ORDER BY t.Date_start ASC";
$result = $conn->query($sql);

?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destination</span>
                <h2 class="mb-4">Tour Destination</h2>
            </div>
        </div>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $imagePath = "images/" . $row["Image"];
                    $tourName = $row["Location_Name"];
                    $price = $row["Price"];
                    $days = (strtotime($row["Date_end"]) - strtotime($row["Date_start"])) / 86400; // Calculate number of days
                    $location = $row["Location"];
                    $tourID = $row["TourID"]; // Get the TourID

                    echo '<div class="col-md-4 ftco-animate">
                            <div class="project-wrap">
                                <a href="#" class="img" style="background-image: url(' . $imagePath . ');">
                                    <span class="price">$' . $price . '/person</span>
                                </a>
                                <div class="text p-4">
                                    <span class="days">' . $days . ' Days Tour</span>
                                    <h3><a href="#">' . $tourName . '</a></h3>
                                    <p class="location"><span class="fa fa-map-marker"></span> ' . $location . '</p>
                                    <ul>
                                        <li><span class="flaticon-shower"></span>2</li>
                                        <li><span class="flaticon-king-size"></span>3</li>
                                        <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
                                    </ul>
                                    <a href="tour_detail.php?TourID=' . $tourID . '" class="btn btn-primary">View Details</a> <!-- Added button -->
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>No tours available.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</section>

		<section class="ftco-section ftco-about img"style="background-image: url(images/bg_4.jpg);">
			<div class="overlay"></div>
			<div class="container py-md-5">
				<div class="row py-md-5">
					<div class="col-md d-flex align-items-center justify-content-center">
						<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
							<span class="fa fa-play"></span>
						
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-about ftco-no-pt img">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-12 about-intro">
						<div class="row">
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(images/about-1.jpg);">
								</div>
							</div>
							<div class="col-md-6 pl-md-5 py-5">
								<div class="row justify-content-start pb-3">
									<div class="col-md-12 heading-section ftco-animate">
										<span class="subheading">About Us</span>
										<h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
										<p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
						<span class="subheading">Testimonial</span>
						<h2 class="mb-4">Tourist Feedback</h2>
					</div>
				</div>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel">
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>
										<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Our Blog</span>
						<h2 class="mb-4">Recent Post</h2>
					</div>
				</div>
				<div class="row d-flex">
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="blog-single.php" class="block-20" style="background-image: url('images/image_1.jpg');">
							</a>
							<div class="text">
								<div class="d-flex align-items-center mb-4 topp">
									<div class="one">
										<span class="day">11</span>
									</div>
									<div class="two">
										<span class="yr">2020</span>
										<span class="mos">September</span>
									</div>
								</div>
								<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
								<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
								<p><a href="#" class="btn btn-primary">Read more</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="blog-single.php" class="block-20" style="background-image: url('images/image_2.jpg');">
							</a>
							<div class="text">
								<div class="d-flex align-items-center mb-4 topp">
									<div class="one">
										<span class="day">11</span>
									</div>
									<div class="two">
										<span class="yr">2020</span>
										<span class="mos">September</span>
									</div>
								</div>
								<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
								<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
								<p><a href="#" class="btn btn-primary">Read more</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry">
							<a href="blog-single.php" class="block-20" style="background-image: url('images/image_3.jpg');">
							</a>
							<div class="text">
								<div class="d-flex align-items-center mb-4 topp">
									<div class="one">
										<span class="day">11</span>
									</div>
									<div class="two">
										<span class="yr">2020</span>
										<span class="mos">September</span>
									</div>
								</div>
								<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
								<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
								<p><a href="#" class="btn btn-primary">Read more</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-intro ftco-section ftco-no-pt">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 text-center">
						<div class="img"  style="background-image: url(images/bg_2.jpg);">
							<div class="overlay"></div>
							<h2>We Are Pacific A Travel Agency</h2>
							<p>We can manage your dream building A small river named Duden flows by their place</p>
							<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">About</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
								<li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
								<li><a href="#" class="py-2 d-block">General Enquiries</a></li>
								<li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
								<li><a href="#" class="py-2 d-block">Refund Policy</a></li>
								<li><a href="#" class="py-2 d-block">Call Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Experience</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Adventure</a></li>
								<li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
								<li><a href="#" class="py-2 d-block">Beach</a></li>
								<li><a href="#" class="py-2 d-block">Nature</a></li>
								<li><a href="#" class="py-2 d-block">Camping</a></li>
								<li><a href="#" class="py-2 d-block">Party</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Have a Questions?</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
									<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
									<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>
			
			

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="js/google-map.js"></script>
			<script src="js/main.js"></script>
			
		</body>
		</html>