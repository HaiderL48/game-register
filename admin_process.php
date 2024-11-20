<?php
include 'connection.php';

if (isset($_POST['add_category'])) {
    // Sanitize user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Check if the file was uploaded without errors
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $temp_image = $_FILES['image']['tmp_name'];

        // Move the uploaded file to a directory
        $upload_dir = "images/";
        move_uploaded_file($temp_image, $upload_dir . $image);
    } else {
        // Handle file upload errors
        echo "Error uploading file. Please try again.";
        exit();
    }

    // Insert the category into the database
    $sql = "INSERT INTO necklace (name, description, image, price) VALUES ('$name', '$description', '$image', '$price')";
    if (mysqli_query($con, $sql)) {
        // Redirect back to admin panel after successful insertion
        header("Location: catform.php");
        exit();
    } else {
        // Handle database insertion errors
        echo "Error: " . mysqli_error($con);
        exit();
    }
}
?>