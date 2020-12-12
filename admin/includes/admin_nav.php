<a href="#" title="logo">
  <i class="fas fa-chart-bar logo"></i>
</a>
<!-- nav -->
<nav class="fixed-nav-bar">
  <!-- large screen -->
  <div class="top-links">
    <a href="#">About</a>
    <a href="#">Service</a>
    <a href="#">Web</a>
    <a href="#">Conatct</a>
  </div>
  <!-- small screen -->
  <div class="sidenav" id="sidenav">
    <a title="close" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="index.php">Home</a>
    <a href="leaves.php?source=view">Leave Requests</a>
    <hr class="side-line">

    <a href="students.php?source=view">View All Students</a>
    <a href="students.php?source=add">Add Student</a>
    <a href="students.php?source=grades">Student Grades</a>

    <hr class="side-line">

    <a href="attendence.php?source=view">View Attendence</a>
    <a href="attendence.php?source=add">Add Attendence</a>

    <hr class="side-line">

    <a href="#">Add Course</a>
    <a href="#">Edit Course</a>
    <a href="#">Delete Course</a>

    <hr class="side-line">

    <form action="../logout.php" method="POST">
      <input type="submit" name="logout" class="logout-btn" value="logout">
    </form>

  </div>
  <span title="menu" onclick="openNav()" class="bars"><i class="fas fa-bars"></i></span>
</nav>
<!-- nav end -->