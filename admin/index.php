<?php include "includes/admin_header.php"; ?>
<?php

// below is to check for online users
// $session = session_id();    //id of user thst logs in to our system
// $time = time();
// $time_out_in_secs = 10;
// //amount of time after which user is showned offline
// $timeout = $time - $time_out_in_secs;

// $query = "SELECT * FROM users_online WHERE session='$session'";
// $result = mysqli_query($connection, $query);
// confirmQuery($result);
// $count = mysqli_num_rows($result);
// if ($count == null) {
//   mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES ('$session', $time)");
// } else {
//   mysqli_query($connection, "UPDATE users_online SET time=$time WHERE session='$session'");
// }

// $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time>$timeout");
// confirmQuery($users_online_query);
// $count_user = mysqli_num_rows($users_online_query);

?>

<?php
// if not admin then dont allow to users page
if (isset($_SESSION['adm'])) {
  // header("Location: ../index.php");
?>

  <?php include "includes/admin_nav.php"; ?>

  <section class="sect1">

    <div class="col totalUsers">
      <i class="fas fa-users"></i>
      <h1><?php echo totalStudents(); ?></h1>
      <p>Total Students</p>
      <hr>
      <a href="../admin/students.php">click here for details <i class="fas fa-chevron-right"></i></a>
    </div>

    <div class="col newUsers">
      <i class="fas fa-inbox"></i>
      <h1><?php echo totalRequests(); ?></h1>
      <p>Leave Requests</p>
      <hr>
      <a href="leaves.php">click here for details <i class="fas fa-chevron-right"></i></a>
    </div>

    <div class="col totalCourses">
      <i class="fas fa-book"></i>
      <!-- <i class="fas fa-user-check"></i> -->
      <h1>5</h1>
      <p>Total Courses</p>
      <hr>
      <a href="#">click here for details <i class="fas fa-chevron-right"></i></a>
    </div>

  </section>

<?php include "includes/admin_footer.php";
} else {
  header("Location: ../index.php");
} ?>