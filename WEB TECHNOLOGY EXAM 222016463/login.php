<?php
include('database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = $connection->prepare($sql);

    // Check if the SQL statement was prepared successfully
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                header("Location: home.html");
                exit();
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "user not found";
        }
    } else {
        // Print an error message if preparation fails
        echo "Error: " . $connection->error;
    }
}
$connection->close();
?>
