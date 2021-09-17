<?php
session_start();

$_SESSION["error"] = "Please log in or register to create a pledge. Thank you!";
header("Location: /login.php");

?>
