<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["email_verified"]);
unset($_SESSION["email"]);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Login</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'login'; ?>
<?php include 'nav.php'; ?>
<p class="subtitle">Log in</p>
<?php include 'flash.php'; ?>
<form action="do_login.php" method="post">
  <table width="100%">
    <tr>
      <td>Your username</td>
      <td><input type="text" name="username" required /></td>
    </tr>
    <tr>
      <td>Your password</td>
      <td><input type="password" name="password" required /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <a href="forgot_password.php">I forgot my password</a>
      </td>
    </tr>
  </table>
  <?php if ((array_key_exists("redir", $_GET)) && (strlen($_GET["redir"]) > 0)) { ?>
    <input type="hidden" name="redir_url" value="<?php echo $_GET["redir"]; ?>" />
  <?php } ?>
  <input type="submit" value="Log in" />
</form>
<?php include 'footer.php'; ?>
</body>
