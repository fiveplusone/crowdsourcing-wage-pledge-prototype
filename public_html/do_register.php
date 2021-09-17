<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Register</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<?php

/* ini_set('display_errors', 'On');
error_reporting(E_ALL); */ // debug info
/* var_dump($_POST); */ // more debug info

if ($_POST["not_a_robot"] == "on") {

  include "../db.php";
  include "../sendgrid.php";
  include "util/generate_random_string.php";
  $stmt = $db->prepare("INSERT INTO user (created_at, username, email, email_verification_code, password, firstname, lastname, secondary_email, tel, institution, inst_city, inst_country, inst_role, other_institutions_and_roles) VALUES (NOW(), :username, :email, :email_verification_code, :password, :firstname, :lastname, :secondary_email, :tel, :institution, :inst_city, :inst_country, :inst_role, :other_institutions_and_roles)");
  $code = generate_random_string(10) . date("YmdHis");
  $params = array(':username' => $_POST["username"],
                  ':email' => $_POST["email"],
                  ':email_verification_code' => $code,
                  ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
                  ':firstname' => $_POST["firstname"],
                  ':lastname' => $_POST["lastname"],
                  ':secondary_email' => $_POST["secondary_email"],
                  ':tel' => $_POST["tel"],
                  ':institution' => $_POST["institution"],
                  ':inst_city' => $_POST["inst_city"],
                  ':inst_country' => $_POST["inst_country"],
                  ':inst_role' => $_POST["role"],
                  ':other_institutions_and_roles' => $_POST["other_institutions_and_roles"]);
  if ($stmt->execute($params)) { ?>

    <?php $email_subj = "Crowdsourcing Wage Pledge - Please verify ownership of your email address"; ?>

    <?php $email_body = "Hello,\\n\\nThank you for signing up to the Crowdsourcing Wage Pledge website.\\n\\nHere is a link to verify your email address:\\n\\nhttps://wagepledge.org/verify_email.php?code=" . $code . "\\n\\nThank you!"; ?>

    <?php send_mail($_POST["email"], $email_subj, $email_body); ?>

    <p><?php echo 'Welcome, ' . $_POST["username"] . '!'; ?></p>

    <p>Thank you for registering!</p>

    <p>We've just sent you an email at <?php echo $_POST["email"]; ?>.</p>

    <p>In that email is a link to confirm your ownership of that address. Please click the link.</p>

    <p>If the email doesn't appear in your inbox within 10 minutes, please check your spam or junk email folder.</p>

    <p>If you don't get an email within 12 hours, please email us at info@wagepledge.org.</p>

  <?php } else { ?>

    <p id="title">Something went wrong</p>

    <p>We&rsquo;re very sorry, something seems to have gone wrong.</p>

    <p>Please email us at <a href="mailto:info@wagepledge.org">info@wagepledge.org</a>.</p>

    <p style="padding-bottom: 30px">Thank you. We apologize for the inconvenience.</p>

  <?php } ?>

<?php } else { ?>

  <p id="title">Something went wrong</p>

  <p>It seems like you didn&rsquo;t check the &ldquo;I&rsquo;m not a robot&rdquo; box.</p>

  <p>Please go back, make sure the box is checked, and try submitting the form again.</p>

  <p>If you did check the box, something unexpected may have gone wrong! Please email us at <a href="mailto:info@wagepledge.org">info@wagepledge.org</a>. Thank you and our apologies for the inconvenience.</p>

  <p style="padding-bottom: 30px"><a href="javascript:window.history.back();" style="border: 0; font-weight: bold">&larr; Back</a></p>

<?php } ?>
<?php include 'footer.php'; ?>
</body>
</html>
