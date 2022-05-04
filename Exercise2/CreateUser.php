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
    else
    {
      $query = "SELECT * FROM Users WHERE user_id = '$userID'";
      $result = mysqli_query($mysqli, $query);
      $numRows = mysqli_num_rows($result);
      if ($numRows > 0)
      {
        echo "<script>alert('The user ID $userID already exists.')</script>";
      }
      else
      {
        $query = "INSERT INTO Users (user_id) VALUES ('$userID')";
        mysqli_query($mysqli, $query);
        echo "<script>alert('The user ID $userID has been stored to the database.')</script>";
      }
    }
  }
  else
  {
    echo "<script>alert('Must enter a user ID.')</script>";
  }
  $mysqli->close();
?>
