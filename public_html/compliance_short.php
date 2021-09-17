<?php
session_start();
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL); */
include "../db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Compliance and Dispute Resolution Process - Summary</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <style type="text/css">
    .subsubtitle { font-size: 1.2em }
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
<?php $pagetitle = 'compliance_short'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">Compliance and Dispute Resolution Process - Summary</p>

<p>Version 25 June 2021</p>

<p>&nbsp;</p>

<p>
  If a worker believes that you are not meeting your target wage, they may contact the Wage Pledge office. If this happens, we will inform you as soon as possible how you can provide evidence of your compliance (or achieve compliance, if you are in fact not in compliance).
</p>

<p>
  Alternatively, you may be contacted directly by a worker who has received a rate that is below your target wage. In this case, you may wish to pay them a bonus to retroactively meet your target. 
</p>

<p>
  The complete description of the Wage Pledge compliance and dispute resolution process can be found <a href="compliance.php">here</a>.
</p>

<p>&nbsp;</p>

<?php include 'footer.php'; ?>
</body>
</html>
