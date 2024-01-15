<?php
session_start();
// MySQL database credentials
include("config.php");

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['pname'];
    $category = $_POST['pcategory'];
    $mrp = $_POST['pmrp'];
    $description = $_POST['pdescription'];
    $image = $_FILES['pimage']['name'];

    // Specify the target directory for file upload
    $target_dir = "ItemImages/";
    $target_name = $target_dir . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $target_name);


    // Check for existing entry with the same name
    $checkQuery = "SELECT * FROM items WHERE pname = '$name'";
    $result = mysqli_query($conn, $checkQuery);


    if (mysqli_num_rows($result) > 0) {
        // Duplicate entry found, handle accordingly (e.g., show an error message)
        echo "Duplicate entry: $name already exists!";
    } else {
        // No duplicate entry found, proceed with the insertion
        $sql = "INSERT INTO items (product_id, pname, pcategory, pmrp, pdescription, pimage) VALUES (NULL, '$name', '$category', '$mrp', '$description', '$image')";

        if (mysqli_query($conn, $sql)) {
            header("Location:products.php"); // Redirect to the same page or another appropriate location
            exit();
        } else {
            echo "Something went wrong: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
