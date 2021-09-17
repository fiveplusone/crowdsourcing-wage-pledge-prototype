<?php
session_start();
$redir_url = "dashboard.php";
include "redir.php";
include "../db.php";

$longid = $_POST["longid"];

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

  $stmt = $db->prepare("DELETE FROM pledge WHERE longid = :longid");
  $params = array(':longid' => $longid);
  if ($stmt->execute($params)) {

    $_SESSION["notice"] = "Pledge deleted.";
    header("Location: /dashboard.php");

  } else {

    $_SESSION["error"] = "Something went wrong.";
    header("Location: /login.php");

  }

} else {

  $_SESSION["error"] = "Something went wrong.";
  header("Location: /login.php");

}

