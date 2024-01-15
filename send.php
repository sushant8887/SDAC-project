<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path based on your project structure

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_table'])) {
    // Process the booking information
    $name = $_POST['uname']; // replace with your actual form field names
    $email = $_POST['email'];
    // ... other form fields

    // Send a thank you email to the admin using PHPMailer
    $admin_email = "dare68929@gmail.com"; // replace with your admin's email address

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; // Set to 2 for debugging; 0 for production
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'dare68929@gmail.com'; // Set your SMTP username
        $mail->Password = 'bqzz ihwe abvf xqah'; // Set your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($admin_email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Table Booking - Thank You!';
        $mail->Body = "Hello $uname,<br><br>A new table has been booked.<br><br>Details:<br>Name: $name<br>Email: $email<br><br>Thank you!";

        $mail->send();

        // Display a thank you message to the user or redirect to a thank you page
        echo "Thank you for booking a table!";

        // Additional database storage, validation, etc., can be added here
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    // Redirect or display an error message if the form is not submitted properly
    header("Location: error.php");
    exit();
}
