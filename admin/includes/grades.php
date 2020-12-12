<section class="stud-data">
  <h1 class="stud-title">All Students</h1>
  <hr class="side-line">

  <table class="data-table">

    <thead>
      <th>S.No</th>
      <th>Name</th>
      <th>Roll No</th>
      <th>Classes Attended</th>
      <th>Grade</th>
    </thead>

    <tbody>
      <?php

      $query = "SELECT * FROM users WHERE user_role='student'";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) :
        $db_id = $row['user_id'];
        $db_RollNo = $row['rollNo'];
        $db_email = $row['user_email'];
        $db_password = $row['user_password'];
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
        $classesAttended = classAttended($db_id);
        $grades = calculateGrade($classesAttended);

        if (empty($db_RollNo)) {
          $db_RollNo = '-';
        }

        $i++;
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $db_username; ?></td>
          <td><?php echo $db_RollNo; ?></td>
          <td><?php echo $classesAttended; ?></td>
          <td> <span class="grade-color" style="background-color: <?php echo gradeColor($grades); ?>;"><?php echo $grades; ?></span></td>
        </tr>

      <?php endwhile; ?>
    </tbody>
  </table>



</section>

<!-- Delete Student -->
<?php

if (isset($_GET['source']) && isset($_GET['id'])) {
  if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == 'admin' && $_GET['source'] == 'delete') {
      $user_id = $_GET['id'];
      $query = "DELETE FROM users WHERE user_id='$user_id'";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      header("Location: students.php");
    }
  }
}


?>