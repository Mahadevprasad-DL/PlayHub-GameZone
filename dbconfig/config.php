<?php
$con = mysqli_connect("localhost", "root", "", "giri") or die("Unable to connect to the database");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
