<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else
  {
    echo "<h4>Deleted post id's:</h4>";
    $query = "SELECT * From Posts";
    $result = mysqli_query($mysqli, $query);
    if (isset($_POST['delete']))
    {
      if (isset($_POST['checkbox']))
        foreach ($_POST['checkbox'] as $delete)
        {
          $query = "DELETE FROM Posts WHERE post_id=".$delete;
          mysqli_query($mysqli, $query);
          echo "<p>".$delete."</p>";
        }

    }
  }
  $mysqli->close();
?>
