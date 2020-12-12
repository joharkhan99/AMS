<?php
// set timezone for the submit/mark btn
date_default_timezone_set("Asia/Karachi");

$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

$day = date('l');
$year = date('Y');
$month = $months[intval(date('m')) - 1];
$date = date('d');

// submit attendence to db
if (isset($_POST['submit'])) {
  if ($_SESSION['user_role'] == 'student') {
    if (isset($_POST['mark'])) {
      markAttendence($_SESSION['user_id'], $year, $day, $month, $date, 'P');
      sleep(1);
    }
  }
}


?>

<section class="sect1">
  <h3 class="stud-name">Mark Your Attendence</h3>
  <hr class="side-line">

  <table class="data-table">

    <thead>
      <th>year</th>
      <th>Month</th>
      <th>Date</th>
      <th>Day</th>
      <th>Mark Attendence</th>
    </thead>

    <tbody>
      <tr>
        <td><?php echo $year; ?></td>
        <td><?php echo $month; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $day; ?></td>
        <td class="btn-td">
          <form action="" method="POST">
            <input type="hidden" name="mark" value="mark">
            <input class="mark-btn" type="submit" name="submit" value="Mark" title="click to mark your attendence" <?php echo intval(date("H")) > 8 && intval(date("H")) < 16 ? '' : 'disabled' ?>>
          </form>
        </td>
      </tr>
    </tbody>

  </table><br>
  <small style="color: tomato;font-size:11px;">Attendence Time (8AM - 4PM).<br>After this time Mark button will be disabled.</small>

</section>

<script>
  // document.querySelector('.mark-btn').addEventListener('click', (e) => {
  // showAlert('success', 'submitted');
  // hideBtn();
  // e.preventDefault();
  // });
</script>