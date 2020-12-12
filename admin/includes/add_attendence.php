<?php
// if not admin then dont allow to users page
if (isset($_SESSION["user_role"])) {
  if ($_SESSION["user_role"] != "admin")
    header("Location: ../index.php");
}
?>

<?php

$message = '';
if (isset($_POST['submit']) && isset($_SESSION['adm'])) {
  if ($_SESSION['user_role'] == 'admin') {
    $name = $_POST['name'];
    $rollNo = $_POST['rollNo'];
    $name = $_POST['name'];
    $status = $_POST['attend_status'];
    // $attend_date = date('Y-m-d', strtotime($_POST['attend_date']));
    // date()
    $attend_date = date('Y-m-d-l', strtotime($_POST['attend_date']));
    //conv str to array [year, month, date]
    $dateArr = explode('-', $attend_date);

    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    $year = $dateArr[0];
    $date = $dateArr[2];
    // $day = $days[((intval($dateArr[2]) + 7) % 7)];
    $day = $dateArr[3];
    $month = $months[intval($dateArr[1]) - 1];

    global $connection;
    $query = "SELECT rollNo,user_id FROM users WHERE rollNo=$rollNo";

    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_assoc($result);
    if ($rollNo == $row['rollNo']) {
      markAttendence($row['user_id'], $year, $day, $month, $date, $status, $name, $rollNo);
      $message = 'Attendence marked<br><a href="attendence.php?source=' . 'add' . '">Mark another attendence</a><br><a href="attendence.php?source=' . 'view' . '">View All Attendence</a>';
    }
  }
}

?>

<section class="stud-data">

  <h1 class="stud-title">Add Attendence</h1>
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
        <label class="attend-form-label">Attendence Date: </label>
        <input type="date" class="field" name="attend_date">
      </div>

      <div>
        <label class="attend-form-label">Attendence Status: </label>
        <select name="attend_status" class="field">
          <option value="" selected>please choose an option</option>
          <option value="A">Absent</option>
          <option value="P">Present</option>
        </select>
      </div>

      <div>
        <input type="submit" name="submit" class="submit-btn">
      </div>

    </form>
  </div>

</section>