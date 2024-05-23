<?php
include('database_connection.php');

// Check if feedback_id is set
if (isset($_REQUEST['feedback_id'])) {
    $feedback_id = $_REQUEST['feedback_id'];

    $cvp = $connection->prepare("SELECT * FROM session_feedback WHERE feedback_id=?");
    $cvp->bind_param("i", $feedback_id);
    $cvp->execute();
    $result = $cvp->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['session_id'];
        $c = $row['attendee_id']; 
        $d = $row['feedback_text'];
        $e = $row['rating'];
        
    } else {
        echo "session_feedback not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update session_feedback</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update update_session_feedback form -->
    <h2><u>Update Form of session_feedback</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="feedback_id">feedback_id:</label>
        <input type="number" name="feedback_id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="session_id">session_id:</label>
        <input type="number" name="session_ide" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="attendee_id">attendee_id:</label> 
        <input type="number" name="attendee_id" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="feedback_text">feedback_text:</label> 
        <input type="text" name="feedback_text" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

 <label for="rating">rating:</label>
        <input type="number" name="rating" value="<?php echo isset($e) ? $e : ''; ?>">
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
    $attendee_id = $_POST['attendee_id']; 
    $feedback_text = $_POST['feedback_text']; 
    $rating = $_POST['rating'];
    
    // Update the customer in the database
    $cvp = $connection->prepare("UPDATE session_feed SET session_id=?, attendee_id=?, feedback_text=?, rating=? WHERE feedback_id=?");
    $cvp->bind_param("iisi", $session_id, $attendee_id, $feedback_text, $rating);
    $cvp->execute();

// Redirect to session_feedback.php
    header('Location:session_feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>