<?php include "includes/admin_header.php" ?>

<?php
// if not admin then dont allow to users page
if (!isset($_SESSION['adm'])) {
  header("Location: ../index.php");
}
?>

<!-- Navigation -->
<?php include "includes/admin_nav.php"; ?>

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
    include "includes/edit_leave.php";
    break;
  case 'view':
    include "includes/viewleave.php";
    break;
  default:
    include "includes/viewleave.php";
    break;
}
?>



<?php include "includes/admin_footer.php" ?>