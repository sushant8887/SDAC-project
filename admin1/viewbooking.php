<?php
        // Fetch data from the database
        // Replace these lines with your database connection and query
   

$host = "localhost";
$username = "root";
$password = "";
$db = "CaterServ"; 

$conn = mysqli_connect($host,$username,$password,$db);



        // Check connection
        if ($conn->connect_error) { die("Connection failed: " .
                  $conn->connect_error); } // Assuming your table name is
                  'booking_details' $sql = "SELECT * FROM booking_details";
                  $result = $conn->query($sql); if ($result->num_rows > 0) { //
                  Output data of each row while($row = $result->fetch_assoc()) {
                  echo "
                  <tr>
                    "; echo "
                    <td>" . $row["order_no"] . "</td>
                    "; echo "
                    <td>" . $row["country"] . "</td>
                    "; echo "
                    <td>" . $row["city"] . "</td>
                    "; echo "
                    <td>" . $row["place"] . "</td>
                    "; echo "
                    <td>" . $row["event_type"] . "</td>
                    "; echo "
                    <td>" . $row["no_of_people"] . "</td>
                    "; echo "
                    <td>" . $row["vegetarian_type"] . "</td>
                    "; echo "
                    <td>" . $row["contact_no"] . "</td>
                    "; echo "
                    <td>" . $row["event_date"] . "</td>
                    "; echo "
                    <td>" . $row["email"] . "</td>
                    "; echo "
                  </tr>
                  "; } } else { echo "0 results"; } $conn->close(); 
                  
                  ?>