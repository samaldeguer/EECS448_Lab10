<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else
  {
    echo "<table><tr><th>Post ID</th><th>Content</th><th>User</th></tr>";
    echo "<style>table, th, td { border: 1px solid black; border-collapse: collapse; }</style>";
    $author = $_POST["users"];
    $query = "SELECT * FROM Posts WHERE author_id = '$author'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0)
    {

      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr><td>".$row["post_id"]."</td><td>".$row["content"]."</td><td>".$row["author_id"]."</td></tr>";
      }
      echo "</table>";
    }
  }
  $mysqli->close();
?>
