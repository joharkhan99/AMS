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

$id = trim($_SESSION['user_id']);
$email = trim($_SESSION['user_email']);

// update user pic
if (isset($_POST['uploadimg'])) {
  $image = $_FILES['imgToUpload']['name'];
  if (!empty($image)) {

    $image_tempAddress = $_FILES['imgToUpload']['tmp_name'];

    //move img from temp addrss to images folder with its name
    move_uploaded_file($image_tempAddress, "img/$image");    //(filename, destination)

    $query = "UPDATE users SET user_image='$image' WHERE user_id=$id AND user_email='$email'";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);
    sleep(1);
    header("Location: profile.php");
  } else {
    echo "<script>alert('please choose an image first')</script>";
  }
}

?>

<section class="sect1">
  <h3 class="stud-name"><span class="name"><?php echo $_SESSION['user_role'] == 'student' ? strtoupper($_SESSION['username']) . "'s Profile" : 'Please Login' ?></span></h3>
  <hr class="side-line">


  <div class="profile-main">
    <?php
    // show user pic
    $query = "SELECT user_image FROM users WHERE user_id=$id AND user_email='$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    ?>

    <div class="user-img">
      <img src="img/<?php echo Defaultimage(mysqli_fetch_assoc($result)['user_image']); ?>" alt="">
    </div>

    <?php
    // show user info
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=$id AND user_email='$email' AND user_role='student'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $row = mysqli_fetch_assoc($result);

    ?>

    <div class="user-info">

      <div class="user-name">
        <!-- <i class="fas fa-user"></i> -->
        <i class="far fa-user"></i>
        <label>Name</label><br>
        <p><?php echo isset($row['username']) ? $row['username'] : '-'; ?></p>
      </div>

      <div class="school">
        <!-- <i class="fas fa-school"></i> -->
        <i class="far fa-school"></i>
        <label>College</label><br>
        <p>Comsats International University</p>
      </div>

      <div class="user-home">
        <!-- <i class="fas fa-home"></i> -->
        <i class="far fa-home"></i>
        <label>Postal Address</label><br>
        <p><?php echo isset($row['address']) ? $row['address'] : '-'; ?></p>
      </div>

      <div class="user-at-email">
        <!-- <i class="fas fa-at"></i> -->
        <i class="far fa-at"></i>
        <label>Email</label><br>
        <p><?php echo isset($row['user_email']) ? $row['user_email'] : '-'; ?></p>
      </div>

      <div class="user-rollNo">
        <!-- <i class="fas fa-scroll"></i> -->
        <i class="far fa-clipboard-list"></i>
        <label>Roll Number</label><br>
        <p><?php echo isset($row['rollNo']) ? $row['rollNo'] : '-'; ?></p>
      </div>

      <hr class="side-line">

      <div class="upload-img">
        <p>Change Profile Picture <small>(2160x2160 recommended size)</small> </p>
        <!-- <hr> -->
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" name="imgToUpload" id="fileToUpload">
          <input type="submit" value="Upload Image" name="uploadimg">
        </form>
      </div>

    </div>

  </div>

</section>

<?php include "includes/stud_footer.php" ?>