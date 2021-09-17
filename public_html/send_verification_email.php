<?php

  include "../sendgrid.php";
  function send_verification_email($recipient, $code) {
    $email_subj = "Crowdsourcing Wage Pledge - Please verify ownership of your email address";
    $email_body = "Hello,\\n\\nThank you for signing up to the Crowdsourcing Wage Pledge website.\\n\\nHere is a link to verify your email address:\\n\\nhttp://digitallabourlab.ca/verify_email.php?code=" . $code . "\\n\\nThank you!";
    send_mail($recipient, $email_subj, $email_body);
  }

?>
