<?php
function confirmQuery($result)
{
  global $connection;
  if (!$result) {
    die("Query Failed...: " . mysqli_error($connection));
  }
}

function markAttendence($id, $year, $day, $month, $date, $status, $username, $rollNo)
{
  global $connection;

  $query = "INSERT INTO attendence(user_id,year,month,date,day,attendence_status, username, rollNo) VALUES($id, $year, '$month', $date, '$day', '$status', '$username',$rollNo)";

  $result = mysqli_query($connection, $query);
  confirmQuery($result);
}

function registerUser($username, $rollNo, $address, $email, $password = 'test1234')
{
  global $connection;
  if (!empty($username) && !empty($email) && !empty($rollNo) && !empty($address)) {

    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = "INSERT INTO users(username, rollNo, address, user_email, user_password, user_role) VALUES('$username', $rollNo, '$address', '$email', '$password', 'student')";
    $result = mysqli_query($connection, $query);

    confirmQuery($result);
  }
}

function classAttended($id)
{
  global $connection;
  if (!empty($id)) {
    $query = "SELECT * FROM attendence WHERE user_id=$id";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return mysqli_num_rows($result);
  }
}

function calculateGrade($classesAttended = 0)
{
  $grade = '';
  if ($classesAttended >= 26)
    $grade = 'A';
  elseif ($classesAttended >= 20 && $classesAttended <= 25)
    $grade = 'B';
  elseif ($classesAttended >= 15 && $classesAttended < 20)
    $grade = 'C';
  elseif ($classesAttended >= 10 && $classesAttended < 15)
    $grade = 'D';
  elseif ($classesAttended < 10)
    $grade = 'E';

  return $grade;
}

function gradeColor($grade)
{
  $color = '';
  if ($grade == 'A')
    $color = 'rgb(44,229,116)';
  elseif ($grade == 'B')
    $color = 'rgb(205,240,58)';
  elseif ($grade == 'C')
    $color = 'rgb(255,229,0)';
  elseif ($grade == 'D')
    $color = 'rgb(255,150,0)';
  elseif ($grade == 'E')
    $color = 'rgb(255,57,36)';

  return $color;
}

function totalStudents()
{
  global $connection;
  $query = "SELECT * FROM users WHERE user_role='student'";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  return mysqli_num_rows($result);
}

function totalRequests()
{
  global $connection;
  $query = "SELECT * FROM emails WHERE email_status='unapproved'";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  return mysqli_num_rows($result);
}
