<?php
session_start();

// $host = "localhost";
// $username = "root";
// $password = "";
// $db = "CaterServ";

// $conn = mysqli_connect($host, $username, $password, $db);

// if (!$conn) {
//     echo "not connected" . mysqli_connect_error();
// }


// if (isset($_POST['update_item_image'])) {
//     $product_id = $_POST['product_id'];
//     $name = $_POST["pname"];
//     $category = $_POST["pcategory"];
//     $mrp = $_POST["pmrp"];
//     $description = $_POST["pdescription"];

//     $new_image = $_FILES['pimage']['name'];
//     $old_image = $_FILES['pimage'];

//     if ($new_image != '') {
//         $update_filename = $_FILES['pimage']['name'];
//     } else {
//         $update_filename = $image;
//     }
//     if (file_exists("ItemImages/" . $new_image['pimage']['name'])) {
//         $filename = $_FILES['pimage']['name'];
//         $_SESSION['status'] = "Image already exists" . $filename;
//         header('Location: ');
//     } else {
//         $query = "UPDATE items SET pname = '$name', pcategory='$category', pmrp='$mrp', pdescription='$description', pimage='$update_filename' WhERE product_id= '$product_id'";
//         $query_run = mysqli_query($conn, $query);

//         if ($query_run) {
//             if ($_FILES['pimage']['name'] != '') {
//                 move_uploaded_file($_FILES['pimage']['tmp_name'], $target_name);
//                 unlink("ItemImages/" . $pimage_old);
//             }
//             $_SESSION['status'] = "Updated Successfully";
//             header("Location: additems.php");
//         } else {
//             $_SESSION['status'] = "Not Updated";
//             header("Location: additems.php");
//         }
//     }
// }


$conn = new mysqli('localhost', 'root', '', 'caterServ');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $item_id = $_POST['product_id']; // Assuming you have an item ID to identify the item
    $new_name = $_POST['pname']; // New item name
    $new_description = $_POST['pdescription']; // New item description
    $mrp = $_POST['pmrp'];

    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $mrp = mysqli_real_escape_string($conn, $mrp);


    $targetDir = "ItemImages/";
    $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);



    // Update item details in the database
    $sql_update = "UPDATE items SET pname = '$new_name', pdescription = '$new_description', pmrp='$mrp' WHERE product_id = $item_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Item details updated successfully.";
        header("Location:products.php");
    } else {
        echo "Error updating item details: " . $conn->error;
    }
} else {
    $item_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
    if (!$item_id) {
        echo "Error: Missing or Invalid 'product_id' parameter.";
        exit();
    }
    $sql = "SELECT * FROM items WHERE product_id=$item_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
}
