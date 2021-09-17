<?php
session_start();
include "../db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Pledges</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <style type="text/css">
    .subsubtitle { font-size: 1.2em }
    ul { margin-left: 20px; padding-right: 60px; }
    li { margin-bottom: 1em; }
  </style>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php if (array_key_exists("username", $_SESSION)) { ?>
  <p id="subnav" style="margin-top: 0">
    Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="logout.php">Log out</a>
  </p>
<?php } ?>
<?php $pagetitle = 'pledges'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">All Published and Currently Active Pledges</p>

<p><?php echo date("j F Y H:i T"); ?></p>

<p>&nbsp;</p>

<p>This page lists all pledges that are either:</p>

<ul>
  <li>published but not yet active (because the start date of the project the pledges is associated with is in the future), or</li>
  <li>currently active.</li>
</ul>

<p>It does not list pledges for projects that have already ended.</p>

<p>The pledges are listed in chronological order by the start dates of their associated projects.</p>

<?php
$stmt = $db->query("SELECT * FROM pledge WHERE status = 'published' AND project_end_date > NOW() ORDER BY project_start_date");
$rows = $stmt->fetchAll();
?>

<?php if (count($rows) > 0) { ?>
  <p style="font-weight: bold; margin-top: 1.5em">Pledges</p>
  <?php foreach ($rows as $row) { ?>
    <?php include "_pledge_list_table_row.php"; ?>
  <?php } ?>
<?php } else { ?>
  <p>&nbsp;</p>
  <p><strong>At the moment there are no published and/or active pledges that have not yet finished.</strong></p>
<?php } ?>

<p>&nbsp;</p>

<?php include 'footer.php'; ?>
</body>
</html>

