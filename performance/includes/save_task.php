<?php

	require "./config.php";

	$task_id = addslashes($_POST['task_id']);
	$name = addslashes($_POST['name']);
	$conditions = addslashes($_POST['conditions']);
	$criteria = addslashes($_POST['criteria']);
	$notes = addslashes($_POST['notes']);
	$importance = addslashes($_POST['importance']);
	$difficulty = addslashes($_POST['difficulty']);
	$mode = addslashes($_POST['mode']);
	$ind_id = addslashes($_POST['ind_id']);
	
	$error = true;
	
	if($mode == 1) {
		if(mysql_query("INSERT INTO tasks (`indicator_id`, `name`, `conditions`, `criteria`, `notes`, `importance`, `difficulty`) 
					VALUES ('".$ind_id."', '".$name."', '".$conditions."', '".$criteria."', '".$notes."', '".$importance."', '".$difficulty."')")) {
			$error = false;
		}
	}
	else {
		if(mysql_query("UPDATE tasks SET `name` = '".$name."', `conditions` = '".$conditions."', `criteria` = '".$criteria."',
					`notes` = '".$notes."', `importance` = '".$importance."', `difficulty` = '".$difficulty."' WHERE id = ".$task_id)) {
			$error = false;
		}
	}
	
	
	if($error) {
		echo "Sorry there was an error saving the task, please try again.";
	}
	else {
		echo "success";
	}
?>
