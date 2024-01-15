<?php
session_start();


if (!isset($_SESSION["name"]) && !isset($_SESSION["pass"])) {
    header("Location:adminlogin.html");
}
include('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $mrp = $_POST['mrp'];

    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $mrp = mysqli_real_escape_string($conn, $mrp);

    $targetDir = "breakfast/";
    $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql = "UPDATE dinner SET name='$name', description='$description', mrp='$mrp', image='$fileName' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: dinner.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$id) {
        echo "Error: Missing or invalid 'id' parameter.";
        exit();
    }

    $sql = "SELECT * FROM dinner WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Restoran - Bootstrap Restaurant Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container border border-1 border-dark my-5 p-3">
            <h1 class="text-center">Edit Breakfast</h1>
            <form action="editdinner.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">MRP</label>
                    <input type="number" class="form-control" name="mrp" value="<?php echo $row['mrp']; ?>" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Current Image</label><br>
                    <img src="breakfast/<?php echo $row['image']; ?>" alt="Current Image" style="max-width: 150px; max-height: 150px;">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose New Image</label>
                    <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId" required>
                    <div id="fileHelpId" class="form-text">Help text</div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <div><br>
                    <a class="btn btn-success" href="dinner.php" role="button">Back</a>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php
}

mysqli_close($conn);
?>