<?php
include("config.php");


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['uname'];
    $city = $_POST['city'];
    $place = $_POST['place'];
    $event_type = $_POST['event_type'];
    $no_of_people = $_POST['no_of_people'];
    $vegetarian_type = $_POST['vegetarian_type'];
    $contact_no = $_POST['contact_no'];
    $event_date = $_POST['event_date'];
    $email = $_POST['email'];

    // Insert data into the database
    $sql = "INSERT INTO booking_info (uname, city, place, event_type, no_of_people, vegetarian_type, contact_no, event_date, email)
    VALUES ('$name', '$city', '$place', '$event_type', '$no_of_people', '$vegetarian_type', '$contact_no', '$event_date', '$email')";

    if ($conn->query($sql) === TRUE) {

        echo "New record created successfully";
        header("Location:book.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
