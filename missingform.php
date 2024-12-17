<?php
// Include database connection
include('db.php');

// Initialize variables for form data
$species = $post_creator = $contact_detail = $pet_name = $gender_breed = $age = $link_redirect = $additional_content = "";
$image = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data and sanitize it
    $species = mysqli_real_escape_string($conn, $_POST['species']);
    $post_creator = mysqli_real_escape_string($conn, $_POST['post_creator']);
    $contact_detail = mysqli_real_escape_string($conn, $_POST['contact_detail']);
    $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']);
    $gender_breed = mysqli_real_escape_string($conn, $_POST['gender_breed']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $link_redirect = mysqli_real_escape_string($conn, $_POST['link_redirect']);
    $additional_content = mysqli_real_escape_string($conn, $_POST['additional_content']);

    // Handle file upload
    if (isset($_FILES['pet_image']) && $_FILES['pet_image']['error'] == 0) {
        $image = 'uploads/' . basename($_FILES['pet_image']['name']);
        move_uploaded_file($_FILES['pet_image']['tmp_name'], $image);
    }

    // Insert data into database
    $query = "INSERT INTO missing_pets (species, post_creator, contact_detail, pet_name, gender_breed, age, link_redirect, additional_content, pet_image)
              VALUES ('$species', '$post_creator', '$contact_detail', '$pet_name', '$gender_breed', '$age', '$link_redirect', '$additional_content', '$image')";

    if (mysqli_query($conn, $query)) {
        echo "Pet Missing Post Created Successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PET SHOP - Pet Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>PalHome</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="adoptlist.html" class="nav-item nav-link">Adopt</a>
                <a href="missinglist.html" class="nav-item nav-link active">Missing</a>
                <a href="service.html" class="nav-item nav-link">Service</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Post</a>
                        <a href="about.html" class="dropdown-item">About</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link active nav-contact bg-primary text-dark px-5 ms-lg-5">Contact <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Create Missing Post</h6>
                <h1 class="display-5 text-uppercase mb-0">Missing Pet - Form</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="file" name="pet_image" class="form-control bg-light border-0 px-4" placeholder="Pet Image" style="height: 155px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="species" class="form-control bg-light border-0 px-4" placeholder="Species (Cat/Dog)" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="post_creator" class="form-control bg-light border-0 px-4" placeholder="Post Creator" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="contact_detail" class="form-control bg-light border-0 px-4" placeholder="Contact Detail" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="pet_name" class="form-control bg-light border-0 px-4" placeholder="Pet Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="gender_breed" class="form-control bg-light border-0 px-4" placeholder="Gender / Breed" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="number" name="age" class="form-control bg-light border-0 px-4" placeholder="Age" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="url" name="link_redirect" class="form-control bg-light border-0 px-4" placeholder="Link Redirect" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea name="additional_content" class="form-control bg-light border-0 px-4 py-3" rows="8" placeholder="Additional Content" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Post Missing</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <!-- Footer content here -->
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
