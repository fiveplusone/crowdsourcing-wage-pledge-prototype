<?php
include "../db.php";
?>

<?php
$stmt = $db->query("SELECT id, published_at, updated_at, mturk_requester_id, mturk_requester_name, project_name, wage_target, rejection_policy, project_start_date, project_end_date, status FROM pledge WHERE status = 'published' AND project_end_date > NOW() ORDER BY project_start_date");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
?>
