<?php
session_start();
include "../db.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Verify Email</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>

<?php
$stmt = $db->prepare("SELECT id, email, username FROM user WHERE email_verification_code=? LIMIT 1");
$stmt->execute(array($_GET["code"]));
$row = $stmt->fetch();

if ($row) {
  $stmt = $db->prepare("UPDATE user SET email_verified=1, email_verified_at=NOW() WHERE id=?");
  $stmt->execute(array($row["id"]));
  $_SESSION["email"] = $row["email"];
  $_SESSION["email_verified"] = true;
  $_SESSION["username"] = $row["username"];
?>

<p>Thank you for verifying your email address!</p>

<p><a href="dashboard.php">Go to your dashboard&nbsp;&rarr;</a></p>

<?php } else { ?>

<p>We're sorry, it looks like something went wrong.</p>

<p>Please email us at <a href="mailto:info@wagepledge.org">info@wagepledge.org</a>.</p>

<p>We apologize for the inconvenience.</p>

<?php } ?>

<?php include 'footer.php'; ?>

</body>
</html>
