<?php
session_start();
include "../db.php";

$username = $_POST["username"];
$entered_password = $_POST["password"];

$stmt = $db->prepare("SELECT email, email_verified, password FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($username));
$row = $stmt->fetch();
$hashed_password = $row["password"];
$email = $row["email"];

if (password_verify($entered_password, $hashed_password)) {
  $_SESSION["username"] = $username;
  $_SESSION["email"] = $email;
  if ($row["email_verified"]) {
    $_SESSION["email_verified"] = $row["email_verified"];
  }
  $_SESSION["notice"] = "You logged in.";
  if ((array_key_exists("redir_url", $_POST)) && (strlen($_POST["redir_url"]) > 0)) {
    header("Location: /" . $_POST["redir_url"]);
  } else {
    header("Location: /dashboard.php");
  }
} else {
  $_SESSION["error"] = "Sorry, that email/password combination wasn't recognized.";
  header("Location: /login.php");
}

