<?php
include("config.php");


if (isset($_GET['product_id'])) {
    // Get the product ID from the URL (make sure to sanitize user input)
    $item_id = $_GET['product_id'];

    // Sanitize the input (consider using more secure methods based on your application)
    $item_id = intval($item_id);

    // Construct the DELETE query
    $delete_query = "DELETE FROM `items` WHERE `product_id`= $item_id;";

    // Execute the DELETE query
    $result = $conn->query($delete_query);

    // Check if the deletion was successful
    if ($result === TRUE) {
        echo "Product deleted successfully.";
        header("Location:products.php");
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the page where you display your products or handle the case where product_id is not provided
    header("Location: products.php");
    exit();
}
