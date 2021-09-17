<?php
session_start();
include "../db.php";
$entered_pw = $_POST["current_password"];
$new_pw = $_POST["new_password"];
$con_pw = $_POST["confirm_password"];
?>

<?php

if ((empty($new_pw)) || ($new_pw != $con_pw)) {
  $_SESSION["error"] = "Please make sure you entered a new password and that the passwords in the 'new password' and 'confirm password' boxes match. Thank you!";
  header("Location: /change_password.php");
} else {
  $stmt = $db->prepare("SELECT id, password FROM user WHERE username=? LIMIT 1");
  $stmt->execute(array($_SESSION["username"]));
  $row = $stmt->fetch();
  $hashed_password = $row["password"];
  $id = $row["id"];
  if (password_verify($entered_pw, $hashed_password)) {
    $stmt = $db->prepare("UPDATE user SET password = :password WHERE id = :id");
    $params = array(':password' => password_hash($new_pw, PASSWORD_DEFAULT), ':id' => $id);
    if ($stmt->execute($params)) {
      $_SESSION["notice"] = "Your password was successfully changed.";
      header("Location: /dashboard.php");
    } else {
      $_SESSION["error"] = "We're sorry, an unexpected error occurred and we couldn't change your password. If you encounter this error again, please email us at info@wagepledge.org.";
      header("Location: /change_password.php");
    }
  } else {
    $_SESSION["error"] = "Sorry, the current password you entered does not appear to match the password we have on record for the currently logged in user. If you think you're receiving this message in error, please email us at info@wagepledge.org.";
    header("Location: /change_password.php");
  }

}

?>
