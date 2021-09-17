<?php
session_start();
$redir_url = "change_password.php";
include "redir.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Change Password</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'settings'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Change password</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>

<form action="do_change_password.php" method="post">
  <table width="100%">
    <tr>
      <td>Enter your current password</td>
      <td><input type="password" name="current_password" required /></td>
    </tr>
    <tr>
      <td>Choose a new password</td>
      <td><input type="password" name="new_password" required /></td>
    </tr>
    <tr>
      <td>Confirm your new password</td>
      <td><input type="password" name="confirm_password" required /></td>
    </tr>
  </table>
  <input type="submit" value="Change my password" />
</form>

<?php include 'footer.php'; ?>
</body>
</html>
