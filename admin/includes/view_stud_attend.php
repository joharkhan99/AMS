<section class="stud-data">
  <h1 class="stud-title">Students Attendence</h1>

  <hr class="side-line">

  <table class="data-table">

    <thead>
      <th>S.No</th>
      <th>Name</th>
      <th>Year</th>
      <th>Month</th>
      <th>Date</th>
      <th>Day</th>
      <th>Status</th>
      <th>Delete</th>
    </thead>

    <tbody>

      <?php
      global $connection;

      $i = 0;
      $query = "SELECT users.user_id, users.username, attendence.year, attendence.month, attendence.date, attendence.day, attendence.attendence_status FROM users INNER JOIN attendence ON users.user_id=attendence.user_id";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      while ($row = mysqli_fetch_assoc($result)) :
        $id = $row['user_id'];
        $username = $row['username'];
        $year = $row['year'];
        $month = $row['month'];
        $date = $row['date'];
        $day = $row['day'];
        $attendence = $row['attendence_status'];
        $i++;
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $username; ?></td>
          <td><?php echo $year; ?></td>
          <td><?php echo $month; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $day; ?></td>
          <td><span class="<?php echo $attendence == 'A' ? 'absent' : 'present'; ?>"><?php echo $attendence == 'A' ? 'Absent' : 'Present'; ?></span></td>
          <td>
            <a href="attendence.php?source=delete_attend&id=<?php echo $id; ?>&year=<?php echo $year; ?>&month=<?php echo $month; ?>&date=<?php echo $date; ?>" class="delete-icon"><i class="fas fa-trash" onclick="javascript: return confirm('Are you sure?')"></i></a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <table class="data-table" style="margin-top: 30px;">
    <tr>
      <th colspan="2" style="padding: 3px;">Make Students Attendence Report</th>
    </tr>
  </table>

  <form action="attendencereport.php" method="POST">

    <div class="from-div">
      <!-- <span>From </span> -->
      <select name="fromYear">
        <option value="" selected>Select Year</option>
        <?php
        for ($i = 1990; $i <= date('Y'); $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>

      <select name="fromMonth">
        <option value="" selected>Select Month</option>
        <?php
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        foreach ($months as $key => $value) {
          echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>

      <select name="fromDate">
        <option value="" selected>Select From Date</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>

      <select name="toDate">
        <option value="" selected>Select To Date</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>

    </div>

    <!-- <div class="to-div">
      <span>To </span>
      <select name="toYear">
        <option value="" selected>Select Year</option>
        <?php
        for ($i = 1990; $i <= date('Y'); $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>

      <select name="toMonth">
        <option value="" selected>Select Month</option>
        <?php
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        foreach ($months as $key => $value) {
          echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>

      <select name="toDate">
        <option value="" selected>Select Date</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div> -->

    <div class="to-div">
      <input type="submit" name="submit" value="Generate Report" id="" class="report-btn">
    </div>


  </form>

</section>

<?php

if (isset($_GET['source']) && isset($_GET['year']) && isset($_GET['month']) && isset($_GET['date'])) {
  if (isset($_SESSION['user_role'])) {
    if ($_GET['source'] == 'delete_attend') {
      $user_id = $_GET['id'];
      $year = $_GET['year'];
      $month = $_GET['month'];
      $date = $_GET['date'];
      $query = "DELETE FROM attendence WHERE user_id='$user_id' AND year=$year AND month='$month' AND date=$date";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      header("Location: attendence.php?source=view");
    }
  }
}

?>