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
<?php $pagetitle = 'faq'; ?>
<?php include 'nav.php'; ?>
<?php include 'flash.php'; ?>

<p class="subtitle" style="margin-bottom: 0">Frequently Asked Questions</p>

<p>Version 30 August 2021</p>

<p>&nbsp;</p>

<!--<p class="subsubtitle">Contents</p>-->

<p><strong>Q: What are the goals of the Wage Pledge?</strong></p>

<p>A: The goals of the Wage Pledge are to ensure that:</p>

<ul>
	<li>80% or more of the tasks on a given project are compensated at or above the target wage, and</li>
  <li>Work is not rejected in a manner inconsistent with the rejection policy posted by the requester for the project in question.</li>
</ul>

<br/>

<p><strong>Q: Who can see my pledges?</strong></p>

<p>A: Your pledges are publicly available on the internet. This includes your requester ID and name, the title of your tasks, your target wage(s), and information about resolved or unresolved inquiries relating to your pledges.</p>

<br/>

<p><strong>Q: Why should I sign up?</strong></p>

<p>A: There are a lot of reasons you might want to create pledges for your projects. Here are a few:</p>

<ul>
  <li>If you care about improving pay on crowdsourcing platforms: by participating in the wage pledge you contribute to normalizing higher pay for crowdworkers.</li>
  <li>If you care about attracting higher quality work: by participating in the wage pledge, you signal to workers that you pay tasks well and that you are aware of the issues commonly faced by crowdworkers. This may attract more experienced and skilled workers to your tasks. It may also result in your tasks being completed more quickly.</li>
  <li>If you care about maintaining good relationships with the workers doing your tasks, and about maintaining a good reputation as a requester of crowdwork: by participating in the wage pledge, you signal to workers that you are willing to make the effort to resolve issues that workers may encounter while completing your tasks. This may build goodwill with workers.</li>
  <li>If you are using crowdsourcing to collect data that will be published: we know that some reviewers recommend rejection for research papers whose data was collected via low-paying crowdsourcing. By participating in the wage pledge, you signal to reviewers of your research that you have taken steps to fairly pay the workers who contributed to your research.</li>
</ul>

<br/>

<a name="recommended_wage"></a><p><strong>Q: What hourly target wage should I use?</strong></p>

<p>A: We recommend a target wage of $16.54 per hour.</p>

<p>If you can’t afford that much, pay as much as you can.</p>

<p><em>Why?</em></p>

<p>$16.54 is the living wage in the United States, <a href="https://livingwage.mit.edu/articles/61-new-living-wage-data-for-now-available-on-the-tool" target="_blank">calculated in March 2020</a>. We use the US living wage because many Mechanical Turk workers are based in the US, and many research requesters restrict their tasks to US-based workers.</p>

<br/>

<p><strong>Q: How should I determine how much to pay for each of my tasks?</strong></p>

<p>A: Because workers on Mechanical Turk (and most crowdsourcing platforms) are paid per task, not per hour, and different workers may take different amounts of time to complete the same task, it can be tricky to decide how much to pay for a given task, even if you have a target hourly wage in mind.</p>

<p>We recommend the following process:</p>

<ol>
  <li>Choose a target hourly wage, if you have not already. (If you don’t know what hourly wage to aim for, see <a href="#recommended_wage">“What hourly target wage should I use?”</a>)</li>
  <li>Estimate how long your task will take a worker. Workers do some kinds of tasks slower than you might expect and some kinds of tasks faster than you might expect. Do not be surprised if the time it takes you, or one of your students, to do your task is significantly different than the time it takes a worker.</li>
  <li>
    Pilot your task with a group of crowdworkers. If possible, use the same screening criteria you will use for your “real” task.<br/><br/>
    Piloting your task will help you accurately estimate how long workers will take to do your task.<br/><br/>
    We recommend you calculate the “task time” as the time taken by the median worker in your pilot group plus 30%.
  </li>
  <li>
    Set your per-task reward using the following formula:
    <blockquote>per-task reward = task time in minutes / 60 * hourly wage target</blockquote>
  </li>
</ol>

<br/>

<p><strong>Q: How can I share my wage pledge commitment with others?</strong></p>

<p>A: You can share your wage pledge commitment with others in your publications, at departmental or ethics board meetings, or via social media using a sentence such as:</p>

<blockquote>Workers in this study were paid $X per hour. This project was registered with the Crowdsourcing Wage Pledge and has no unresolved worker inquiries.</blockquote>

<p>If you would like, you can cite this page. You can use any format you like but a reasonable one might be:</p>

<blockquote>
WagePledge.org. 2021. Crowdsourcing Wage Pledge - FAQ, version 30 August 2021. Accessed 30 August 2021. Available online at https://wagepledge.org/faq.php.
</blockquote>

<br/>

<p><strong>Q: What happens if a worker contacts the Wage Pledge Facilitators about one of my projects?</strong></p>

<p>A: If the worker submits an inquiry about one of your projects and believes that you have either rejected work in a manner inconsistent with your posted rejection policy, or not met your target wage, the Facilitators will contact you and ask you to provide more information about your project. If a legitimate dispute arises, the Facilitators will endeavor to mediate the dispute. A full explanation of the process can be found <a href="http://digitallabourlab.ca/mediation.php">here</a>.</p>

<br/>

<p><strong>Q: Can I have a student or other collaborator be the 'point person' for inquiries on a project that is run from my requester account?</strong></p>

<p>A: Yes! If we receive an inquiry, our first point of contact is the person who created the pledge. If that person doesn't reply, we'll contact people listed as 'collaborators' on the pledge. Ideally, the point person should create the pledge through an account registered to their email address, and add other collaborators to the 'Let other people manage the pledge for this project' field when they create it (see screenshot below).</p>

<p style="text-align: center">
  <img src="/img/collaborators_field.png" alt="A screenshot of the 'Let other people manage the pledge for this project' field from the 'Create a pledge' form of this website" style="max-width: 100%" />
</p>

<br/>

<p><strong>Q: Is there an API that I can use to collect data about active pledges programmatically?</strong></p>

<p>A: Yes. For now, <a href="https://wagepledge.org/api.php" target="_blank">https://wagepledge.org/api.php</a> provides a JSON representation of the same data displayed on the <a href="pledges.php">pledges page</a>.</p>

<p>If you require some other data, such as data about completed pledges, or if you plan to make many requests to this API endpoint, please contact us at info@wagepledge.org. Please note that at this time the output provided by the API is subject to change without notice.</p>

<br/>

<p><strong>Q: Who is operating the Wage Pledge and who is it funded by?</strong></p>

<p>A: The Wage Pledge is operated by Hannah Johnston, a postdoctoral researcher at Northeastern University; Six Silberman, a London-based software engineer; and Jamie Woodcock, a senior lecturer at the Open University in London. The project received funding from <a href="https://not-equal.tech/" target="_blank">Not-Equal</a>, a network funded by UK Research and Innovation.</p>

<br/>

<p><strong>Q: I have a question that is not answered here. Who can I contact?</strong></p>

<p>A: You can email us at info@wagepledge.org. We look forward to your questions!</p>

<p>&nbsp;</p>

<?php include 'footer.php'; ?>
</body>
</html>
