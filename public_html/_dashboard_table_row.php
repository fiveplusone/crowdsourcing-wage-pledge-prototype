
      <table class="pledgeinfo_table">
        <tr>
          <td>Pledge ID</td>
          <td><?php echo $row["id"]; ?></td>
        </tr>
        <tr>
          <td>Pledge created at</td>
          <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <tr>
          <td>MTurk requester ID</td>
          <td><?php echo $row["mturk_requester_id"]; ?></td>
        </tr>
        <tr>
          <td>MTurk requester name</td>
          <td><?php echo $row["mturk_requester_name"]; ?></td>
        </tr>
        <tr>
          <td>Project name</td>
          <td><?php echo $row["project_name"]; ?></td>
        </tr>
        <tr>
          <td>Wage target (USD per hour)</td>
          <td><?php echo $row["wage_target"]; ?></td>
        </tr>
        <tr>
          <td>Project start date</td>
          <td><?php echo substr($row["project_start_date"], 0, 10); ?></td>
        </tr>
        <tr>
          <td>Project end date</td>
          <td><?php echo substr($row["project_end_date"], 0, 10); ?></td>
        </tr>
        <tr>
          <td>Pledge status</td>
          <td>
            <?php
              if ($row["status"] == "draft") {
                $status = "draft";
              } elseif ($row["status"] == "published") {
                $now = time();
                if ($now > strtotime($row["project_end_date"])) {
                  $status = "completed";
                } elseif ($now <= strtotime($row["project_start_date"])) {
                  $status = "published";
                } else {
                  $status = "active";
                }
              }
            ?>
            <?php echo $status; ?>
          </td>
        </tr>
        <tr>
          <td>Actions</td>
          <td>
            <?php if ($status != "completed") { ?>
              <a href="/edit_pledge.php?longid=<?php echo $row["longid"]; ?>">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
        </tr>
      </table>

