<?php
include('database_connection.php');

// Check if attendance_id is set
if (isset($_REQUEST['attendance_id'])) {
    $attendance_id = $_REQUEST['attendance_id'];

    $cvp = $connection->prepare("SELECT * FROM session_attendees WHERE attendance_id=?");
    $cvp->bind_param("i", $attendance_id);
    $cvp->execute();
    $result = $cvp->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $session_id = $row['session_id'];
        $attendee_id = $row['attendee_id']; 
    } else {
        echo "session_attendees not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update session_attendees</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update session_attendees form -->
        <h2><u>Update Form of session_attendees</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="attendance_id">Attendance ID:</label>
            <input type="number" name="attendance_id" value="<?php echo isset($attendance_id) ? $attendance_id : ''; ?>">
            <br><br>
            <label for="session_id">Session ID:</label>
            <input type="text" name="session_id" value="<?php echo isset($session_id) ? $session_id : ''; ?>">
            <br><br>
            <label for="attendee_id">Attendee ID:</label> 
            <input type="text" name="attendee_id" value="<?php echo isset($attendee_id) ? $attendee_id : ''; ?>"> 
            <br><br>              
            <input type="submit" name="up" value="Update">        
        </form>
    </center>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $attendance_id = $_POST['attendance_id']; 
    $session_id = $_POST['session_id'];
    $attendee_id = $_POST['attendee_id'];
    // Update the record in the database
    $cvp = $connection->prepare("UPDATE session_attendees SET session_id=?, attendee_id=? WHERE attendance_id=?");
    $cvp->bind_param("iii", $session_id, $attendee_id, $attendance_id);
    $cvp->execute();
    // Redirect to session_attendees.php
    header('Location: session_attendees.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
