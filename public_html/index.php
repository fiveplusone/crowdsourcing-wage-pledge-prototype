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
  <title>Crowdsourcing Wage Pledge</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <style type="text/css">
    .subsubtitle { font-size: 1.2em }
    ul, ol { margin-left: 20px; padding-right: 60px; }
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
<?php $pagetitle = 'home'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p>&nbsp;</p>

<p>
  The point of this website is to let crowdsourcing requesters publicly commit to paying at least a certain wage level.
</p>

<p>
  <strong>If you are a requester and you would like to 'sign the pledge,' you can <a href="/register.php">sign up here</a>.</strong>
</p>

<br/>

<p><strong>How it works in brief</strong></p>

<ul>
<li>A requester can set different wage levels for different projects, and let collaborators administer their pledges.</li>

<li>For now, the website only supports pledges relating to tasks posted to Amazon Mechanical Turk. It may support other crowdsourcing platforms in the future.</li>

<li>This website also lets workers inquire about issues they have had completing tasks posted by requesters who have signed the pledge.</li>

<li>The website operators will contact requesters about these inquiries, support them in meeting their target wages if they encounter difficulties, and endeavor to mediate disputes that may arise.</li>
</ul>

<p>
  This website is a prototype. It will not be operated indefinitely. If there is significant interest in operating it indefinitely, we will seek institutional support.
</p>

<p>
  If you have questions, they might be answered by <a href="faq.php">the FAQ page</a>.
</p>

<?php include 'footer.php'; ?>
</body>
</html>
