<?php

function send_mail($recipient, $subject, $body) {
  $sg_key = "ENTER_SENDGRID_API_KEY_HERE";
  $url = "https://api.sendgrid.com/v3/mail/send";
  $curl_command = "curl --request POST --url ". $url . " ";
  $curl_command .= "--header \"Authorization: Bearer " . $sg_key . "\" ";
  $curl_command .= "--header 'Content-Type: application/json' ";
  $curl_command .= "--data '{\"personalizations\": [{\"to\": [{\"email\": \"". $recipient ."\"}]}],\"from\": {\"email\": \"ENTER_SENDER_HERE@ENTER_SENDER_DOMAIN_HERE.COM\", \"name\": \"Wage Pledge\"},\"subject\": \"".$subject."\",\"content\": [{\"type\": \"text/plain\", \"value\": \"".$body."\"}]}'";
  shell_exec($curl_command);
}
