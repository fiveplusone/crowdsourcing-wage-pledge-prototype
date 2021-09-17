<?php
session_start();
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL); */
$redir_url = "dashboard.php";
include "redir.php";
include "../db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Dashboard</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'dashboard'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Dashboard</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  Dashboard&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>
<?php

$stmt = $db->prepare("SELECT id, email, email_verified FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$user_id = $row["id"];
$logged_in_user_email = $row["email"];
$logged_in_user_verified = $row["email_verified"];

$stmt = $db->prepare("SELECT * FROM pledge WHERE user_id = ? ORDER BY updated_at DESC");
$stmt->execute(array($user_id));
$rows = $stmt->fetchAll();
if (count($rows) > 0) { ?>
  <p><strong>My pledges</strong></p>
    <?php foreach ($rows as $row) { ?>
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
            <?php if ($status == "active") { ?>
              <a onclick="return confirm('Clicking this will indicate that the project has ended earlier than planned. This cannot be undone. Are you sure?')" href="/do_end_project_early.php?longid=<?php echo $row["longid"]; ?>">End project early</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
        </tr>
      </table>
    <?php } ?>
<?php } else { ?>
  <p>You don't have any pledges yet.</p>
<?php } ?>

<?php if ($logged_in_user_verified) { ?>
  <?php
    $stmt = $db->prepare("SELECT * FROM pledge WHERE id IN (SELECT pledge_id FROM pledge_collaborator WHERE collaborator_email = ?)");
    $stmt->execute(array($logged_in_user_email));
    $rows = $stmt->fetchAll();
  ?>  
  <?php if (count($rows) > 0) { ?>
    <p><strong>Pledges on which I am a collaborator</strong></p>
    <?php foreach ($rows as $row) { ?>
      <?php include "_dashboard_table_row.php"; ?>
    <?php } ?>
  <?php } ?>
<?php } ?>

<p style="border-top: 1px dotted #333; margin: 0 30px; padding: 4px 6px">
  <a href="create_pledge.php" class="pledge-link">Create a new pledge&nbsp;&rarr;</a>
</p>

<?php include 'footer.php'; ?>
</body>
</html>
