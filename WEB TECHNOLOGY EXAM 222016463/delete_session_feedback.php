<?php
include('database_connection.php');

// Check if feedback_id is set
if(isset($_REQUEST['feedback_id'])) {
    $feedback_id = $_REQUEST['feedback_id']; // Corrected variable name
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM session_feedback WHERE feedback_id=?");
    $stmt->bind_param("i", $feedback_id); // Corrected variable name

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
            <input type="hidden" name="feedback_id" value="<?php echo $feedback_id; ?>"> <!-- Corrected variable name -->
            <input type="submit" value="Delete">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($stmt->execute()) {
                echo "Record deleted successfully.<br><br>
                      <a href='session_feedback.php'>OK</a>";
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
    echo "feedback_id is not set.";
}

$connection->close();
?>
