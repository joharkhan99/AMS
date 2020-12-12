<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

<?php
$directoryURI = basename($_SERVER['SCRIPT_NAME']);
if ($directoryURI == "registration.php") {
  echo "<script> document.getElementById('register').style.color='black';</script>";
}
?>

<?php

$message = "";
if (isset($_POST['register'])) {
  $email = trim($_POST['user_email']);
  $username = trim($_POST['username']);
  $password = trim($_POST['user_pass']);
  $rollNo = trim($_POST['rollNo']);
  $address = trim($_POST['address']);

  $error = [
    'username' => '',
    'email' => '',
    'password' => '',
    'address' => '',
    'rollNo' => ''
  ];

  if (strlen($username) < 4)
    $error['username'] = 'length must be greater than 4';
  if (empty($username))
    $error['username'] = 'name can\'t be empty';
  if (empty($address))
    $error['address'] = 'address can\'t be empty';
  if (empty($rollNo))
    $error['rollNo'] = 'roll number can\'t be empty';
  if (rollNoExists($rollNo))
    $error['rollNo'] = 'roll number assigned to someone else. choose another.';
  if (emailExists($email))
    $error['email'] = 'this email has been taken. choose another.';
  if (empty($email))
    $error['email'] = 'email can\'t be empty';
  if (strlen($password) < 8)
    $error['password'] = 'length must be greater than 8';
  if (empty($password))
    $error['password'] = 'password can\'t be empty';

  foreach ($error as $key => $value) {
    if (empty($value))       //means no errors bcz value is empty
      //unset/clear all keys in array if there r no errors
      unset($error[$key]);
  }
  // if error array is empty means no errors
  if (empty($error)) {
    registerUser($username, $rollNo, $address, $email, $password);
    $email = '';
    $password = '';
    $username = '';
    $rollNo = '';
    $address = '';
    $message = "Registered. Please <a href='login.php'>Login</a>";
  }
}

?>

<div class="container">

  <div class="card">
    <h1 class="card-title">Register</h1>
    <small class='text-success'><?php echo $message; ?></small>
    <form action="" method="POST">

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-user"></i> </label>
        <input type="text" name="username" placeholder="Enter Your Name" class="field" required value="<?php echo isset($username) ? $username : ''; ?>">
        <small class='error'><?php echo isset($error['username']) ? $error['username'] : '' ?></small>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-scroll"></i> </label>
        <input type="text" name="rollNo" placeholder="Enter Your Roll Number (e.g: 1,2,3...)" class="field" required value="<?php echo isset($rollNo) ? $rollNo : ''; ?>">
        <small class='error'><?php echo isset($error['rollNo']) ? $error['rollNo'] : '' ?></small>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-map-marked-alt"></i> </label>
        <input type="text" name="address" placeholder="Enter Postal Address" class="field" required value="<?php echo isset($address) ? $address : ''; ?>">
        <small class='error'><?php echo isset($error['address']) ? $error['address'] : '' ?></small>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-at"></i> </label>
        <input type="email" name="user_email" placeholder="Enter Email" class="field" value="<?php echo isset($email) ? $email : ''; ?>" required>
        <small class='error'><?php echo isset($error['email']) ? $error['email'] : '' ?></small>
      </div>

      <div class="card-input">
        <label class="card-icon"><i class="fas fa-lock"></i> </label>
        <input type="password" name="user_pass" placeholder="Enter Password" class="field" required value="<?php echo isset($password) ? $password : '' ?>">
        <small class='error'><?php echo isset($error['password']) ? $error['password'] : '' ?></small>
      </div>
      <input type="submit" name="register" id="" value="Register" class="btn">

    </form>
  </div>

</div>


<?php include "includes/footer.php" ?>