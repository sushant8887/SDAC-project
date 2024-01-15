<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'name' field is set and not empty
    if (isset($_POST["name"]) && !empty($_POST["name"])) {
        // Retrieve the category name from the form
        $categoryName = $_POST["name"];

        // MySQL database credentials
        include("config.php");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        // Prepare and execute SQL statement to insert the new category into the database
        $sql = "INSERT INTO categories (category_name) VALUES ('$categoryName')";
        if ($conn->query($sql) === TRUE) {
            echo "New category added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Handle case where 'name' field is not set or empty
        echo "Category name is required";
    }
}
