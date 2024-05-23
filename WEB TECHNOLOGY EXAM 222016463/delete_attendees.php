<?php
include('database_connection.php');

// Check if attendee_id is set
if(isset($_REQUEST['attendee_id'])) {
    $attendee_id = $_REQUEST['attendee_id']; // Corrected variable name
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM attendees WHERE attendee_id=?");
    $stmt->bind_param("i", $attendee_id); // Corrected variable name

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="attendee_id" value="<?php echo $attendee_id; ?>"> <!-- Corrected variable name -->
            <input type="submit" value="Delete">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($stmt->execute()) {
                echo "Record deleted successfully.<br><br>
                      <a href='attendees.php'>OK</a>";
            } else {
                echo "Error deleting data: " . $stmt->error;
            }
        }
        ?>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "attendee_id is not set.";
}

$connection->close();
?>
