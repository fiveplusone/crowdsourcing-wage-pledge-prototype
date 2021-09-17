<?php
session_start();

$redir_url = "personal_details.php";
include "redir.php";

include "../db.php";
$stmt = $db->prepare("SELECT firstname, lastname, institution, inst_city, inst_country, inst_role, other_institutions_and_roles, email, secondary_email, tel FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$institution = $row["institution"];
$inst_city = $row["inst_city"];
$inst_country = $row["inst_country"];
$primary_inst_role = $row["inst_role"];
$other_inst = $row["other_institutions_and_roles"];
$email = $row["email"];
$secondary_email = $row["secondary_email"];
$tel = $row["tel"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Personal Details</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'personal_details'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Personal Details</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>

<form action="do_update_personal_details.php" method="post">
  <table width="100%">
    <tr>
      <td>Your first name(s)</td>
      <td><input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" required /></td>
    </tr>
    <tr>
      <td>Your last name(s)</td>
      <td><input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" required /></td>
    </tr>
    <tr>
      <td>Your primary institutional affiliation</td>
      <td><input type="text" name="institution" id="institution" value="<?php echo $institution; ?>" required /></td>
    </tr>
    <tr>
      <td colspan="2" style="padding-bottom: 0">
        <strong>This institution is located in:</strong>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="inst_city" id="city" value="<?php echo $inst_city; ?>" required />
      </td>
      <td>
        <input type="text" name="inst_country" id="country" value="<?php echo $inst_country; ?>" required />
      </td>
    </tr>
    <tr>
      <td>
        Your primary role at this institution<br/>
      </td>
      <td>
        <input type="text" name="role" value="<?php echo $primary_inst_role; ?>" list="role_list" id="role" required />
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
        <textarea name="other_institutions_and_roles"><?php echo $other_inst; ?></textarea>
      </td>
    </tr>
    <tr>
      <td>Your institutional email address</td>
      <td>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" required />
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
        <input type="text" name="secondary_email" id="secondary_email" value="<?php echo $secondary_email; ?>" />
      </td>
    </tr>
    <tr>
      <td>
        A phone number you can be reached at, including country code (optional)<br/>
        <span class="helpertext">
          We ask for this so we can contact you if there is a dispute about your tasks and we are not able to contact you by email.
        </span>
      </td>
      <td style="vertical-align: top"><input type="text" name="tel" value="<?php echo $tel; ?>" /></td>
    </tr>
    <tr>
      <td class="half-width-on-big-screen">
        Username<br/>
        <span class="helpertext">This cannot be changed.</span>
      </td>
      <td style="vertical-align: top"><?php echo $_SESSION["username"]; ?></td>
    </tr>
  </table>
  <input type="submit" value="Update my personal details" />
</form>

<?php include 'footer.php'; ?>
</body>
</html>
