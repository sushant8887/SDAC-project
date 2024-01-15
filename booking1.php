<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/SMTP.php'; // Adjust the path based on your project structure

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$db = "CaterServ";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    echo "not connected" . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_table'])) {
    // Process the booking information
    $uname = $_POST['uname'];
    $city = $_POST['city'];
    $place = $_POST['place'];
    $event_type = $_POST['event_type'];
    $no_of_people = $_POST['no_of_people'];
    $vegetarian_type = $_POST['vegetarian_type'];
    $contact_no = $_POST['contact_no'];
    $event_date = $_POST['event_date'];
    $userEmail = $_POST['email'];

    // Insert data into the database
    $insert_query =
        "INSERT INTO booking_info (uname, city, place, event_type, no_of_people, vegetarian_type, contact_no, event_date, email)
    VALUES ('$name', '$city', '$place', '$event_type', '$no_of_people', '$vegetarian_type', '$contact_no', '$event_date', '$userEmail')";
    $result = $conn->query($insert_query);

    if (!$result) {
        die("Error: " . $conn->error);
    }

    // Send a thank you email to the user using PHPMailer
    $user_email = $email;

    $mail = new PHPMailer(true);
    $email = 'dare68929@gmail.com';
    $password = 'bqzz ihwe abvf xqah';
    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email;
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, 'Admin');
        $mail->addAddress($userEmail);
        $mail->addReplyTo($email, 'labdemo');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Thank You for booking';
        $mail->Body = $reply;

        $mail->send();
        header("Location:q.php");
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect or display an error message if the form is not submitted properly
    header("Location: 404.html");
    exit();
}
