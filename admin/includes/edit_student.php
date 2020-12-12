<?php
$message = '';
if (isset($_GET['source']) && isset($_GET['id']) && isset($_SESSION['user_role'])) {
  if ($_SESSION['user_role'] == 'admin') {

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE user_id=$id";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    $rollNo = $row['rollNo'];
    $address = $row['address'];
    $email = $row['user_email'];

    if (empty($name))
      $name = '';
    if (empty($rollNo))
      $rollNo = '';
    if (empty($address))
      $address = '';
    if (empty($email))
      $email = '';
  }
}

?>

<section class="stud-data">

  <h1 class="stud-title">Edit Student</h1>
  <hr class="side-line">

  <div class="attend-div">
    <p><?php echo isset($_POST['update']) ? '<p>updated successfully!<br><a href="students.php?source=view">view all students</a></p>' : '';
        ?></p>
    <form action="" method="POST">

      <div>
        <label class="attend-form-label">Student Name: </label>
        <input type="text" class="field" name="name" value="<?php echo $name ?>">
      </div>

      <div>
        <label class="attend-form-label">Student Roll No: </label>
        <input type="text" class="field" name="rollNo" value="<?php echo $rollNo ?>">
      </div>

      <div>
        <label class="attend-form-label">Student Postal Address: </label>
        <input type="text" class="field" name="address" value="<?php echo $address ?>">
      </div>

      <div>
        <label class="attend-form-label">Student Email: </label>
        <input type="email" class="field" name="email" value="<?php echo $email ?>">
      </div>

      <div>
        <input type="submit" name="update" value="Update" class="submit-btn">
      </div>

    </form>
  </div>

</section>


<?php

if (isset($_POST['update'])) {
  if ($_SESSION['user_role'] == 'admin') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $rollNo = $_POST['rollNo'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $query = "UPDATE users SET username='$name', rollNo=$rollNo, address='$address', user_email='$email' WHERE user_id=$id";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    // header("Location: students.php?source=view");
  }
}

?>