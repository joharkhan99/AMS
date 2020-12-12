<section class="sect1">
  <h3 class="stud-name">Previous Attendence Record</h3>
  <hr class="side-line">

  <table class="data-table">

    <thead>
      <th>S.No</th>
      <th>Year</th>
      <th>Month</th>
      <th>Date</th>
      <th>Day</th>
      <th>Status</th>
    </thead>

    <tbody>
      <?php
      $i = 0;
      $id = $_SESSION['user_id'];

      $query = "SELECT * FROM attendence WHERE user_id=$id";
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      while ($row = mysqli_fetch_assoc($result)) :
        $i++;
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row['year']; ?></td>
          <td><?php echo $row['month']; ?></td>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['day']; ?></td>
          <td><span class="<?php echo $row['attendence_status'] == 'A' ? 'absent' : 'present'; ?>"><?php echo $row['attendence_status'] == 'A' ? 'Absent' : 'Present'; ?></span></td>
        </tr>

      <?php endwhile; ?>

    </tbody>

  </table>
</section>