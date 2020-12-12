<?php

$alert = '';

if (isset($_POST['submit'])) {
  if (isset($_SESSION['user_role']) && isset($_SESSION['stud'])) {
    if ($_SESSION['user_role'] == 'student') {

      $name = $_POST['name'];
      $rollNo = $_POST['rollNo'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $id = $_SESSION['user_id'];

      if (!empty($name) && !empty($rollNo) && !empty($email) && !empty($subject) && !empty($message)) {
        $query = "INSERT INTO emails(user_id,username,rollNo,user_email,subject,send_date,message) VALUES($id,'$name',$rollNo,'$email','$subject',now(),'$message')";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);
        $alert = 'Leave Request Submitted To Admin';
      }
    }
  }
}

?>
<section class="sect1">
  <h3 class="stud-name">Please Fill Below Form For Leave Request</h3>
  <hr class="side-line">

  <div class="email-container">
    <p><?php echo $alert; ?></p>
    <form action="" method="POST">
      <div class="email-name">
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
      </div>
      <div class="email-rollNo">
        <input type="text" name="rollNo" placeholder="Enter your roll no" required>
      </div>
      <div class="email-email">
        <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>" required>
      </div>
      <div class="email-subject">
        <input type="text" name="subject" placeholder="Enter leave subject line" required>
      </div>
      <div class="email-message">
        <textarea name="message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
      </div>
      <div class="email-btn">
        <input type="submit" name="submit">
      </div>
    </form>
  </div>

</section>