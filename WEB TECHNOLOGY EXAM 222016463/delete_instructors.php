<?php
include('database_connection.php');

// Check if instructor_id is set
if(isset($_REQUEST['instructor_id'])) {
    $instructor_id = $_REQUEST['instructor_id']; // Corrected variable name
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM instructors WHERE instructor_id=?");
    $stmt->bind_param("i", $instructor_id); // Corrected variable name

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
            <input type="hidden" name="instructor_id" value="<?php echo $instructor_id; ?>"> <!-- Corrected variable name -->
            <input type="submit" value="Delete">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($stmt->execute()) {
                echo "Record deleted successfully.<br><br>
                      <a href='instructors.php'>OK</a>"; // Corrected file name
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
    echo "instructor_id is not set.";
}

$connection->close();
?>
