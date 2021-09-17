<?php
session_start();

/* ini_set('display_errors', 'On');
error_reporting(E_ALL); */

function json_pair($key, $value) {
  $ret = "\"" . $key . "\":\"" . $value . "\"";
  return $ret;
}

/* we assume db.php has already been included */
/* include "../db.php"; */

$stmt = $db->prepare("SELECT id, firstname, lastname, institution, inst_city, inst_country, inst_role, other_institutions_and_roles, email, email_verified, email_verified_at, secondary_email, tel, notes FROM user WHERE username = ? LIMIT 1");
$stmt->execute(array($_SESSION["username"]));
$row = $stmt->fetch();
$date = date('Ymd.His');
$note = "{\"" . $date . "\":{"; 
$note .= json_pair("firstname", $row["firstname"]) . ",";
$note .= json_pair("lastname", $row["lastname"]) . ",";
$note .= json_pair("institution", $row["institution"]) . ",";
$note .= json_pair("inst_city", $row["inst_city"]) . ",";
$note .= json_pair("inst_country", $row["inst_country"]) . "," ;
$note .= json_pair("inst_role", $row["inst_role"]) . ",";
$note .= json_pair("other_institutions_and_roles", $row["other_institutions_and_roles"]) . ",";
$note .= json_pair("email", $row["email"]) . ",";
$note .= json_pair("email_verified", $row["email_verified"]) . ",";
$note .= json_pair("email_verified_at", $row["email_verified_at"]) . ",";
$note .= json_pair("secondary_email", $row["secondary_email"]) . ",";
$note .= json_pair("tel", $row["tel"]);
$note .= "}},";
$old_notes = $row["notes"];
$stmt = $db->prepare("UPDATE user SET notes = ? WHERE id = ?");
$new_notes = $old_notes . $note;
$stmt->execute(array($new_notes, $row["id"]));
?>
