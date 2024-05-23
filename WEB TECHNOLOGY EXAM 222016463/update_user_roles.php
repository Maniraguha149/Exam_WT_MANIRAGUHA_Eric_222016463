<?php
include('database_connection.php');

// Check if Customer_Id is set
if (isset($_REQUEST['role_id'])) {
    $role_id = $_REQUEST['role_id'];

    $cvp = $connection->prepare("SELECT * FROM user_roles WHERE role_id=?");
    $cvp->bind_param("i", $role_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['role_name'];
       
    } else {
        echo "user_roles not found.";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update user_roles</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update user_roles form -->
    <h2><u>Update Form of user_roles</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="role_id">role_id:</label>
        <input type="number" name="role_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="role_name">role_name:</label>
        <input type="text" name="role_name" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

     <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $role_name = $_POST['role_name']; 
   
    // Update the customer in the database
    $cvp = $connection->prepare("UPDATE user_roles SET role_name=? WHERE role_id=?");
    $cvp->bind_param("si", $role_name, $role_id);
    $cvp->execute();

// Redirect to user_roles.php
    header('Location:user_roles.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>