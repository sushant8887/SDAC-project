


<?php
session_start();
$admin_name = $_POST['admin_name'];
$admin_pass = $_POST['admin_pass'];

include('config.php');

if (!$conn) {
    echo "Not COnnected" . mysqli_connect_error();
}

$sql = "SELECT * FROM admin_table WHERE admin_name = '$admin_name' AND admin_pass = '$admin_pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION["name"] = $admin_name;
    $_SESSION["pass"] = $admin_pass;
    header("Location: index.php");
} else {
    echo "Invalid Credentials <a href='login.html'>Try Again</a>";
}




mysqli_close($conn);

?>