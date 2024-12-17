<?php
// Include database connection
include('db.php');

// Form handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $species = $_POST['species'];
    $post_creator = $_POST['post_creator'];
    $pet_name = $_POST['pet_name'];
    $gender_breed = $_POST['gender_breed'];
    $age = $_POST['age'];
    $link_redirectory = $_POST['link_redirectory'];
    $additional_content = $_POST['additional_content'];

    // Upload image (ensure you handle the upload correctly)
    $pet_image = 'uploads/' . $_FILES['pet_image']['name'];
    move_uploaded_file($_FILES['pet_image']['tmp_name'], $pet_image);

    $sql = "INSERT INTO pet_adoptions (pet_image, species, post_creator, pet_name, gender_breed, age, link_redirectory, additional_content) 
            VALUES ('$pet_image', '$species', '$post_creator', '$pet_name', '$gender_breed', $age, '$link_redirectory', '$additional_content')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>