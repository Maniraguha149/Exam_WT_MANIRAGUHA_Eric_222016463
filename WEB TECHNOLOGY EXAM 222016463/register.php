<?php
include('database_connection.php');

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data and sanitizing inputs
    $id  = $connection->real_escape_string($_POST['id']);
    $fname  = $connection->real_escape_string($_POST['fname']);
    $lname = $connection->real_escape_string($_POST['lname']);
    $email = $connection->real_escape_string($_POST['email']);
    $username = $connection->real_escape_string($_POST['username']);
    $telephone = $connection->real_escape_string($_POST['telephone']);
    $password = password_hash($connection->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $activation_code = $connection->real_escape_string($_POST['activation_code']);
    
    // Preparing SQL query
    $sql = "INSERT INTO user(id,firstname, lastname, email, username, password, telephone, activation_code) VALUES ('$usid','$fname','$lname','$email', '$username', '$password','$telephone','$activation_code')";

    // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        // Redirecting to login page on successful registration
        header("Location: login.html");
        exit();
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Closing database connection
$connection->close();
?>




