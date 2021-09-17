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
  <title>Crowdsourcing Wage Pledge - Inquiry and Mediation Process</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <style type="text/css">
    .subsubtitle { font-size: 1.2em }
    ul { margin-left: 20px; padding-right: 60px; }
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
<?php $pagetitle = 'mediation'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">Inquiry and Mediation Process</p>

<p>Version 28 July 2021</p>

<p>&nbsp;</p>

<p>
  The Wage Pledge mediation process is designed to support requesters in meeting their Pledge targets.
</p>

<p>
  The goals of the Wage Pledge are to ensure that:
</p>

<ul>
  <li>80% or more of the tasks on a given project are compensated at or above the target wage, and</li>
  <li>work is not rejected in a manner inconsistent with the rejection policy posted by the requester for the project in question.</li>
</ul>

<p>
  The target wage and rejection policy are specified by the requester on a per-project basis.
</p>

<p class="subsubtitle">1&nbsp;&nbsp;Potential issues</p>

<p>
  A <a href="/inquiry_form.php">task inquiry form</a> exists that a Mechanical Turk worker can fill out and submit if they believe that they have done a task for a requester who has either:
</p>

<ul>
  <li>rejected work in manner inconsistent with the requester’s posted rejection policy, or</li>
  <li>not met their target wage.</li>
</ul>

<p><strong>(1) Rejected work</strong></p>

<p>
  When a requester rejects work, the worker is not paid. The <a href="https://www.mturk.com/participation-agreement" target="_blank">Mechanical Turk Participation Agreement</a> requires that requesters do not reject work "without good cause"; however, workers report that rejections without good cause are nonetheless common.
</p>

<p>
  While rejection is an important quality control mechanism, rejection without good cause is analogous to wage theft. Wage Pledge signatories are therefore asked to provide a clear list of circumstances under which submitted work will be rejected.
</p>

<p><strong>(2) Target wage</strong></p>

<p>
  Workers on Mechanical Turk are paid per task rather than per hour. Achieving a target wage requires the requester to estimate how long workers will take to complete their tasks.
</p>

<p>
  If a task takes longer than the requester expects, workers may not be paid the target wage.
</p>

<p class="subsubtitle">2&nbsp;&nbsp;Mediation process</p>

<p>
  When a worker who has done a task for a requester either:
</p>

<ul>
  <li>has their work rejected in a manner the worker believes is inconsistent with the requester’s posted rejection policy, or</li>
  <li>does not meet the requester’s posted target wage for the task in question,</li>
</ul>

<p>
  the worker can fill out and submit the task inquiry form.
</p>

<p>
  The Wage Pledge Facilitators will then review the inquiry.
</p>

<p>
  If appropriate, the Facilitators will contact the requester. Typically, the Facilitators will ask the requester to provide the payment record for the project in question to determine whether there is a need for mediation. The Facilitators will typically request that this information be provided within 15 working days. The Office will review this information within 15 working days of receiving it.
</p>

<p>
  The goals of the Wage Pledge are to ensure that:
</p>

<ul>
  <li>80% or more of the tasks on a given project are compensated at or above the target wage, and</li>
  <li>work is not rejected in a manner inconsistent with the rejection policy posted by the requester for the project in question.</li>
</ul>

<p>
  The target wage and rejection policy are specified by the requester on a per-project basis.
</p>

<p>
  If, based on the payment record, the Facilitators determine that the above goal has been met, they will notify the worker and the inquiry will be marked resolved.
</p>

<p>
  If the Facilitators determine that the above goal has not been met, they will provide the requester with guidance about how they can meet the goal, for example by paying workers “retroactively.” Confirmation that the goal has been met will typically be requested within 15 days. 
</p>

<p>
  If the requester meets the goal by issuing retroactive payments, the worker will be notified and the inquiry will be marked resolved.
</p>

<p>
  If the Facilitators determine that the goal has not been met but the requester is unwilling or unable to address the issue, the Facilitators will seek to mediate an acceptable resolution between the requester and the affected worker(s). If a resolution can be reached that is acceptable to the involved parties, the inquiry will be marked resolved.
</p>

<p>
  Inquiries that remain unresolved beyond the resolution timeline will be publicly listed as unresolved, unless the resolution timeline is extended or the inquiry enters into mediation.
</p>

<p>
  Requesters who do not respond to communications from the Facilitators will be listed as non-responsive.
</p>

<p><strong>2.1&nbsp;&nbsp;Project collaborators</strong></p>

<p>
  The Wage Pledge website allows a requester setting up a pledge for a particular project to add "collaborators" to that project.
</p>

<p>
  The Facilitators may contact collaborators on the project about an inquiry, especially in the event that the requester does not reply.
</p>

<p class="subsubtitle">3&nbsp;&nbsp;Late resolution of inquiries</p>

<p>
  If a requester takes steps to resolve the inquiry after it has been publicly listed as unresolved, the Facilitators may update the public information about the inquiry. The updated public listing may reflect the timeline of the resolution.
</p>

<p>
  The same applies for inquiries where the requester has been listed as non-responsive.
</p>

<p class="subsubtitle">4&nbsp;&nbsp;Confidentiality</p>

<p><strong>4.1&nbsp;&nbsp;Information about requesters</strong></p>

<p>
  Information about requesters posted publicly on the Wage Pledge website will include:
</p>

<ul style="padding-left: 4em">
  <li>basic information (e.g., Mechanical Turk requester name and ID)</li>
  <li>projects</li>
  <li>status of any inquiries (e.g., in mediation, resolved, unresolved, no response)</li>
</ul>

<p>
  The Wage Pledge Facilitators will make reasonable efforts to operate the Wage Pledge without publicly posting requesters’ personal information.
</p>

<p>
  If a requester uses their personal name as their requester name, it will be published on the Wage Pledge website.
</p>

<p>
  If a requester changes their requester name and notifies the Wage Pledge Facilitators, the Facilitators will update the requester name posted publicly on the Wage Pledge website.
</p>

<p>
  No circumstances under which it would become necessary to publicly post a requester’s other personal information such as contact information are foreseen. The Facilitators will only take such steps if it becomes necessary for the operation of the Wage Pledge.
</p>

<p>
  The Facilitators may disclose some personally identifiable information to specific third parties if it is necessary to resolve an inquiry (e.g., if the Office is unable to contact a requester via the information that the requester has provided).
</p>

<p><strong>4.2&nbsp;&nbsp;Information about workers and third parties</strong></p>

<p>
  No personally identifiable information about workers or third parties will be posted publicly to the Wage Pledge website unless it becomes necessary to do so for the functioning of the Wage Pledge. The Wage Pledge Facilitators will make reasonable efforts to operate the Wage Pledge without publicly posting personally identifiable information about workers or third parties.
</p>

<p class="subsubtitle">5&nbsp;&nbsp;Reporting</p>

<p>
  The Facilitators may publish reports and findings about the Wage Pledge with aggregated information and anonymized case descriptions. No personally identifying information will be included in these materials.
</p>

<p>&nbsp;</p>

<?php include 'footer.php'; ?>
</body>
</html>
