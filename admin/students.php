<?php include "includes/admin_header.php" ?>

<?php
// if not admin then dont allow to users page
if (!isset($_SESSION['adm'])) {
  header("Location: ../index.php");
}
?>

<!-- Navigation -->
<?php include "includes/admin_nav.php" ?>

<!-- Page Heading -->

<?php
if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {
  case 'add':
    include "includes/add_student.php";
    break;
  case 'edit':
    include "includes/edit_student.php";
    break;
  case 'view':
    include "includes/view_all_students.php";
    break;
  case 'grades':
    include "includes/grades.php";
    break;
  default:
    include "includes/view_all_students.php";
    break;
}
?>

<?php include "includes/admin_footer.php" ?>