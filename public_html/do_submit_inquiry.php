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
  $stmt = $db->prepare("INSERT INTO inquiry (created_at, created_ip, name, email, tel, mturk_worker_id, country, requester, mturk_requester_id, task_info, inquiry_about, task_completed_date, inquiry_description, contacted_req, inquiry_status, longid) VALUES (NOW(), :created_ip, :name, :email, :tel, :mturk_worker_id, :country, :requester, :mturk_requester_id, :task_info, :inquiry_about, :task_completed_date, :inquiry_description, :contacted_req, :inquiry_status, :longid)");
  $email = $_POST["email"];
  $code = generate_random_number_string(4) . date("YmdHis");
  $params = array(':created_ip' => $_SERVER['REMOTE_ADDR'],
                  ':name' => $_POST["name"],
                  ':email' => $email,
                  ':tel' => $_POST["tel"],
                  ':mturk_worker_id' => $_POST["mturk_worker_id"],
                  ':country' => $_POST["country"],
                  ':requester' => $_POST["requester"],
                  ':mturk_requester_id' => $_POST["mturk_requester_id"],
                  ':task_info' => $_POST["task_info"],
                  ':inquiry_about' => $_POST["inquiry_about"],
                  ':task_completed_date' => $_POST["task_completed_date"],
                  ':inquiry_description' => $_POST["inquiry_description"],
                  ':contacted_req' => $_POST["contacted_req"],
                  ':inquiry_status' => "submitted",
                  ':longid' => $code);
  if ($stmt->execute($params)) { ?>

    <?php $email_subj = "Crowdsourcing Wage Pledge - Your inquiry was received"; ?>

    <?php $email_body = "Hello,\\n\\nThe inquiry you submitted to the Crowdsourcing Wage Pledge website was received.\\n\\nYour inquiry number is: " . $code . "\\n\\nPlease expect us to contact you at this email address within 15 working days.\\n\\nAdditional information:\\n\\nYour name: " . $_POST["name"] . "\\nThe requester: " . $_POST["requester"] . "\\nRequester ID: " . $_POST["mturk_requester_id"] . "\\nThe task: " . $_POST["task_info"] . "\\nReason for the inquiry: " . $_POST["inquiry_about"] . "\\nMore info: " . $_POST["inquiry_description"]; ?>

    <?php send_mail($email, $email_subj, $email_body); ?>

    <p>Thank you for your inquiry.</p>

    <p>Your inquiry number is <strong><?php echo $code; ?></strong>.</p>

    <p>Please save this number for your reference.</p>

    <p>You should receive a copy of your inquiry by email at <?php echo $email; ?>.</p>

    <p>If you don't, please check your spam folder.</p>

    <p>It is likely we will contact the requester and ask them to look into the situation with your task.</p>

    <p>Please expect a response from us to your email address within 15 working days.</p>

    <p>If you do not receive a response from us, feel free to email us at info@wagepledge.org. Please include your inquiry number in your message.</p>

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

