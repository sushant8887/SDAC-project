<?php

require_once "config.php";
// require_once "vendor/autoload.php"; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['id'])) {
    $queryId = $_GET['id'];

    // Fetch user query based on the ID
    $query = "SELECT * FROM booking_info WHERE id = $queryId";
    $result = mysqli_query($conn, $query);
    $queryData = mysqli_fetch_assoc($result);
} else {
    // Redirect to show_query.php if no ID is provided
    header("Location: booking.php");
    exit();
}
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

<body>
    <div class="container border border-1 border-dark my-5 p-3">
        <h2>Reply to booking Query</h2>
        <form action="bookingreply_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $queryData['id']; ?>">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Enter reply" id="reply" name="reply" style="height: 150px" required></textarea>
                        <label for="reply">Reply</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-100 py-3" type="submit">Send Reply</button>
            <div><br>
                <a class="btn btn-success w-100 py-3" href="index.php" role="button">Back</a>
            </div>
        </form>
    </div>
</body>

</html>