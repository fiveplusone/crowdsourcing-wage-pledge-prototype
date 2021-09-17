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
  <title>Crowdsourcing Wage Pledge - FAQ</title>
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
<?php $pagetitle = 'gdpr'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">Data Protection Statement</p>

<p>Version 8 August 2021</p>

<p>&nbsp;</p>

<p><strong>Responsible for data processing</strong></p>

<p>
  Michael "Six" Silberman<br/>
  328-329 Upper Street<br/>
  London N12XQ<br/>
  England<br/>
  info@wagepledge.org
</p>

<p>The preferred method of contact is email.</p>

<p>&nbsp;</p>

<p><strong>1&nbsp;&nbsp;General</strong></p>

<p>
  When you access any page on this website, the following potentially personal data are saved on our server:
</p>

<blockquote>
  (1) Your IP address<br/><br/>
  (2) The time and date you accessed the site<br/><br/>
  (3) Information about your web browser (the "User-Agent" string)
</blockquote>

<p>
  These data are used only for purposes relating to the technical functioning and maintenance of this website. They will not be shared with any third party for any purpose. They will not be stored for more than two years.
</p>

<p style="margin-top: 2em"><strong>2&nbsp;&nbsp;Cookies</strong></p>

<p>
  Cookies are used on this website only for the purpose of allowing users to register, log in, and administer information about their pledges.
</p>

<p>
  If you do not create an account on this website and sign in, this website will not serve you any cookies.
</p>

<p>
  If you create an account on this website, cookies will be used to allow you to log in and administer your information. It is not possible to facilitate this interaction without cookies.
</p>

<p>
  No non-essential cookies are used on this website.
</p>

<p style="margin-top: 2em"><strong>3&nbsp;&nbsp;SSL</strong></p>

<p>All pages on this website are served via SSL/HTTPS.</p>

<p style="margin-top: 2em"><strong>4&nbsp;&nbsp;Data submitted by you</strong></p>

<p>
  This website makes it possible for you to upload data, such as your contact information and information about projects you are operating on crowdsourcing platforms.
</p>

<p>
  The legal basis for the collection and processing of this data with respect to users in the EU is Art. 6 para. 1 lit. a GDPR (data subject's consent). 
</p>

<p style="margin-top: 2em"><strong>5&nbsp;&nbsp;Your rights</strong></p>

<p>
  The EU General Data Protection Regulation (GPPR) provides users of this website located in the EU with specific rights with respect to their personal data.
</p>

<p>
  Users in other locations with similar data protection regulation, such the United Kingdom and California, may have similar rights.
</p>

<p>
  The rights of users in the EU are provided by Articles 13 through 22 (Sections 2 through 4) of GDPR and are as follows:
</p>

<ul>
  <li>The right to be informed of personal data being processed</li>
  <li>The right to access the personal data being processed (i.e., to receive a copy)</li>
  <li>The right to request rectification of inaccurate personal data</li>
  <li>The right to request erasure of your personal data</li>
  <li>The right to request &ldquo;restriction of processing&rdquo; of personal data you believe may be inaccurate</li>
  <li>Where the legal basis for data processing is not your consent but rather the &ldquo;legitimate interests&rdquo; of the website operator (in this case the collection of IP addresses and browser information and their storage in server log files), the right to object to that processing</li>
  <li>The right to portability, i.e., the right to transfer your data to another &ldquo;controller&rdquo;</li>
  <li>Where the legal basis for data processing is your consent, the right to withdraw consent for processing of your personal data (this does not affect the lawfulness of processing based on your consent prior to your withdrawal of consent)</li>
  <li>The right to be informed of the existence of automated decision-making, including profiling, based on your personal data, and to be provided with meaningful information about the logic involved as well as the envisaged consequences</li>
  <li>The right to lodge a complaint with a supervisory authority</li>
</ul>

<p>The relevant supervisory authority for users located in the EU is the user's local supervisory authority.</p>

<p>&nbsp;</p>

<p>This data protection statement may be updated occasionally to reflect changes to the website and/or new legal developments.</p>

<?php include 'footer.php'; ?>
</body>
</html>
