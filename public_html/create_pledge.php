<?php
session_start();
$redir_url = "create_pledge.php";
include "redir.php";
include "../db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Crowdsourcing Wage Pledge - Create New Pledge</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<p id="title">Crowdsourcing Wage Pledge</p>
<?php $pagetitle = 'create_pledge'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>
<p class="subtitle" style="margin-bottom: 0">Create a New Pledge</p>
<p id="subnav" style="margin-top: 0">
  Logged in as <strong><?php echo $_SESSION["username"]; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="settings.php">Account settings</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Log out</a>
</p>

<form action="do_create_pledge.php" method="post">
  <table width="100%">
    <tr>
      <td class="half-width-on-big-screen">
        Project name
        <span class="helpertext">
          Use the title of the tasks ("HITs") you plan to post.
        </span>
      </td>
      <td>
      	<input type="text" name="project_name" id="project_name" required />
      </td>
    </tr>
    <tr>
      <td>
        Mechanical Turk Requester Name for this project
        <span class="helpertext">
          The Requester Name you are using on Mechanical Turk for this project.<br/>
          This may be your name, or, if you have changed it to protect your privacy, it may be something else, such as "ABCD Research Lab".
        </span>
      </td>
      <td valign="top">
      	<input type="text" name="project_mturk_requester_name" id="project_mturk_requester_name" required />
      </td>
    </tr>
    <tr>
      <td>
        Mechanical Turk Requester ID for this project
        <span class="helpertext">
          The Mechanical Turk ID of the Requester account you are using for this project.<br/>
          This is typically a string of letters and numbers starting with "A", like "A123ABC45DEFG".
        </span>
      </td>
      <td valign="top">
      	<input type="text" name="project_mturk_requester_id" id="project_mturk_requester_id" required />
      </td>
    </tr>
    <tr>
      <td>
        Project start date<br/>
        <span class="helpertext">
          Enter an approximate date for when you plan to start posting tasks for this project.
        </span>
      </td>
      <td valign="top">
        <input type="date" name="project_start_date" id="project_start_date" required />
      </td>
    </tr>
    <tr>
      <td>
        Project end date
        <span class="helpertext">
          Enter an approximate date for when you expect the last tasks associated with this project to be completed.
        </span>
      </td>
      <td valign="top">
        <input type="date" name="project_end_date" id="project_end_date" required />
      </td>
    </tr>
    <tr>
      <td>
        Let other people manage the pledge for this project
        <span class="helpertext">
          Enter the email addresses of other people you would like to be able to edit and manage this pledge, separated by commas; for example:<div style="margin: 0.5em 0 0 1em"><strong>dana.smith@uni.ac.uk, loren.jones@univ.edu</strong></div>
        </span>
      </td>
      <td valign="top">
        <input type="text" name="collaborators" id="collaborators" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="subsubtitle" style="font-size: 1.4em; margin-top: 1.5em">
          The pledge for this project
        </div>
      </td>
    </tr>
    <tr>
      <td>
        Enter the <em>target wage</em> for this project in US dollars per hour
      </td>
      <td valign="top">
        <input name="wage_target" id="wage_target" type="text" required />
      </td>
    </tr>
    <tr>
      <td colspan="2" style="background-color: #eee; padding: 16px; font-size: 0.9em">
        <strong>What is the &lsquo;target wage&rsquo;?</strong>
        <p>The target wage is the wage, in US dollars per hour, that you <em>aim</em> to pay for your tasks.</p>
        <p>We know that some workers work more quickly than others. With regard to wages, the goal of the wage pledge is to ensure that 80% or more of the tasks on a given project are compensated at or above the target wage.</p> 
        <p>For guidance on choosing a target wage, see <a href="http://digitallabourlab.ca/faq.php#recommended_wage" target="_blank">our FAQ page</a>.</p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <label for="commit" class="checkboxlabel">
          <input type="checkbox" name="commit" id="commit" />
          I understand and commit to the above pledge
        </label>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <p><strong>Policy for approval or rejection of submitted work</strong></p>
        <p style="font-size: 0.9em">Please enter the text you use to explain to workers how you will decide whether their work is accepted or rejected.</p>
        <textarea name="rejection_policy" style="height: 100px"></textarea>
      </tr>
    </tr>
    <tr>
      <td colspan="2">
        <label for="rejection_policy_commit" class="checkboxlabel">
          <input type="checkbox" name="rejection_policy_commit" id="rejection_policy_commit" />
          I have made sure that this policy is clearly visible to workers before they start working on my tasks and I intend to follow this policy as closely as possible
        </label>
      </td>
    </tr>
    <tr colspan="2"><td style="font-size: 0.15em; line-height: 0.1">&nbsp;</td></tr>
    <tr>
      <td colspan="2" style="background-color: #eee; padding: 16px; font-size: 0.9em">
        <strong>Mediation</strong>
        <p>
          If a worker believes that you have not met your target wage or are rejecting work in a manner inconsistent with your posted rejection policy, they may fill out the inquiry form. The Wage Pledge Facilitators will contact you and ask you to provide more information about your project. The Facilitators aim to support you in meeting your pledge targets. If a legitimate dispute arises, the Facilitators will endeavor to mediate the dispute. A full explanation of the process can be found <a href="http://digitallabourlab.ca/mediation.php" target="_blank">here</a>.</p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <label for="agree_compliance_process" class="checkboxlabel">
          <input type="checkbox" name="agree_compliance_process" id="agree_compliance_process" />
          I understand that the Wage Pledge Facilitators may contact me about inquiries relating to my pledges
        </label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Save as draft" name="save_draft" />
      </td>
      <td>
        <input type="submit" value="Preview" name="preview" />
      </td>
    </tr>
  </table>
</form>

<?php include 'footer.php'; ?>
</body>
</html>
