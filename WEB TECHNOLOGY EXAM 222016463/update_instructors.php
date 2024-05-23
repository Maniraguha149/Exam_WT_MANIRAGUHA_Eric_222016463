<?php
include('database_connection.php');

// Check if instructor_id is set
if (isset($_REQUEST['instructor_id'])) {
    $instructor_id = $_REQUEST['instructor_id'];

    $cvp = $connection->prepare("SELECT * FROM instructors WHERE instructor_id=?");
    $cvp->bind_param("i", $instructor_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['firstname'];
        $c = $row['lastname']; 
        $d = $row['email'];
        $e = $row['telephone'];
         $f = $row['bio'];
          $g = $row['expertise'];


    } else {
        echo "instructors not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update instructors</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update instructors form -->
    <h2><u>Update Form of instructors</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="instructor_id">instructor_id:</label>
        <input type="number" name="instructor_id" value="<?php echo isset($b) ? $b : ''; ?>">
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
        <input type="number" name="telephone" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

         <label for="bio">bio:</label> 
        <input type="text" name="bio" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

         <label for="expertise">expertise:</label>
        <input type="text" name="expertise" value="<?php echo isset($b) ? $b : ''; ?>">
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
     $bio = $_POST['bio'];
     $expertise = $_POST['expertise'];

    // Update the instructors in the database
    $cvp = $connection->prepare("UPDATE instructors SET firstname=?, lastname=?, email=?, telephone=?,bio=?,expertise=? WHERE instructor_id=?");
    $cvp->bind_param("sissssi", $firstname, $lastname, $email, $telephone,$bio,$expertise, $instructor_id);
    $cvp->execute();

// Redirect to instructors.php
    header('Location: instructors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>