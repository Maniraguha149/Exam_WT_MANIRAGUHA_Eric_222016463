<?php
include('database_connection.php');

// Check if session_id is set
if(isset($_REQUEST['session_id'])) {
    $session_id = $_REQUEST['session_id']; // Corrected variable name
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM workshop_sessions WHERE session_id=?");
    $stmt->bind_param("i", $session_id); // Corrected variable name

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
            <input type="hidden" name="session_idsession_id" value="<?php echo $session_idsession_id; ?>"> <!-- Corrected variable name -->
            <input type="submit" value="Delete">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($stmt->execute()) {
                echo "Record deleted successfully.<br><br>
                      <a href='workshop_sessions.php'>OK</a>";
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
    echo "session_idsession_id is not set.";
}

$connection->close();
?>
