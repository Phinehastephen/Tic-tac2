<?php
  // Connect to the database (if needed)
  $connect = mysql_connect("localhost", "root", "root") or die("Unable to Connect");
  mysql_select_db("db_quiz") or die("Could not open the db");

  // Get the form data
  $Q1 = htmlspecialchars(trim(stripslashes(strip_tags($_POST['Q1']))));
  $Q2 = htmlspecialchars(trim(stripslashes(strip_tags($_POST['Q2']))));
  // ... repeat for the remaining 5 questions

  // Query the database to find the corresponding school group
  $query = "SELECT school_group FROM quiz_key WHERE question IN ('$Q1', '$Q2', ...)";
  $result = mysql_query($query);

  // Process the result and display the school group
  while ($row = mysql_fetch_array($result)) {
    $school_group = $row['school_group'];
    echo "You would fit into the $school_group school group!";
  }
?>