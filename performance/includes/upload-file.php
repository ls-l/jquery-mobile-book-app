<?php
require_once "./config.php";
session_start();
$uploaddir = '../uploads/'; 

$uid = $_GET['uid'];
$task_id = $_GET['task_id'];

$rand = rand(999, 999999);
$file = $uploaddir.$rand.basename($_FILES['uploadfile']['name']); 
$file_temp = "./uploads/".$rand.basename($_FILES['uploadfile']['name']); 
$size = $_FILES['uploadfile']['size'];
if($size > 1048576) {
	echo "error file size > 1 MB";
	unlink($_FILES['uploadfile']['tmp_name']);
	exit;
}
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
	mysql_query("INSERT INTO evidence (url) VALUES ('".$file_temp."')");
	$ev_id = mysql_insert_id();		

	if(mysql_num_rows(mysql_query("SELECT * FROM staff_progress WHERE uid = '".$uid."' AND task_id = ".$task_id)) == 0) {
		mysql_query("INSERT INTO staff_progress (uid, task_id, evidence) VALUES ('".$uid."', '".$task_id."', '".$ev_id."')");
	}
	else {
		mysql_query("UPDATE staff_progress SET evidence = CONCAT(evidence, ',".$ev_id."') WHERE uid = '".$uid."' AND task_id = ".$task_id);  
	}

	echo "success"; 
} 
else {
	echo "error ".$_FILES['uploadfile']['error']." --- ".$_FILES['uploadfile']['tmp_name']." %%% ".$file."($size)";
}
?>