<?php include "includes/stud_header.php" ?>

<?php
// if not student then dont allow to users page
if (isset($_SESSION['stud'])) {
  // if ($_SESSION['user_role'] != 'student')
  // header("Location: ../index.php");
  // }
?>

  <section class="sect1">
    <h3 class="stud-name"><span class="name"><?php echo isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'student' ? "Welcome " . strtoupper($_SESSION['username']) : 'Please Login' ?></span>
    </h3>
    <hr class="side-line">
  </section>

<?php include "includes/stud_footer.php";
} else {
  header("Location: ../index.php");
}
?>