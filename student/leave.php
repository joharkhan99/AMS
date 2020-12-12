<?php include "includes/stud_header.php" ?>

<?php
// if not student then dont allow to users page
if (!isset($_SESSION['stud'])) {
  // if ($_SESSION['user_role'] != 'student')
  header("Location: ../index.php");
}
?>

<?php include "includes/stud_nav.php" ?>

<?php
if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {
  case 'add':
    include "includes/addleave.php";
    break;
  case 'view':
    include "includes/viewleaves.php";
    break;
  default:
    include "includes/view_all_attendence.php";
    break;
}
?>

<?php include "includes/stud_footer.php" ?>