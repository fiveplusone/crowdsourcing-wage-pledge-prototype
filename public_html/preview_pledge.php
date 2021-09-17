<?php
session_start();
$redir_url = "dashboard.php";
include "redir.php";
include "../db.php";

$longid = $_GET["longid"];

$stmt = $db->prepare("SELECT * FROM pledge WHERE longid = ? LIMIT 1");
$stmt->execute(array($longid));
$pledge = $stmt->fetch();
$pledge_user_id = $pledge["user_id"];

$stmt = $db->prepare("SELECT id, email, email_verified FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$logged_in_user_id = $row["id"];
$logged_in_user_email = $row["email"];
$logged_in_user_is_verified = $row["email_verified"];

$collaborator_emails = [];
$stmt = $db->prepare("SELECT collaborator_email FROM pledge_collaborator WHERE pledge_id = ?");
$stmt->execute(array($pledge["id"]));
$res = $stmt->fetchAll();
foreach ($res as $row) { array_push($collaborator_emails, $row["collaborator_email"]); }

if (($pledge_user_id == $logged_in_user_id) || (in_array($logged_in_user_email, $collaborator_emails) && $logged_in_user_is_verified)) {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Preview Draft Pledge</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'preview_pledge'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Preview Draft Pledge</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>

<p style="margin-top: 2em">
  The information about your project and pledge shown below will be publicly available to workers.
</p>

<form action="do_publish_pledge.php" method="post">
<table class="pledgeinfo_table">
  <!--
  <tr>
    <td>Pledge ID</td>
    <td><?php echo $pledge["id"]; ?></td>
  </tr>
  <tr>
    <td>Pledge created at</td>
    <td><?php echo $pledge["created_at"]; ?></td>
  </tr>
  -->
  <tr style="background-color: #fff">
    <td>MTurk requester ID</td>
    <td><?php echo $pledge["mturk_requester_id"]; ?></td>
  </tr>
  <tr>
    <td>MTurk requester name</td>
    <td><?php echo $pledge["mturk_requester_name"]; ?></td>
  </tr>
  <tr>
    <td>Project name</td>
    <td><?php echo $pledge["project_name"]; ?></td>
  </tr>
  <tr>
    <td>Wage target (USD per hour)</td>
    <td><?php echo $pledge["wage_target"]; ?></td>
  </tr>
  <tr>
    <td>Project start date</td>
    <td><?php echo $pledge["project_start_date"]; ?></td>
  </tr>
  <tr>
    <td>Project end date</td>
    <td><?php echo $pledge["project_end_date"]; ?></td>
  </tr>
  <tr>
    <td>Policy for approval or rejection of submitted work</td>
    <td><?php echo $pledge["rejection_policy"]; ?></p>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: normal">
      <label for="rejection_policy_commit" class="checkboxlabel">
        <input type="checkbox" name="rejection_policy_commit" id="rejection_policy_commit" <?php if ($pledge["rejection_policy_checkbox"] == 1) { echo "checked"; } ?> />
        I have made sure that the above listed policy for approval or rejection is clearly visible to workers before they start working on my tasks and I intend to follow this policy as closely as possible
      </label>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: normal">
      <label for="commit" class="checkboxlabel">
        <input type="checkbox" name="commit" id="commit" <?php if ($pledge["target_wage_understand_checkbox"] == 1) { echo "checked"; } ?> /> I understand that the goal of the Wage Pledge with regard to wages is to ensure that 80% or more of the tasks on a given project are compensated at or above the target wage
      </label>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: normal">
      <label for="agree_compliance_process" class="checkboxlabel">
        <input type="checkbox" name="agree_compliance_process" id="agree_compliance_process" <?php if ($pledge["compliance_process_checkbox"] == 1) { echo "checked"; } ?> />
        I understand that the Wage Pledge Facilitators may contact me about inquiries relating to my pledges 
      </label>
    </td>
  </tr>
</table>
<input type="hidden" name="longid" value="<?php echo $longid; ?>" />
<table width="100%">
  <tr>
    <td style="width: 50%; padding: 8px 8px 16px 32px">
      <input type="submit" value="&larr; Go back and edit" name="go_back_and_edit" />
    </td>
    <td style="width: 50%; padding: 8px 32px 16px 8px">
      <input type="submit" value="Publish pledge &rarr;" name="publish" />
    </td>
  </tr>
</table>
</form>

<?php

} else {

  $_SESSION["error"] = "Sorry, that page doesn't seem to exist.";
  header("Location: /dashboard.php");

} 

?>

<?php include 'footer.php'; ?>
</body>
</html>
