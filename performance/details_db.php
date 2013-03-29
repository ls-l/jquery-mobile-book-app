<?php

include "./includes/config.php";
if(trim($_REQUEST['username']) != '' AND trim($_REQUEST['first_name']) != '' AND trim($_REQUEST['last_name']) != '' AND trim($_REQUEST['class_val']) != '' AND trim($_REQUEST['room']) != '' AND trim($_REQUEST['responsible']) != '' AND trim($_REQUEST['appraiser']) != '' AND trim($_REQUEST['current_step']) != '' AND trim($_REQUEST['salary_date']) != '' AND trim($_REQUEST['trb']) != '' AND trim($_REQUEST['role']) != ''){
$update = "UPDATE staff set 
                     username = '".$_REQUEST['username']."',
                     fname 	 = '".$_REQUEST['first_name']."',
                     lname = '".$_REQUEST['last_name']."',
                     class = '".$_REQUEST['class_val']."',
                     room = '".$_REQUEST['room']."',
                     responsible = '".$_REQUEST['responsible']."',
                     appraiser = '".$_REQUEST['appraiser']."',
                     current_step = '".$_REQUEST['current_step']."',
                     salary_date = '".$_REQUEST['salary_date']."',
                     trb_num = '".$_REQUEST['trb']."',
                     role = '".$_REQUEST['role']."'
           WHERE id = ".$_REQUEST['user_id'];
  mysql_query($update);             
  echo "success";
} else {
   echo "error";        
}
exit;
?>