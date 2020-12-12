<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php" ?>

<?php

if (isset($_POST['submit'])) {

  if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    loginUser($email, $password);
  }
}
?>

<?php
$directoryURI = basename($_SERVER['SCRIPT_NAME']);
if ($directoryURI == "login.php") {
  echo "<script> document.getElementById('login').style.color='black';</script>";
}

?>

<div class="container">

  <div class="card">
    <h1 class="card-title">Login</h1>
    <form action="login.php" method="POST">
      <div class="card-input">
        <label class="card-icon"><i class="fas fa-at"></i> </label>
        <input type="email" name="email" placeholder="Enter Email" class="field" required>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-lock"></i> </label>
        <input type="password" name="pass" placeholder="Enter Password" class="field" required>
      </div>

      <input type="submit" name="submit" id="" value="Login" class="btn">

    </form>
  </div>

  <!-- <div class="card">
    <h1 class="card-title">Student</h1>
    <form action="login.php" method="POST">
      <div class="card-input">
        <label class="card-icon"><i class="fas fa-at"></i> </label>
        <input type="email" name="student_email" placeholder="Enter Email" class="field" required>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-lock"></i> </label>
        <input type="password" name="student_pass" placeholder="Enter Password" class="field" required>
      </div>
      <input type="submit" name="submit_student" id="" value="Login" class="btn">

    </form>
  </div> -->

</div>

<?php include "includes/footer.php"; ?>