<?php
include('database_connection.php');

// Check if attendee_id is set
if (isset($_REQUEST['attendee_id'])) {
    $attendee_id = $_REQUEST['attendee_id'];

    $cvp = $connection->prepare("SELECT * FROM attendees WHERE attendee_id=?");
    $cvp->bind_param("i", $attendee_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['firstname'];
        $c = $row['lastname']; 
        $d = $row['email'];
        $e = $row['telephone'];
         $f = $row['registration_date'];
          $g = $row['workshop_id'];


    } else {
        echo "attendees not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update attendees</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update attendees form -->
    <h2><u>Update Form of attendees</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="attendee_id">attendee_id:</label>
        <input type="number" name="attendee_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="lastname">lastname:</label> 
        <input type="text" name="lastname" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="email">email:</label> 
        <input type="text" name="email" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="telephone">telephone:</label>
        <input type="text" name="telephone" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

         <label for="registration_date">registration_date:</label> 
        <input type="date" name="registration_date" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

         <label for="workshop_id">workshop_id:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>


                
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $firstname = $_POST['firstname']; 
    $lastname = $_POST['lastname']; 
    $email = $_POST['email']; 
    $telephone = $_POST['telephone'];
     $registration_date = $_POST['registration_date'];
     $workshop_id = $_POST['workshop_id'];

    // Update the attendees in the database
    $cvp = $connection->prepare("UPDATE attendees SET firstname=?, lastname=?, email=?, telephone=?,registration_date=?,workshop_id=? WHERE attendee_id=?");
    $cvp->bind_param("sissssi", $firstname, $lastname, $email, $telephone,$registration_date,$workshop_id, $attendee_id);
    $cvp->execute();

// Redirect to attendees.php
    header('Location: attendees.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>