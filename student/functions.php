<?php include "../db.php" ?>

<?php

function confirmQuery($result)
{
  global $connection;
  if (!$result) {
    die("Query Failed...: " . mysqli_error($connection));
  }
}

function getUserRollNo($id)
{
  global $connection;
  $query = "SELECT * FROM users WHERE user_id=$id";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  $row = mysqli_fetch_assoc($result);
  return $row['rollNo'];
}

function getUserName($id)
{
  global $connection;
  $query = "SELECT * FROM users WHERE user_id=$id";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  $row = mysqli_fetch_assoc($result);
  return $row['username'];
}

function checkUserAttendence($id, $year, $day, $month, $date)
{
  global $connection;
  $id = intval($id);
  $query = "SELECT * FROM attendence WHERE user_id=$id AND year=$year AND day='$day' AND month='$month' AND date=$date";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  if (mysqli_num_rows($result)) {
    echo "<script>showAlert('error', 'Your today\'s Attendence has been marked.');</script>";
    return true;
  } else {
    return false;
  }
}

function markAttendence($id, $year, $day, $month, $date, $status)
{
  global $connection;
  $rollNo = getUserRollNo($id);
  $username = getUserName($id);

  if (!checkUserAttendence($id, $year, $day, $month, $date)) {
    $query = "INSERT INTO attendence(user_id,year,month,date,day,attendence_status,username,rollNo) VALUES($id, $year, '$month', $date, '$day', '$status','$username', $rollNo)";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    echo "<script>showAlert('success', 'Attendence Marked.');</script>";
  }
}

function Defaultimage($image = "")
{
  if (!$image)
    return "student.png";
  else
    return $image;
}


?>

