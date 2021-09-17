<?php
session_start();
include "../db.php";

$longid = $_POST["longid"];

if ($_POST["go_back_and_edit"] == "← Go back and edit") {

  header("Location: /edit_pledge.php?longid=" . $_POST["longid"]);

} elseif ($_POST["publish"] == "Publish pledge →") {

  if (($_POST["rejection_policy_commit"] == "on") && ($_POST["commit"] == "on") && ($_POST["agree_compliance_process"] == "on")) {

    $stmt = $db->prepare("UPDATE pledge SET updated_at = NOW(), last_updated_ip = :ip, status = 'published', target_wage_understand_checkbox = 1, rejection_policy_checkbox = 1, compliance_process_checkbox = 1, published_at = NOW() WHERE longid = :longid");
    $params = array(':longid' => $longid,
                    ':ip' => $_SERVER['REMOTE_ADDR']);

    if ($stmt->execute($params)) {

      $_SESSION["notice"] = "Pledge successfully published.";
      header("Location: /dashboard.php");

    } else {

      echo 'database error';

    }

  } else {

    $_SESSION["error"] = "It looks like something went wrong. Please make sure you've checked all three checkboxes before publishing. Thanks!";
    header("Location: /preview_pledge.php?longid=" . $longid);

  }

} else {

  echo 'error';

}

