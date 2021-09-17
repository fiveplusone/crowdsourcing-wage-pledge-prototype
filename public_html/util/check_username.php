<?php
include "../../db.php";
$stmt = $db->prepare("SELECT username FROM user WHERE username=? LIMIT 1");
$stmt->execute(array($_GET["username"]));
$row = $stmt->fetch();
$username = $row["username"];
if (empty($username)) { echo "OK"; } else { echo $username; }

