<?php

	require "./config.php";

	$task_id = addslashes($_POST['task_id']);
	
	$error = true;
	if(mysql_query("DELETE FROM tasks WHERE id = ".$task_id)) {
		$error = false;
	}
	
	if($error) {
		echo "Sorry, there was an error. Please try again";
	}
	else {
		echo "success";
	}
?>
