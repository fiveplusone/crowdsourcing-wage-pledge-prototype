<?php
include "../../db.php";
?>

<?php

header('Access-Control-Allow-Origin: *');

$stmt = $db->query("SELECT mturk_requester_id FROM pledge WHERE status = 'published' AND project_end_date > NOW() ORDER BY project_start_date");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$req_ids = [];
foreach ($rows as $row) {
  array_push($req_ids, $row['mturk_requester_id']);
}
echo json_encode($req_ids);



?>