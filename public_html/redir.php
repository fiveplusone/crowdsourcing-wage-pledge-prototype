<?php
if (!(array_key_exists("username", $_SESSION)) || (empty($_SESSION["username"]))) {
  $_SESSION["error"] = "Please log in to access that page.";
  header("Location: /login.php?redir=" . $redir_url);
  die();
}
?>