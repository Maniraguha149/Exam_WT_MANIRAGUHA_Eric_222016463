<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "online_personal_branding_workshop_platform";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>