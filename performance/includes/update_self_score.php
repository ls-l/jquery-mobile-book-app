<?php

	require "./config.php";

	$uid = addslashes($_POST['uid']);
	$task_id = addslashes($_POST['task_id']);
	$score = addslashes($_POST['score']);
	
	$error = true;
	if(mysql_num_rows(mysql_query("SELECT * FROM task_score_commonuser WHERE uid = '".$uid."' AND task_id = ".$task_id)) == 0) {
		if(mysql_query("INSERT INTO task_score_commonuser (uid, task_id, score) VALUES ('".$uid."', '".$task_id."', '".$score."')")) {
			$error = false;
		}
	
	}
	else {
		if(mysql_query("UPDATE task_score_commonuser SET score = '".$score."' WHERE uid = '".$uid."' AND task_id = ".$task_id)) {
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
