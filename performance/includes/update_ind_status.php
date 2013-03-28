<?php

	require "./config.php";

	$uid = addslashes($_POST['uid']);
	$ind_id = addslashes($_POST['ind_id']);
	$status = addslashes($_POST['status']);
	
	$error = true;
	if(mysql_num_rows(mysql_query("SELECT * FROM staff_ind_progress WHERE uid = '".$uid."' AND ind_id = ".$ind_id)) == 0) {
		if(mysql_query("INSERT INTO staff_ind_progress (uid, ind_id, status) VALUES ('".$uid."', '".$ind_id."', '".$status."')")) {
			$error = false;
		}
	
	}
	else {
		if(mysql_query("UPDATE staff_ind_progress SET status = '".$status."' WHERE uid = '".$uid."' AND ind_id = ".$ind_id)) {
			$error = false;
		}
	}
	
	if($error) {
		echo "Sorry, there was an error. Please try again";
	}
	else {
		echo "success-".$status;
	}
?>
