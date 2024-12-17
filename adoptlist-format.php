<?php
include 'db.php'; // Include database connection

// Query to get all pet adoptions
$sql = "SELECT * FROM pet_adoptions";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display each pet adoption
        echo '
        <div class="blog-item mb-5">
            <div class="row g-0 bg-light overflow-hidden">
                <div class="col-12 col-sm-5 h-100">
                    <img class="img-fluid h-100" src="' . $row['image_url'] . '" style="object-fit: cover;">
                </div>
                <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="bi bi-bookmarks me-2"></i>' . $row['shelter_name'] . '</small>
                            <small><i class="bi bi-calendar-date me-2"></i>Date Posted: ' . $row['date_posted'] . '</small>
                        </div>
                        <h5 class="text-uppercase mb-3">Name: ' . $row['pet_name'] . ' <br>Species: ' . $row['species'] . ' <br>Age: ' . $row['age'] . ' yrs old</h5>
                        <p>' . $row['description'] . '</p>
                        <a class="text-primary text-uppercase" href="pet_details.php?id=' . $row['id'] . '">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo "No pet adoptions available at the moment.";
}

$conn->close();
?>
