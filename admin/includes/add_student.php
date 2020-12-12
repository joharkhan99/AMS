<?php

$message = '';

if (isset($_POST['submit'])) {
  if ($_SESSION['user_role'] == 'admin') {
    $name = trim($_POST['name']);
    $rollNo = trim($_POST['rollNo']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);

    registerUser($name, $rollNo, $address, $email);
    $message = 'Student registered<br><a href="students.php?source=' . 'add' . '">Register another student</a><br><a href="students.php?source=' . 'view' . '">View All Students</a>';
  }
}

?>

<section class="stud-data">

  <h1 class="stud-title">Add New Student</h1>
  <hr class="side-line">

  <div class="attend-div">
    <p><?php echo $message; ?></p>
    <form action="" method="POST">

      <div>
        <label class="attend-form-label">Student Name: </label>
        <input type="text" class="field" name="name" placeholder="Enter name">
      </div>

      <div>
        <label class="attend-form-label">Student Roll No: </label>
        <input type="text" class="field" name="rollNo" placeholder="Enter roll number (e.g: 1,2,3...)">
      </div>

      <div>
        <label class="attend-form-label">Student Postal Address: </label>
        <input type="text" class="field" name="address" placeholder="Enter address">
      </div>

      <div>
        <label class="attend-form-label">Student Email: </label>
        <input type="text" class="field" name="email" placeholder="Enter email">
      </div>

      <div>
        <input type="submit" name="submit" class="submit-btn">
      </div>

    </form>
  </div>

</section>