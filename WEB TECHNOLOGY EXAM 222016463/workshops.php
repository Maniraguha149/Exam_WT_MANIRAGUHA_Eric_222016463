<html>
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All About System</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: greenyellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    section{
    padding:100px;
    }

    header{
    background-color:skyblue;
    padding: 20px;
}
    footer{
    text-align: center;
    padding: 15px;
    background-color:violet;
}
.dropdown {
    position: relative;
    display: inline;
    margin-right: 10px;

  }
  .dropdown-contents {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    left: 0; /* Aligning dropdown contents to the left */
  }
  .dropdown:hover .dropdown-contents {
    display: block;
  }
  .dropdown-contents a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  </style>
  </head>

  <header>

<body bgcolor="chocolate">

  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
     <li style="display: inline; margin-right: 10px;"><img src="./image/logo.jpg" width="90" height="60" alt="Logo"></li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./instructors.php">INSTRUCTORS</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./workshops.php">WORKSHOPS</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./attendees.php">ATTENDEES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./branding_resources.php">BRANDING_RESOURCES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_attendees.php">SESSION_ATTENDEES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_feedback.php">SESSION_FEEDBACK</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_resources.php">SESSION-RESOURCES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./user_roles.php">USER_ROLES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./workshop_sessions.php">WORKSHOP_SESSIONS</a></li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: greenyellow; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</header>

<section>
  <h1>Workshops Form</h1>
  <form method="post" onsubmit="return confirmInsert();">
    <label for="workshop_id">Workshop ID:</label>
    <input type="number" id="workshop_id" name="workshop_id"><br><br>

    <label for="workshop_title">Workshop Title:</label>
    <input type="text" id="workshop_title" name="workshop_title" required><br><br>

    <label for="instructor_id">Instructor ID:</label>
    <input type="number" id="instructor_id" name="instructor_id" required><br><br>

    <label for="workshop_date">Workshop Date:</label>
    <input type="date" id="workshop_date" name="workshop_date" required><br><br>

    <label for="duration_hours">Duration (in hours):</label>
    <input type="number" id="duration_hours" name="duration_hours" required><br><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br><br>

    <input type="submit" name="add" value="Insert"><br><br>

    <a href="./home.html">Go Back to Home</a>
  </form>

  <?php
  include('database_connection.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $workshop_id = $_POST['workshop_id'];
      $workshop_title = $_POST['workshop_title'];
      $instructor_id = $_POST['instructor_id'];
      $workshop_date = $_POST['workshop_date'];
      $duration_hours = $_POST['duration_hours'];
      $location = $_POST['location'];
      $description = $_POST['description'];

      $cvp = $connection->prepare("INSERT INTO workshops(workshop_id, workshop_title, instructor_id, workshop_date, duration_hours, location, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $cvp->bind_param("isissis", $workshop_id, $workshop_title, $instructor_id, $workshop_date, $duration_hours, $location, $description);

      if ($cvp->execute()) {
          echo "New record has been added successfully";
      } else {
          echo "Error: " . $cvp->error;
      }
      $cvp->close();
  }
  $connection->close();
  ?>

  <h2>Table of Workshops</h2>
  <table border="1">
    <tr>
      <th>Workshop ID</th>
      <th>Workshop Title</th>
      <th>Instructor ID</th>
      <th>Workshop Date</th>
      <th>Duration (hours)</th>
      <th>Location</th>
      <th>Description</th>
      <th>Delete</th>
      <th>Update</th>
    </tr>
    <?php
    include "database_connection.php";
    $sql = "SELECT * FROM workshops";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $workshop_id = $row['workshop_id'];
            echo "<tr>
                    <td>" . $row['workshop_id'] . "</td>
                    <td>" . $row['workshop_title'] . "</td>
                    <td>" . $row['instructor_id'] . "</td>
                    <td>" . $row['workshop_date'] . "</td>
                    <td>" . $row['duration_hours'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td><a style='padding:4px' href='delete_workshops.php?workshop_id=$workshop_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_workshops.php?workshop_id=$workshop_id'>Update</a></td> 
                </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
    $connection->close();
    ?>
  </table>
</section>

<footer>
  <marquee> 
    <b><h2>UR CBE BIT &copy; 2024 &reg; 222016463, Designed by: ERIC MANIRAGUHA</h2></b>
  </marquee>
</footer>
</body>
</html>
