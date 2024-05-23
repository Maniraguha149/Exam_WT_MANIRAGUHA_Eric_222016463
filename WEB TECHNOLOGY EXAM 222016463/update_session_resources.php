<?php
include('database_connection.php');

// Check if resource_id is set
if (isset($_REQUEST['resource_id'])) {
    $resource_id = $_REQUEST['resource_id'];

    $cvp = $connection->prepare("SELECT * FROM session_resources WHERE resource_id=?");
    $cvp->bind_param("i", $resource_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['session_id'];
        $c = $row['resource_name']; 
        $d = $row['resource_type'];
        $e = $row['file_path'];
        
    } else {
        echo "session_resources not found.";
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update session_resources</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update session_resources form -->
    <h2><u>Update Form of session_resources</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="resource_id">resource_id:</label>
        <input type="number" name="resource_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="session_id">session_id:</label>
        <input type="number" name="session_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="resource_name">resource_name:</label> 
        <input type="text" name="resource_name" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="resource_type">resource_type:</label> 
        <input type="text" name="resource_type" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

 <label for="file_path">file_path:</label>
        <input type="text" name="file_path" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

         <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $session_id = $_POST['session_id']; 
    $resource_name = $_POST['resource_name']; 
    $resource_type = $_POST['resource_type']; 
    $file_path = $_POST['file_path'];
    

    // Update the session_resources in the database
    $cvp = $connection->prepare("UPDATE session_resources SET session_id=?, resource_name=?, resource_type=?, file_path=? WHERE resource_id=?");
    $cvp->bind_param("isssi", $session_id, $resource_name,$resource_type, $file_path, $resource_id);
    $cvp->execute();

// Redirect to session_resources.php
    header('Location: session_resources.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>