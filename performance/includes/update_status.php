<?php

	require "./config.php";

	$uid = addslashes($_POST['uid']);
	$task_id = addslashes($_POST['task_id']);
	$status = addslashes($_POST['status']);
	
	$error = true;
	if(mysql_num_rows(mysql_query("SELECT * FROM staff_progress WHERE uid = '".$uid."' AND task_id = ".$task_id)) == 0) {
		if(mysql_query("INSERT INTO staff_progress (uid, task_id, evidence, status) VALUES ('".$uid."', '".$task_id."', '".mysql_insert_id()."', '".$status."')")) {
			$error = false;
		}
	
	}
	else {
		if(mysql_query("UPDATE staff_progress SET status = '".$status."' WHERE uid = '".$uid."' AND task_id = ".$task_id)) {
			$error = false;
		}
	}
	
	if($error) {
		echo "Sorry, there was an error. Please try again";
	}
	else {
		echo "success";
	}
?>
