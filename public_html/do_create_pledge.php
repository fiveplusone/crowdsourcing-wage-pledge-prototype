<?php
session_start();
include "../db.php";

/*
var_dump($_SESSION);
echo '<br/><br/>';
var_dump($_POST);

ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

$stmt = $db->prepare("SELECT id FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$user_id = $row["id"];

if (($_POST["save_draft"] == "Save as draft") || ($_POST["preview"] == "Preview")) {

  $task_percentage_for_wage_target = 80;
  $wage_target_f = (float) $_POST["wage_target"];
  $wage_floor = 0.75 * $wage_target_f;
  $task_percentage_for_wage_floor = 95;
  $t = time();
  $time_str = (string) $t;
  $longid = $time_str . substr($_SESSION["username"], 0, 4);
  if ($_POST["commit"] == "on") { $commit = 1; } else { $commit = 0; }
  if ($_POST["rejection_policy_commit"] == "on") { $rejection_commit = 1; } else { $rejection_commit = 0; }
  if ($_POST["agree_compliance_process"] == "on") { $compliance_commit = 1; } else { $compliance_commit = 0; }
  $stmt = $db->prepare("INSERT INTO pledge (longid, created_at, updated_at, user_id, created_ip, last_updated_ip, project_name, mturk_requester_name, mturk_requester_id, project_start_date, project_end_date, wage_target, task_percentage_for_wage_target, wage_floor, task_percentage_for_wage_floor, status, rejection_policy, target_wage_understand_checkbox, rejection_policy_checkbox, compliance_process_checkbox) VALUES (:longid, NOW(), NOW(), :user_id, :ip, :ip, :project_name, :mturk_requester_name, :mturk_requester_id, :project_start_date, :project_end_date, :wage_target, :task_percentage_for_wage_target, :wage_floor, :task_percentage_for_wage_floor, :status, :rejection_policy, :target_wage_understand_checkbox, :rejection_policy_checkbox, :compliance_process_checkbox)");
  $params = array(':longid' => $longid,
                  ':ip' => $_SERVER['REMOTE_ADDR'],
                  ':user_id' => $user_id,
                  ':project_name' => $_POST["project_name"],
                  ':mturk_requester_name' => $_POST["project_mturk_requester_name"],
                  ':mturk_requester_id' => $_POST["project_mturk_requester_id"],
                  ':project_start_date' => $_POST["project_start_date"],
                  ':project_end_date' => $_POST["project_end_date"],
                  ':wage_target' => $_POST["wage_target"],
                  ':task_percentage_for_wage_target' => $task_percentage_for_wage_target,
                  ':wage_floor' => $wage_floor,
                  ':task_percentage_for_wage_floor' => $task_percentage_for_wage_floor,
                  ':rejection_policy' => $_POST["rejection_policy"],
                  ':status' => "draft",
                  ':target_wage_understand_checkbox' => $commit,
                  ':rejection_policy_checkbox' => $rejection_commit,
                  ':compliance_process_checkbox' => $compliance_commit);

  if ($stmt->execute($params)) {

    /* save collaborators if any entered */ 

    if ((array_key_exists("collaborators", $_POST)) && (strlen($_POST["collaborators"]) > 0)) {

      $stmt = $db->prepare("SELECT id FROM pledge WHERE longid = ? LIMIT 1");
      $stmt->execute(array($longid));
      $pledge_row = $stmt->fetch();
      $pledge_id = $pledge_row["id"];

      $collaborators = explode(",", $_POST["collaborators"]);

      foreach ($collaborators as $c) {  /* $c is an email address */

        $email = trim($c);

        /* if no row exists in pledge_collaborator table for this email and pledge_id, make one */
        $stmt = $db->prepare("SELECT COUNT(*) FROM pledge_collaborator WHERE collaborator_email = ? AND pledge_id = ?");
        $stmt->execute(array($email, $pledge_id));
        $count = $stmt->fetchColumn();
        if ($count <= 0) {
          $stmt = $db->prepare("INSERT INTO pledge_collaborator (created_at, pledge_id, collaborator_email) VALUES (NOW(), ?, ?)");
          $stmt->execute(array($pledge_id, $email));
        }

      }

    }

    if ($_POST["save_draft"] == "Save as draft") {

      $_SESSION["notice"] = "Draft pledge saved.";
      header("Location: /edit_pledge.php?longid=" . $longid);

    } elseif ($_POST["preview"] == "Preview") {

      header("Location: /preview_pledge.php?longid=" . $longid);

    }

    /*
    echo 'ok';
    var_dump($_POST);
    */

  } else {

    echo 'error';

  }

} else {

  echo 'redirect to preview page';

}
