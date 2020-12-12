<?php include "includes/admin_header.php" ?>

<?php
// if not admin then dont allow to users page
if (!isset($_SESSION['adm'])) {
  header("Location: ../index.php");
}
?>

<!-- Navigation -->
<?php include "includes/admin_nav.php"; ?>

<!-- Page Heading -->

</h1>

<?php
if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {
  case 'add':
    include "includes/add_attendence.php";
    break;
  case 'view':
    include "includes/view_stud_attend.php";
    break;
  default:
    include "includes/view_stud_attend.php";
}
?>


<!-- /.row -->

<!-- /.container-fluid -->

<!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>