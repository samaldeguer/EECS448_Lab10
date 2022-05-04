<?php
  if ($_POST["userID"] != null && $_POST["userID"] != "")
  {
    $userID = $_POST["userID"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_POST["content"] == null || $_POST["content"] == "")
    {
      echo "<script>alert('Post must have content.')</script>";
    }
    else
    {
      $content = $_POST["content"];
      $query = "SELECT * FROM Users WHERE user_id = '$userID'";
      $result = mysqli_query($mysqli, $query);
      $numRows = mysqli_num_rows($result);
      if ($numRows == 0)
      {
        echo "<script>alert('The user ID must already exist.')</script>";
      }
      else
      {
        $query = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$userID')";
        mysqli_query($mysqli, $query);
        echo "<script>alert('The post was saved under user $userID')</script>";
      }
    }
  }
  else
  {
    echo "<script>alert('Must enter a user ID.')</script>";
  }
  $mysqli->close();
?>
