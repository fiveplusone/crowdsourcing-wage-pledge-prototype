<?php
session_start();
$redir_url = "settings.php";
include "redir.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Account Settings</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'settings'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Account settings</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
  Account settings&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>

<p><a href="change_password.php">Change password</a></p>

<p><a href="personal_details.php">Personal details</a></p>

<?php include 'footer.php'; ?>
</body>
</html>
