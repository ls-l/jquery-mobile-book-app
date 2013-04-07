<?php 
include('include/db.class.php');
include('include/common_function.php');

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
exit;*/

$db = db::__d();
$insert_data = array('tbl_feedback_id' => '',
        "tbl_feedback_enter_date" => trim($_REQUEST['date_feed']),
        "tbl_feedback_email" => trim($_REQUEST['email']),
        "tbl_feedback_comments" => trim($_REQUEST['comments'])
		);
$query = $db->insert_query("tbl_feedback",$insert_data);
echo "Feedback Inserted Successfully";
exit;
?>