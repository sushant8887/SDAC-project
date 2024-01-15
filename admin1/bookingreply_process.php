<?php

require_once "config.php"; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/CaterServ/PHPMailer/src/SMTP.php';

$host = "localhost";
$username = "root";
$password = "";
$db = "CaterServ";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    echo "not connected" . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $queryId = $_POST['id'];
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);

    // Update user query with the reply in the database
    $updateQuery = "UPDATE booking_info SET reply='$reply' WHERE id='$queryId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "Reply sent successfully!";

        // Fetch user email from the original query
        $fetchEmailQuery = "SELECT email FROM booking_info WHERE id = $id";
        $emailResult = mysqli_query($conn, $fetchEmailQuery);
        $emailData = mysqli_fetch_assoc($emailResult);
        $userEmail = $emailData['email'];

        // Send reply to the user using PHPMailer
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
            $mail->Subject = 'Thank You For Booking';
            $mail->Body = $reply;

            $mail->send();
            header("Location:booking.php");
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "Error sending reply: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
