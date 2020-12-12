<section class="stud-data">
  <h1 class="stud-title">Students Leave Requests</h1>
  <hr class="side-line">

  <div class="email-table">
    <table class="emails">

      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
      </tr>

      <?php
      $query = "SELECT * FROM emails WHERE email_status='unapproved'";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);

      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) :
        $i++;
        if (strlen($row['message']) > 50)
          $row['message'] = substr($row['message'], 0, 50);
      ?>

        <tr>
          <td title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $i; ?>
            </a>
          </td>
          <td class="name" title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['username']; ?>
            </a>
          </td>
          <td title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['rollNo']; ?>
            </a>
          </td>
          <td title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['user_email']; ?>
            </a>
          </td>
          <td class="subject" title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['subject']; ?>
            </a>
          </td>
          <td title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['message'] . "..."; ?>
            </a>
          </td>
          <td title="click to open">
            <a href="leaves.php?source=edit&email=<?php echo $row['id'] ?>">
              <?php echo $row['send_date']; ?>
            </a>
          </td>
        </tr>

      <?php endwhile; ?>

    </table>
  </div>
</section>