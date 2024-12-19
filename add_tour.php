<?php
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
                    <li class="nav-item"><a href="T_manageTour.php" class="nav-link">Manage Tour</a></li>
                    <li class="nav-item"><a href="T_tours.php" class="nav-link">Tour</a></li>
                    <li class="nav-item"><a href="check_ticket.php" class="nav-link">Check Ticket</a></li>
                    <li class="nav-item"><a href="T_assigned.php" class="nav-link">Assigned</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php if (isset($_SESSION['Tourguide_name'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo htmlspecialchars($_SESSION['Tourguide_name']); ?>
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

                    <h1 class="mb-4">Discover Your Favorite Place with Us</h1>
                    <p class="caps">Travel to the any corner of the world, without going around in circles</p>
                </div>
                <!-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
					<span class="fa fa-play"></span>
				</a> -->
                <video height="300px" width="400px" src="images/Vietnam.mp4" type="video/mp4" autoplay muted
                    loop></video>
            </div>
        </div>
    </div>

    <style>
    h1 {
        text-align: center;
        color: #000000;
        margin-top: 3cm;
    }

    form {
        background-color: #2c2c2c;
        /* Sử dụng màu xám đậm cho form */
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        /* Tăng độ mờ của bóng */
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #d3d3d3;
        /* Sử dụng màu xám sáng cho label */
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #555;
        /* Đổi màu viền input */
        border-radius: 4px;
        font-size: 16px;
        background-color: #444;
        /* Màu nền input tối hơn */
        color: #fff;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }

    /* Image preview section */
    .image-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .image-preview div {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        background-color: #333;
        /* Nền cho mỗi ảnh preview */
        border: 2px solid #444;
        /* Viền xung quanh ảnh */
        padding: 5px;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .image-preview img:hover {
        transform: scale(1.1);
    }

    /* Delete button for images */
    .delete-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: #ff4d4d;
        /* Đỏ tươi cho nút xóa */
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        z-index: 10;
    }

    /* Modal for image cropping */
    #cropModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.8);
        padding: 20px;
        border-radius: 8px;
        max-width: 90%;
        max-height: 90%;
        z-index: 1000;
    }

    #cropModal img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    #cropModal button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
        margin-top: 10px;
    }

    #cropModal button:hover {
        background-color: #218838;
    }
    </style>
    <?php
// Database connection settings
$host = "127.0.0.1";
$db_name = "final1";
$username = "root";
$password = ""; // Add your password here

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch list of tour guides for the dropdown
$tourguides = [];
try {
    $stmt = $pdo->query("SELECT Tourguide_ID, Tourguide_name FROM tourguide");
    $tourguides = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error fetching tour guides: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();

        // Insert the tour details
        $sql = "INSERT INTO tour (Date_start, Date_end, Tourguide_ID, Price, Description, Location, Tour_Name, Features, Quantity, Max_Tickets) 
                VALUES (:date_start, :date_end, :tourguide_id, :price, :description, :location, :tour_name, :features, :quantity, :max_tickets)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':date_start' => $_POST['date_start'],
            ':date_end' => $_POST['date_end'],
            ':tourguide_id' => $_POST['tourguide_id'],
            ':price' => $_POST['price'],
            ':description' => $_POST['description'],
            ':location' => $_POST['location'],
            ':tour_name' => $_POST['tour_name'],
            ':features' => $_POST['features'],
            ':quantity' => $_POST['quantity'],
            ':max_tickets' => $_POST['max_tickets']
        ]);

        // Get the last inserted tour ID
        $tour_id = $pdo->lastInsertId();

        // Handle image uploads
        if (isset($_FILES['images']) && count($_FILES['images']['tmp_name']) > 0) {
            $upload_dir = 'uploads/';
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = basename($_FILES['images']['name'][$key]);
                $file_path = $upload_dir . $file_name;

                // Move the file to the upload directory
                if (move_uploaded_file($tmp_name, $file_path)) {
                    // Insert image details into the `tour_images` table
                    $sql_image = "INSERT INTO tour_images (tour_id, image_url) VALUES (:tour_id, :image_url)";
                    $stmt_image = $pdo->prepare($sql_image);
                    $stmt_image->execute([
                        ':tour_id' => $tour_id,
                        ':image_url' => $file_path
                    ]);
                } else {
                    echo "Failed to upload image: " . htmlspecialchars($file_name) . "<br>";
                }
            }
        }

        $pdo->commit();
        echo "New tour added successfully with images!";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error adding tour: " . $e->getMessage();
    }
}
?>

    <body>
        <h1>Add New Tour</h1>
        <form action="add_tour.php" method="POST" enctype="multipart/form-data">
            <label for="tour_name">Tour Name:</label><br>
            <input type="text" name="tour_name" required><br><br>

            <label for="date_start">Start Date:</label><br>
            <input type="date" name="date_start" required><br><br>

            <label for="date_end">End Date:</label><br>
            <input type="date" name="date_end" required><br><br>

            <label for="price">Tour Price:</label><br>
            <input type="number" name="price" required><br><br>

            <label for="location">Location:</label><br>
            <input type="text" name="location" required><br><br>

            <label for="quantity">Maximum Number of Guests:</label><br>
            <input type="number" name="quantity" required><br><br>

            <label for="max_tickets">Maximum Number of Tickets:</label><br>
            <input type="number" name="max_tickets" required><br><br>

            <label for="tourguide_id">Tour Guide:</label><br>
            <select name="tourguide_id" required>
                <option value="">Select a Tour Guide</option>
                <?php foreach ($tourguides as $guide): ?>
                <option value="<?= htmlspecialchars($guide['Tourguide_ID']) ?>">
                    <?= htmlspecialchars($guide['Tourguide_name']) ?>
                </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="description">Description:</label><br>
            <textarea name="description" rows="5" cols="40" required></textarea><br><br>

            <label for="features">Features:</label><br>
            <textarea name="features" rows="3" cols="40" required></textarea><br><br>

            <label for="images">Images (Select multiple images):</label><br>
            <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="previewImages()"><br><br>

            <div class="image-preview" id="imagePreview"></div>

            <input type="submit" name="submit" value="Add Tour">
        </form>

        <div id="cropModal" style="display:none;">
            <div>
                <img id="cropImage" src="" style="max-width: 100%;">
                <button id="cropButton">Crop</button>
                <button id="closeButton">Close</button>
            </div>
        </div>
    </body>

    <script>
    let cropper;
    let selectedFiles = [];
    let currentIndex; // Chỉ số hình ảnh đang được cắt

    function previewImages() {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';

        const files = document.getElementById('images').files;
        selectedFiles = Array.from(files);

        if (selectedFiles.length > 0) {
            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const container = document.createElement('div');
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;
                    img.style.cursor = 'pointer';
                    img.onclick = function() {
                        currentIndex = index; // Ghi lại chỉ số của hình đang cắt
                        openCropModal(e.target.result);
                    };

                    const deleteBtn = document.createElement('button');
                    deleteBtn.innerHTML = 'X';
                    deleteBtn.className = 'delete-btn';
                    deleteBtn.onclick = function() {
                        container.remove();
                        selectedFiles.splice(index, 1);
                        updateFileInput();
                        previewImages();
                    };

                    container.appendChild(img);
                    container.appendChild(deleteBtn);
                    preview.appendChild(container);
                };

                reader.readAsDataURL(file);
            });
        }
    }

    function updateFileInput() {
        const fileInput = document.getElementById('images');
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }

    function openCropModal(imageSrc) {
        document.getElementById('cropModal').style.display = 'flex';
        document.getElementById('cropImage').src = imageSrc;

        const image = document.getElementById('cropImage');
        cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            viewMode: 1,
            autoCropArea: 1,
        });
    }

    document.getElementById('cropButton').addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(function(blob) {
            const url = URL.createObjectURL(blob);
            const preview = document.getElementById('imagePreview');

            // Cập nhật hình ảnh trong preview
            const img = preview.children[currentIndex]
                .firstChild; // Lấy hình ảnh tương ứng với chỉ số hiện tại
            img.src = url; // Thay thế hình ảnh cũ bằng hình đã cắt

            alert('Hình ảnh đã được cắt thành công!');
            document.getElementById('cropModal').style.display = 'none';
            cropper.destroy();
        });
    });

    document.getElementById('closeButton').addEventListener('click', function() {
        document.getElementById('cropModal').style.display = 'none';
        cropper.destroy();
    });
    </script>



    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far away, beyond the mountains of words, far from the lands of Sound and Rhyme, there
                            dwell
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