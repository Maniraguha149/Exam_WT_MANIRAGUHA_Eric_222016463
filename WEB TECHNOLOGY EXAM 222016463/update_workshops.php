<?php
include('database_connection.php');

// Check if Customer_Id is set
if (isset($_REQUEST['workshop_id'])) {
    $workshop_id = $_REQUEST['workshop_id'];

    $cvp = $connection->prepare("SELECT * FROM workshops WHERE workshop_id=?");
    $cvp->bind_param("i", $workshop_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['workshop_title'];
        $c = $row['instructor_id']; 
        $d = $row['workshop_date'];
        $e = $row['duration_hours'];
         $f = $row['location'];
          $g = $row['description'];
    } else {
        echo "workshops not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update workshops</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update workshops form -->
    <h2><u>Update Form of workshops</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="workshop_id">workshop_id:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="workshop_title">workshop_title:</label>
        <input type="text" name="workshop_title" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="instructor_id">instructor_id:</label> 
        <input type="number" name="instructor_id" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="workshop_date">workshop_date:</label> 
        <input type="date" name="workshop_date" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

 <label for="duration_hours">duration_hours:</label>
        <input type="hour" name="duration_hours" value="<?php echo isset($e) ? $e : ''; ?>">
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
    $workshop_title = $_POST['workshop_title']; 
    $instructor_id = $_POST['instructor_id']; 
    $workshop_date = $_POST['workshop_date']; 
    $duration_hours = $_POST['duration_hours'];
     $location = $_POST['location'];
     $description = $_POST['description'];

    // Update the customer in the database
    $cvp = $connection->prepare("UPDATE workshops SET workshop_title=?, instructor_id=?, workshop_date=?, duration_hours=?,location=?,description=? WHERE workshop_id=?");
    $cvp->bind_param("sissssi", $workshop_title, $instructor_id, $workshop_date, $duration_hours,$location,$description, $workshop_id);
    $cvp->execute();

// Redirect to workshop.php
    header('Location: workshops.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>