<?php
if (isset($_SESSION['user_role'])) {
  if (isset($_POST['logout'])) {
    $_SESSION['username'] = null;
    $_SESSION['user_email'] = null;
    $_SESSION['user_password'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['user_id'] = null;

    sleep(1);
    header("Location: index.php");
  }
} else {
  header("Location: index.php");
}
