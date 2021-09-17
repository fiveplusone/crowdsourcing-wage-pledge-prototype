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
  <title>Crowdsourcing Wage Pledge - Inquiry Form</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <style type="text/css">
    .subsubtitle { font-size: 1.2em }
    ul, ol { margin-left: 20px; padding-right: 60px; }
    li { margin-bottom: 1em; }
  </style>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="js/add_text_area_callback.js"></script>
  <script type="text/javascript">
    function check_email() {
      var address = document.getElementById("email").value;
      var info = document.getElementById("email_info");
      var infotext = document.getElementById("email_info_text");
      var regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
      if (address.length == 0) {
        info.innerHTML = "";
        infotext.innerText = "";
      } else if (regex.test(address)) {
        info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
        infotext.innerText = "";
      } else {
        info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
        infotext.innerText = "That doesn't look like an email address.";
      }
    }
    window.onload = function() {
      add_text_area_callback(document.getElementById("email"), check_email, 50);
    }
    function validate() {
      var valid = true;
      /* check email */
      if (document.getElementById("email").value == "") { valid = false; }
      if (valid) {
        return true;
      } else {
        alert('Please check that you have filled out all required fields and that there are no errors.\r\n\r\nIf you believe you\'ve received this message in error, please email us at info@wagepledge.org.\r\n\r\nThank you!');
        return false;
      }
    }
  </script>
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'inquiry'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">Inquiry Form</p>

<p>
  If you have done a task for which there is a wage pledge, and you believe that:
</p>

<ul>
  <li>your work was rejected in a manner not consistent with the requester's posted rejected policy, and/or</li>
  <li>the payment you earned fell short of the target wage posted for the task in question</li>
</ul>

<p>
  you can open an inquiry by filling out the form below.
</p>

<p>
  All fields are required unless marked otherwise.
</p>

<form action="do_submit_inquiry.php" method="post" onsubmit="return validate()">
<table width="100%">
  <tr>
    <td class="half-width-on-big-screen">Your full name</td>
    <td><input type="text" name="name" id="name" required /></td>
  </tr>
  <tr>
    <td>Your email address</td>
    <td>
      <input type="text" name="email" id="email" style="width: 86%" required />
      <span id="email_info">&nbsp;</span><br/>
      <span id="email_info_text" class="infotext">&nbsp;</span>
    </td>
  </tr>
  <tr>
    <td>Your Mechanical Turk worker ID (optional)</td>
    <td><input type="text" name="mturk_worker_id" id="mturk_worker_id" /></td>
  </tr>
  <tr>
    <td>Your phone number (optional)</td>
    <td><input type="text" name="tel" id="tel" /></td>
  </tr>
  <tr>
    <td>The country you are located in</td>
    <td><input type="text" name="country" id="country" required /></td>
  </tr>
  <tr>
    <td>The <strong>requester name</strong> of the requester who posted the task you are inquiring about</td>
    <td style="vertical-align: top"><input type="text" name="requester" id="requester" required /></td>
  </tr>
  <tr>
    <td>The <strong>Mechanical Turk requester ID</strong> of the requester who posted the task you are inquiring about (optional)</td>
    <td style="vertical-align: top"><input type="text" name="mturk_requester_id" id="mturk_requester_id" /></td>
  </tr>
  <tr>
    <td colspan="2">
      Information about the <strong>task</strong> you are inquiring about, such as the task name, description, and/or HIT ID<br/>
      <textarea name="task_info" required></textarea>
    </td>
  </tr>
  <tr>
    <td>When did you do the task?</td>
    <td><input type="text" name="task_completed_date" id="task_completed_date" required /></td>
  </tr>
  <tr>
    <td>What happened with the task that has led you make this inquiry?</td>
    <td style="vertical-align: top">
      <select name="inquiry_about" required>
        <option value="" disabled selected>Please select:</option>
        <option value="rejection">my work was rejected</option>
        <option value="target_wage">target wage was not met</option>
        <option value="other">something else</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Have you already contacted the requester directly about the issue?</td>
    <td style="vertical-align: top">
      <label><input type="radio" name="contacted_req" value="yes" />&nbsp;&nbsp;yes</label>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <label><input type="radio" name="contacted_req" value="no" />&nbsp;&nbsp;no</label>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      Please explain what happened.<br/>
      <textarea name="inquiry_description" required></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <label for="not_a_robot" class="checkboxlabel">
        <input type="checkbox" name="not_a_robot" id="not_a_robot" required />
        Please check this box if you are not a robot
      </label>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="padding: 10px 15px; border-radius: 3px; border: 1px solid #d1d3d4"> 
      By submitting the contents of this form you indicate that you understand that the Wage Pledge Facilitators may:
      <ul>
        <li>contact you for more information about your inquiry, and</li>
        <li>contact the requester to ask for information about your particular task, and in doing so, forward information such as your MTurk worker ID.</li>
      </ul>
    </td>
  </tr>
</table>
<input type="submit" value="Submit inquiry" />
</form>
<?php include 'footer.php'; ?>
</body>
</html>
