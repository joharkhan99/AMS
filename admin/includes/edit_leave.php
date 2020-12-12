<section class="stud-data">
  <h1 class="stud-title">Respond To Leave Request</h1>
  <hr class="side-line">

  <?php

  if (isset($_GET['source']) && isset($_SESSION['user_role'])) {
    if (isset($_GET['email']) && $_GET['source'] == 'edit' && $_SESSION['user_role'] == 'admin') {
      $email_id = $_GET['email'];
      $query = "SELECT * FROM emails WHERE id=$email_id";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      $row = mysqli_fetch_assoc($result);
    }
  }

  ?>

  <div class="message-container">

    <div class="inbox-date">
      <p>Dated</p>
      <span><?php echo $row['send_date']; ?></span>
    </div>

    <div>
      <p>From</p>
      <span><?php echo $row['username']; ?></span>
    </div>

    <div>
      <p>Roll No</p>
      <span><?php echo $row['rollNo']; ?></span>
    </div>

    <div>
      <p>Email</p>
      <span><?php echo $row['user_email']; ?></span>
    </div>

    <div>
      <p>Subject</p>
      <span><?php echo $row['subject']; ?></span>
    </div>

    <div class="inbox-message">
      <p>Message</p>
      <span><?php echo $row['message']; ?></span>
    </div>

    <form action="" method="POST">
      <input type="submit" name="approve" value="Approve" id="">
      <input type="submit" name="unapprove" value="Reject" id="">
    </form>

  </div>

</section>

<?php

// approve leave request
if ($_SESSION['user_role'] == 'admin') {
  if (isset($_POST['approve'])) {
    $email_id = $_GET['email'];
    $query = "UPDATE emails SET email_status='approved' WHERE id=$email_id";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    sleep(1);
    header("Location: leaves.php");
  }
}

// unapprove/reject leave (dont need to send query bcz status is already unapproved/by default in DB)
if ($_SESSION['user_role'] == 'admin') {
  if (isset($_POST['unapprove'])) {
    sleep(1);
    header("Location: leaves.php");
  }
}


?>