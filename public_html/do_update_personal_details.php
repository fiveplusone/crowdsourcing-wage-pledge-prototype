<?php
session_start();
include "../db.php";
include "../save_note.php";

/*
ini_set('display_errors', 'On');
error_reporting(E_ALL); 
*/
?>

<?php

$stmt = $db->prepare("SELECT id, email FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$old_email = $row["email"];
$new_email = $_POST["email"];

$stmt = $db->prepare("UPDATE user SET firstname = :firstname, lastname = :lastname, institution = :institution, inst_city = :inst_city, inst_country = :inst_country, inst_role = :inst_role, other_institutions_and_roles = :other_institutions_and_roles, email = :email, secondary_email = :secondary_email, tel = :tel WHERE id = :id");
$params = array(':firstname' => $_POST["firstname"],
                ':lastname' => $_POST["lastname"],
                ':institution' => $_POST["institution"],
                ':inst_city' => $_POST["inst_city"],
                ':inst_country' => $_POST["inst_country"],
                ':inst_role' => $_POST["role"],
                ':other_institutions_and_roles' => $_POST["other_institutions_and_roles"],
                ':email' => $new_email,
                ':secondary_email' => $_POST["secondary_email"],
                ':tel' => $_POST["tel"],
                ':id' => $row["id"]);
if ($stmt->execute($params)) {
  if ($new_email != $old_email) {
    include "util/generate_random_string.php";
    $new_code = generate_random_string(10) . date("YmdHis");
    $stmt = $db->prepare("UPDATE user SET email_verification_code = ?, email_verified = NULL, email_verified_at = NULL WHERE id = ?");
    if ($stmt->execute(array($new_code, $row["id"]))) {
      include "send_verification_email.php";
      send_verification_email($new_email, $new_code);
      $_SESSION["notice"] = "Your personal details were successfully updated. A verification email was sent to the new institutional email address that you provided. Please click the link in that email to verify the new email address. If you do not receive the email, please check your spam folder. If you do not receive it within 12 hours, please email info@wagepledge.org. Thank you!";
    } else {
      $_SESSION["error"] = "Your personal details were updated, but an unexpected error occurred and we were not able to send you a verification email at the new institutional email address that you entered. If this error occurs a second time, please feel free to email us at info@wagepledge.org.";
    }
  } else {
    $_SESSION["notice"] = "Your personal details were successfully updated.";
  }
  header("Location: /personal_details.php");
} else {
  $_SESSION["error"] = "An unexpected error occured and we were unable to update your personal details. If you receive this error again, please feel free to email us at info@wagepledge.org.";
  header("Location: /personal_details.php");
}
?>

<?php

/* TODO ON THIS PAGE:

- if the primary email changes, set email_verified to NULL, generate and save a new verification code, send a new verification email, and display an appropriate notice text in the flash message

*/ 

?>
