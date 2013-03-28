<?php

	require "./config.php";

	$uid = addslashes($_POST['uid']);
	$term_1_goal = addslashes($_POST['term_1_goal']);
	$term_1_notes = addslashes($_POST['term_1_notes']);
	$term_1_rank = addslashes($_POST['term_1_rank']);
	$term_2_goal = addslashes($_POST['term_2_goal']);
	$term_2_notes = addslashes($_POST['term_2_notes']);
	$term_2_rank = addslashes($_POST['term_2_rank']);
	$term_3_goal = addslashes($_POST['term_3_goal']);
	$term_3_notes = addslashes($_POST['term_3_notes']);
	$term_3_rank = addslashes($_POST['term_3_rank']);
	$term_4_goal = addslashes($_POST['term_4_goal']);
	$term_4_notes = addslashes($_POST['term_4_notes']);
	$term_4_rank = addslashes($_POST['term_4_rank']);
	$mode = addslashes($_POST['mode']);
	$title = addslashes($_POST['title']);
	$dimension = addslashes($_POST['dimension']);
	
	$error = true;
	
	if($mode == 1) {
		if(mysql_query("INSERT INTO goals (`uid`, `dimension_id`, `goal_title`, `term_1_goal`, `term_1_notes`, `term_1_rank`, `term_2_goal`, `term_2_notes`, `term_2_rank`, 
						`term_3_goal`, `term_3_notes`, `term_3_rank`, `term_4_goal`, `term_4_notes`, `term_4_rank`) 
						VALUES ('".$uid."', '".$dimension."', '".$title."', '".$term_1_goal."', '".$term_1_notes."', '".$term_1_rank."', 
						'".$term_2_goal."', '".$term_2_notes."', '".$term_2_rank."', 
						'".$term_3_goal."', '".$term_3_notes."', '".$term_3_rank."',
						'".$term_4_goal."', '".$term_4_notes."', '".$term_4_rank."')")) {
			$error = false;
		}
	}
	else {
		if(mysql_query("UPDATE goals SET `dimension_id` = '".$dimension."', `goal_title` = '".$title."', `term_1_goal` = '".$term_1_goal."', `term_1_notes` = '".$term_1_notes."', `term_1_rank` = '".$term_1_rank."',
					`term_2_goal` = '".$term_2_goal."', `term_2_notes` = '".$term_2_notes."', `term_2_rank` = '".$term_2_rank."',
					`term_3_goal` = '".$term_3_goal."', `term_3_notes` = '".$term_3_notes."', `term_3_rank` = '".$term_3_rank."',
					`term_4_goal` = '".$term_4_goal."', `term_4_notes` = '".$term_4_notes."', `term_4_rank` = '".$term_4_rank."' WHERE uid = ".$uid)) {
			$error = false;
		}
	}
	
	
	if($error) {
		echo "Sorry there was an error saving the goal, please try again.";
	}
	else {
		echo "success".$aa;
	}
?>
