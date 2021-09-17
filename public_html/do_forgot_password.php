<?php
/* ini_set('display_errors', 'On');
error_reporting(E_ALL);
print_r($_POST); */

  session_start();
  include "../db.php";
  include "../sendgrid.php";
  include "util/generate_random_string.php";
  $entered_uname = $_POST["username"];
  $entered_email = $_POST["email"];
/*
  echo '<br>';
  var_dump($entered_uname);
  echo '<br>';
  if (empty($entered_uname)) { echo 'uname empty'; } else { echo 'uname not empty'; }
  echo '<br>';
  var_dump($entered_email);
  echo '<br>';
  echo empty($entered_email);
*/
?>

<?php

  if ((empty($entered_uname)) && (empty($entered_email))) {

    $_SESSION["error"] = "Please make sure you put something into either the username or the email field.";
    header("Location: /forgot_password.php");

  } else {

    if (empty($entered_uname)) {

      $stmt = $db->prepare("SELECT id FROM user WHERE email=? LIMIT 1");
      $stmt->execute(array($entered_email));
      $row = $stmt->fetch();
      if (empty($row)) { 
        $_SESSION["error"] = "Sorry, we didn't find any account with that email address (" . $entered_email . ") in our system.";
        header("Location: /forgot_password.php");
      } else {
        $new_password = generate_random_string(7) . "_" . generate_random_string(8);
        $stmt = $db->prepare("UPDATE user SET password = :password WHERE id = :id");
        $params = array(':password' => password_hash($new_password, PASSWORD_DEFAULT), ':id' => $row["id"]);
        if ($stmt->execute($params)) {
          $email_subj = "Crowdsourcing Wage Pledge - Your password was reset";
          $email_body = "Hello,\\n\\nSomebody, hopefully you, has reset your password on the website for the Crowdsourcing Wage Pledge.\\n\\nYour new password is:\\n\\n" . $new_password . "\\n\\nYou can log in at:\\n\\nhttp://wagepledge.org/login.php\\n\\nIf you encounter any problems, please feel free to email us at info@wagepledge.org.\\n\\nThank you!";
          send_mail($entered_email, $email_subj, $email_body);
          $_SESSION["notice"] = "Your password was reset. An email with the new password was sent to the institutional email address you used to create the account. If you don't get an email within 12 hours, please email us at info@wagepledge.org.";
          header("Location: /login.php");
        } else {
          $_SESSION["error"] = "We're sorry, an unexpected error occurred and we couldn't reset your password. If you encounter this error again, please email us at info@wagepledge.org.";
          header("Location: /forgot_password.php");
        }
      }

    } else {

      $stmt = $db->prepare("SELECT id, email FROM user WHERE username=? LIMIT 1");
      $stmt->execute(array($entered_uname));
      $row = $stmt->fetch();
      $email = $row["email"];

      if (empty($row)) {

        $_SESSION["error"] = "Sorry, we didn't find any account with that username (" . $entered_uname . ") in our system.";
        header("Location: /forgot_password.php");

      } else {

        $new_password = generate_random_string(7) . "_" . generate_random_string(8);
        $stmt = $db->prepare("UPDATE user SET password = :password WHERE id = :id");
        $params = array(':password' => password_hash($new_password, PASSWORD_DEFAULT), ':id' => $row["id"]);
        if ($stmt->execute($params)) {
          $email_subj = "Crowdsourcing Wage Pledge - Your password was reset";
          $email_body = "Hello,\\n\\nSomebody, hopefully you, has reset your password on the website for the Crowdsourcing Wage Pledge.\\n\\nYour new password is:\\n\\n" . $new_password . "\\n\\nYou can log in at:\\n\\nhttp://wagepledge.org/login.php\\n\\nIf you encounter any problems, please feel free to email us at info@wagepledge.org.\\n\\nThank you!";
          send_mail($email, $email_subj, $email_body);
          $_SESSION["notice"] = "Your password was reset. An email with the new password was sent to the institutional email address you used to create the account. If you don't get an email within 12 hours, please email us at info@wagepledge.org.";
          header("Location: /login.php");
        } else {
          $_SESSION["error"] = "We're sorry, an unexpected error occurred and we couldn't reset your password. If you encounter this error again, please email us at info@wagepledge.org.";
          header("Location: /forgot_password.php");
        }

      }

    }

  }

?>
