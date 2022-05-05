<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else
  {
    echo "<table><tr><th>Users</th></tr>";
    echo "<style>table, th, td { border: 1px solid black; border-collapse: collapse; }</style>";
    $query = "SELECT * FROM Users";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr><td>".$row["user_id"]."</td></tr>";
      }
      echo "</table>";
    }
  }
  $mysqli->close();
?>
