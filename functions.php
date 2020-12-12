<?php include "db.php" ?>

<?php

function confirmQuery($result)
{
  global $connection;
  if (!$result) {
    die("Query Failed...: " . mysqli_error($connection));
  }
}

function redirect($location)
{
  header("Location: " . $location);
}

function registerUser($username, $rollNo, $address, $email, $password)
{
  global $connection;
  if (!empty($username) && !empty($email) && !empty($password) && !empty($rollNo) && !empty($address)) {

    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = "INSERT INTO users(username, rollNo, address, user_email, user_password, user_role) VALUES('$username', $rollNo, '$address', '$email', '$password', 'student')";
    $result = mysqli_query($connection, $query);

    confirmQuery($result);
  }
}

function loginUser($email, $password)
{
  global $connection;
  if (!empty($email) && !empty($password)) {
    $query = "SELECT * FROM users WHERE user_email='$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    while ($row = mysqli_fetch_assoc($result)) {
      $db_email = $row['user_email'];
      $db_password = $row['user_password'];
      $db_username = $row['username'];
      $db_user_role = $row['user_role'];
      $db_user_id = $row['user_id'];

      $password = password_verify($password, $db_password);

      if ($email == $db_email && $password) {
        $_SESSION['username'] = $db_username;
        $_SESSION['user_email'] = $db_email;
        $_SESSION['user_password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_id'] = $db_user_id;

        if ($db_user_role == 'admin') {
          $_SESSION['adm'] = 'adm';
          redirect("admin");
        } else if ($db_user_role == 'student') {
          $_SESSION['stud'] = 'stud';
          redirect('student');
        }
      } else {
        redirect("login.php");
      }
    }
  }
}

function emailExists($email)
{
  global $connection;
  $query = "SELECT user_email FROM users WHERE user_email = '$email'";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);

  if (mysqli_num_rows($result) > 0)   //means there is user with given username
    return true;
  else
    return false;
}

function rollNoExists($rollNo)
{
  global $connection;
  $query = "SELECT rollNo FROM users WHERE rollNo = $rollNo";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);

  if (mysqli_num_rows($result) > 0)   //means there is user with given rollNo
    return true;
  else
    return false;
}

?>