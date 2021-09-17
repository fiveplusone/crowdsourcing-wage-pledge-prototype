<?php include 'util/country_datalist_options.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Register</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="js/add_text_area_callback.js"></script>
  <script src="js/check_username.js"></script>
  <script src="js/check_email.js"></script>
  <script src="js/check_secondary_email.js"></script>
  <script src="js/check_password.js"></script>
  <script src="js/check_password_confirmation.js"></script>
  <script type="text/javascript">
    window.onload = function() {
      add_text_area_callback(document.getElementById("username"), check_username, 50);
      add_text_area_callback(document.getElementById("email"), check_email, 50);
      add_text_area_callback(document.getElementById("secondary_email"), check_secondary_email, 50);
      add_text_area_callback(document.getElementById("password"), check_password, 50);
      add_text_area_callback(document.getElementById("confirm_password"), check_password_confirmation, 50);
      check_username();
      check_email();
      check_secondary_email();
    }
    function validate() {
      var valid = true;
      /* check fname */
      if (document.getElementById("firstname").value == "") { valid = false; }
      /* check lname */
      if (document.getElementById("lastname").value == "") { valid = false; }
      /* check primary inst aff */
      if (document.getElementById("institution").value == "") { valid = false; }
      /* check city */
      if (document.getElementById("city").value == "") { valid = false; }
      /* check country */
      if (document.getElementById("country").value == "") { valid = false; }
      /* check role */
      if (document.getElementById("role").value == "") { valid = false; }
      /* check inst email */
      if (document.getElementById("email").value == "") { valid = false; }
      /* check username */
      if (document.getElementById("username").value == "") { valid = false; }
      var unameinfo = document.getElementById("username_info");
      uic = unameinfo.children;
      if ((uic.length > 0) && (uic[0].className == "reg_field_error")) { valid = false; }
      /* check password */
      if (document.getElementById("password").value == "") { valid = false; }
      var pwinfo = document.getElementById("password_info");
      pic = pwinfo.children;
      if ((pic.length > 0) && (pic[0].className == "reg_field_error")) { valid = false; }
      /* check password confirm */
      if (document.getElementById("confirm_password").value == "") { valid = false; }
      var cpwinfo = document.getElementById("confirm_password_info");
      cpic = cpwinfo.children;
      if ((cpic.length > 0) && (cpic[0].className == "reg_field_error")) { valid = false; }
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
<?php $pagetitle = 'register'; ?>
<?php include 'nav.php'; ?>
<p class="subtitle">Register</p>
<p>
  All fields are required unless marked otherwise.
</p>
<form action="do_register.php" method="post" onsubmit="return validate()">
  <table width="100%">
    <tr>
      <td>Your first name(s)</td>
      <td><input type="text" name="firstname" id="firstname" required /></td>
    </tr>
    <tr>
      <td>Your last name(s)</td>
      <td><input type="text" name="lastname" id="lastname" required /></td>
    </tr>
    <tr>
      <td>Your primary institutional affiliation</td>
      <td><input type="text" name="institution" id="institution" required /></td>
    </tr>
    <tr>
      <td colspan="2" style="padding-bottom: 0">
        <strong>This institution is located in:</strong>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="inst_city" placeholder="City" id="city" required />
      </td>
      <td>
        <input type="text" name="inst_country" placeholder="Country" id="country" list="country_list" required />
        <datalist id="country_list">
          <?php echo $country_datalist_options; ?>
        </datalist>
      </td>
    </tr>
    <tr>
      <td>
        Your primary role at this institution<br/>
      </td>
      <td>
        <input type="text" name="role" placeholder="Please select, or enter if your role is not listed:" list="role_list" id="role" required />
        <datalist id="role_list">
          <option value="Student - Undergraduate">Student - Undergraduate</option>
          <option value="Student - Master's">Graduate Student - Master's</option>
          <option value="Student - PhD">Graduate Student - PhD</option>
          <option value="Postdoc">Postdoc</option>
          <option value="Asst Prof">Assistant Professor</option>
          <option value="Assoc Prof">Associate Professor</option>
          <option value="Prof">Professor</option>
          <option value="Research Scientist">Research Scientist</option>
          <option value="Administrator">Administrator</option>
        </datalist>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        If you have any additional roles at this or other institutions that you feel are relevant to your participation in the Wage Pledge, please feel free to share them here (optional):<br/>
        <textarea name="other_institutions_and_roles"></textarea>
      </td>
    </tr>
    <tr>
      <td>Your institutional email address</td>
      <td>
        <input type="text" name="email" id="email" style="width: 86%" required />
        <span id="email_info">&nbsp;</span><br/>
        <span id="email_info_text" class="infotext">&nbsp;</span>
      </td>
    </tr>
    <tr>
      <td>
        A secondary email address (optional)<br/>
        <span class="helpertext">
          We ask for this so we can contact you if there is a dispute about your tasks and we are not able to contact you at your main email address.
        </span>
      </td>
      <td style="vertical-align: top">
        <input type="text" name="secondary_email" id="secondary_email" style="width: 86%" />
        <span id="secondary_email_info">&nbsp;</span><br/>
        <span id="secondary_email_info_text" class="infotext">&nbsp;</span>
      </td>
    </tr>
    <tr>
      <td>
        A phone number you can be reached at, including country code (optional)<br/>
        <span class="helpertext">
          We ask for this so we can contact you if there is a dispute about your tasks and we are not able to contact you by email.
        </span>
      </td>
      <td style="vertical-align: top"><input type="text" name="tel" /></td>
    </tr>
    <tr>
      <td class="half-width-on-big-screen">
        Choose a username<br/>
        <span class="helpertext">Your username must be at least 8 characters long.</span>
      </td>
      <td style="vertical-align: top">
        <input type="text" name="username" id="username" style="width: 86%" required />
        <span id="username_info">&nbsp;</span><br/>
        <span id="username_info_text" class="infotext">&nbsp;</span>
      </td>
    </tr>
    <tr>
      <td>
        Choose a password<br/>
        <span class="helpertext">Your password must be at least 12 characters long.</span>
      </td>
      <td>
        <input type="password" name="password" id="password" style="width: 86%" required />
        <span id="password_info">&nbsp;</span><br/>
        <span id="password_info_text" class="infotext">&nbsp;</span>
      </td>
    </tr>
    <tr>
      <td>Confirm your password</td>
      <td>
        <input type="password" name="confirm_password" id="confirm_password" style="width: 86%" required />
        <span id="confirm_password_info">&nbsp;</span><br/>
        <span id="confirm_password_info_text" class="infotext">&nbsp;</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <label for="not_a_robot" class="checkboxlabel">
          <input type="checkbox" name="not_a_robot" id="not_a_robot" />
          Please check this box if you are not a robot
        </label>
      </td>
    </tr>
  </table>
  <input type="submit" value="Create account" />
</form>
<?php include 'footer.php'; ?>
</body>
