<section class="sect1">
  <h1 class="stud-name">Students Leave Requests</h1>
  <hr class="side-line">

  <table class="emails">

    <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Roll No</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Date</th>
      <th>Status</th>
    </tr>

    <?php
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM emails WHERE user_id=$id";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) :
      $i++;
    ?>

      <tr>
        <td>
          <?php echo $i; ?>
        </td>
        <td>
          <?php echo $row['username']; ?>
        </td>
        <td>
          <?php echo $row['rollNo']; ?>
        </td>
        <td>
          <?php echo $row['user_email']; ?>
        </td>
        <td class="subject">
          <?php echo $row['subject']; ?>
        </td>
        <td>
          <?php echo $row['send_date']; ?>
        </td>
        <td>
          <span class="<?php echo $row['email_status'] == 'unapproved' ? 'unapprove' : 'approve'; ?>">
            <?php echo $row['email_status']; ?>
          </span>
        </td>
      </tr>

    <?php endwhile; ?>

  </table>
</section>