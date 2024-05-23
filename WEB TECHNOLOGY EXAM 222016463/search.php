<?php
include('database_connection.php');

// Check if a search term was provided
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Define the SQL queries to search across multiple tables
    $queries = [
        "attendees" => "SELECT * FROM attendees WHERE attendee_id LIKE '%$searchTerm%'",
        "branding_resources" => "SELECT * FROM branding_resources WHERE resource_id LIKE '%$searchTerm%'",
        "instructors" => "SELECT * FROM instructors WHERE instructor_id LIKE '%$searchTerm%'",
        "session_attendees" => "SELECT * FROM session_attendees WHERE attendance_id LIKE '%$searchTerm%'",
        "session_feedback" => "SELECT * FROM session_feedback WHERE feedback_id LIKE '%$searchTerm%'",
        "session_resources" => "SELECT * FROM session_resources WHERE resource_id LIKE '%$searchTerm%'",
        "user_roles" => "SELECT * FROM user_roles WHERE role_id LIKE '%$searchTerm%'",
        "workshops" => "SELECT * FROM workshops WHERE workshop_id LIKE '%$searchTerm%'",
        "workshop_sessions" => "SELECT * FROM workshop_sessions WHERE session_id LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>";
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
