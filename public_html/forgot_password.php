<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'forgot_password'; ?>
<?php include 'nav.php'; ?>
<p class="subtitle">Forgot password</p>
<?php include 'flash.php'; ?>
<form action="do_forgot_password.php" method="post">
  <table width="100%">
    <tr>
      <td colspan="2">
        Please enter your username OR the institutional email address you used to register your account.
      </td>
    </tr>
    <tr>
      <td>Your username</td>
      <td><input type="text" name="username" /></td>
    </tr>
    <tr>
      <td colspan="2" style="padding-left: 1em">OR</td>
    </tr>
    <tr>
      <td>Your institutional email address</td>
      <td><input type="text" name="email" /></td>
    </tr>
  </table>
  <input type="submit" value="Reset password" />
</form>
<?php include 'footer.php'; ?>
</body>
