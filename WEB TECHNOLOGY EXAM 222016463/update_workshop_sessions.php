<?php
include('database_connection.php');

// Check if Customer_Id is set
if (isset($_REQUEST['session_id'])) {
    $session_id = $_REQUEST['session_id'];

    $cvp = $connection->prepare("SELECT * FROM workshop_sessions WHERE session_id=?");
    $cvp->bind_param("i", $session_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['workshop_id'];
        $c = $row['session_title']; 
        $d = $row['session_date'];
        $e = $row['start_time'];
         $e = $row['end_time'];
         $f = $row['location'];
          $g = $row['description'];
    } else {
        echo "workshop_sessions not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update workshop_sessions</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update workshop_sessions form -->
    <h2><u>Update Form of workshop_sessions</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="session_id">session_id:</label>
        <input type="number" name="session_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="workshop_id">workshop_id:</label>
        <input type="text" name="workshop_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="session_title">session_title:</label> 
        <input type="text" name="session_title" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="session_date">session_date:</label> 
        <input type="date" name="session_date" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

 <label for="start_time">start_time:</label>
        <input type="hour" name="start_time" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="end_time">end_time:</label>
        <input type="hour" name="end_time" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

         <label for="location">location:</label> 
        <input type="text" name="location" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

         <label for="description">description:</label>
        <input type="text" name="description" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>




                
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $workshop_id = $_POST['workshop_id']; 
    $session_title = $_POST['session_title']; 
    $session_date = $_POST['session_date']; 
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
     $location = $_POST['location'];
     $description = $_POST['description'];

    // Update the customer in the database
    $cvp = $connection->prepare("UPDATE workshop_sessions SET workshop_id=?, session_title=?, session_date=?, start_time=?,end_time=?,location=?,description=? WHERE session_id=?");
    $cvp->bind_param("sisssssi", $workshop_id, $session_title, $session_date, $start_time,$end_time,$location,$description, $session_id);
    $cvp->execute();

// Redirect to workshop_sessions.php
    header('Location: workshop_sessions.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>

     