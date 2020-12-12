<a href="#" title="logo">
  <i class="fas fa-chart-bar logo"></i>
</a>
<!-- nav -->
<nav class="fixed-nav-bar">
  <!-- large screen -->
  <div class="top-links">

    <?php

    if (isset($_SESSION['user_role'])) {
      if ($_SESSION['user_role'] == 'student') {

        global $connection;
        $id = $_SESSION['user_id'];
        $query = "SELECT user_image FROM users WHERE user_id=$id";
        $result = mysqli_query($connection, $query);
        $image = mysqli_fetch_assoc($result)['user_image'];
      }
    }
    ?>

    <a href="profile.php" class="profile-pic" title="click to view your profile"><img src="../student/img/<?php echo $image; ?>" alt=""></a>
  </div>
  <!-- small screen -->
  <div class="sidenav" id="sidenav">
    <a title="close" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


    <a href="index.php">Home</a>
    <a href="profile.php">Profile</a>
    <hr class="side-line">
    <a href="attendence.php?source=mark">Mark Attendence</a>
    <a href="attendence.php?source=view">View Previous Attendence</a>

    <hr class="side-line">

    <a href="leave.php?source=add">Write Leave Request</a>
    <a href="leave.php?source=view">Leave Request Status</a>

    <hr class="side-line">

    <form action="../logout.php" method="POST">
      <input type="submit" name="logout" class="logout-btn" value="logout">
    </form>

  </div>
  <span title="menu" onclick="openNav()" class="bars"><i class="fas fa-bars"></i></span>
</nav>
<!-- nav end -->