<?php
session_start();
include "../db.php";

/*
var_dump($_SESSION);
echo '<br/><br/>'; 
var_dump($_POST);
*/

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$stmt = $db->prepare("SELECT id FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$user_id = $row["id"];

if (($_POST["save_draft"] == "Update draft") || ($_POST["preview"] == "Update and preview")) {

  $wage_target_f = (float) $_POST["wage_target"];
  $wage_floor = 0.75 * $wage_target_f;
  $t = time();
  $time_str = (string) $t;
  $longid = $_POST["longid"];
  if ($_POST["commit"] == "on") { $commit = 1; } else { $commit = 0; }
  if ($_POST["rejection_policy_commit"] == "on") { $rejection_commit = 1; } else { $rejection_commit = 0; }
  if ($_POST["agree_compliance_process"] == "on") { $compliance_commit = 1; } else { $compliance_commit = 0; }
  $stmt = $db->prepare("UPDATE pledge SET created_at = NOW(), last_updated_ip = :ip, project_name = :project_name, mturk_requester_name = :mturk_requester_name, mturk_requester_id = :mturk_requester_id, project_start_date = :project_start_date, project_end_date = :project_end_date, wage_target = :wage_target, wage_floor = :wage_floor, rejection_policy = :rejection_policy, target_wage_understand_checkbox = :target_wage_understand_checkbox, rejection_policy_checkbox = :rejection_policy_checkbox, compliance_process_checkbox = :compliance_process_checkbox WHERE longid = :longid");
  $params = array(':longid' => $longid,
                  ':ip' => $_SERVER['REMOTE_ADDR'],
                  ':project_name' => $_POST["project_name"],
                  ':mturk_requester_name' => $_POST["project_mturk_requester_name"],
                  ':mturk_requester_id' => $_POST["project_mturk_requester_id"],
                  ':project_start_date' => $_POST["project_start_date"],
                  ':project_end_date' => $_POST["project_end_date"],
                  ':wage_target' => $_POST["wage_target"],
                  ':rejection_policy' => $_POST["rejection_policy"],
                  ':wage_floor' => $wage_floor,
                  ':target_wage_understand_checkbox' => $commit,
                  ':rejection_policy_checkbox' => $rejection_commit,
                  ':compliance_process_checkbox' => $compliance_commit);

  if ($stmt->execute($params)) { 

    if ((array_key_exists("collaborators", $_POST))) {

      $stmt = $db->prepare("SELECT id FROM pledge WHERE longid = ? LIMIT 1");
      $stmt->execute(array($longid));
      $pledge_row = $stmt->fetch();
      $pledge_id = $pledge_row["id"];

      if (strlen($_POST["collaborators"]) == 0) {

        $stmt = $db->prepare("DELETE FROM pledge_collaborator WHERE pledge_id = ?");
        $stmt->execute(array($pledge_id));

      } else {

        $collaborators_ary = explode(",", $_POST["collaborators"]);
        $collaborators = array_map('trim', $collaborators_ary);

        /* get rows from pledge_collaborator table with this pledge ID, delete all whose email not
           in $collaborators */
        $stmt = $db->prepare("SELECT collaborator_email FROM pledge_collaborator WHERE pledge_id = ?");
        $stmt->execute(array($pledge_id));
        $rows = $stmt->fetchAll();
        function array_first($ary) { return $ary[0]; }
        $previously_saved_collaborators_ary = array_map('array_first', $rows);
        foreach ($previously_saved_collaborators_ary as $psc) {
          if (!(in_array($psc, $collaborators))) {
            $stmt = $db->prepare("DELETE FROM pledge_collaborator WHERE pledge_id = ? AND collaborator_email = ?");
            $stmt->execute(array($pledge_id, $psc));
          }
        }

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

    }

    if ($_POST["save_draft"] == "Update draft") {

      $_SESSION["notice"] = "Draft pledge successfully updated.";
      header("Location: /edit_pledge.php?longid=" . $longid);

    } elseif ($_POST["preview"] == "Update and preview") {

      header("Location: /preview_pledge.php?longid=" . $longid);

    }


  } else {

    echo 'error';

  }

} else {

  echo 'error';

}

