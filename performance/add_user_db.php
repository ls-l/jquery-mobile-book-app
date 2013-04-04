<?php

include "./includes/config.php";
if(trim($_REQUEST['user_type']) != '' AND trim($_REQUEST['username']) != '' AND trim($_REQUEST['first_name']) != '' AND trim($_REQUEST['last_name']) != '' AND trim($_REQUEST['class_val']) != '' AND trim($_REQUEST['room']) != '' AND trim($_REQUEST['responsible']) != '' AND trim($_REQUEST['current_step']) != '' AND trim($_REQUEST['salary_date']) != '' AND trim($_REQUEST['trb']) != '' AND trim($_REQUEST['password']) != '' AND trim($_REQUEST['conf_password']) != ''){
   if(trim($_REQUEST['password']) == trim($_REQUEST['conf_password'])){
    
    $sql = "SELECT id FROM staff WHERE username = '".trim($_REQUEST['username'])."'";    
    $res = mysql_query($sql);
    $num = mysql_num_rows($res);
    if($num > 0){
      echo "username";  
    } else {
        $insert = "INSERT INTO staff(id,
		                                  fname,
									      lname,
									      class,
									      room,
									 	  responsible,
									 	  appraiser,
									 	  current_step,
									 	  salary_date,
									      trb_num,
									 	  role,
									 	  username,
									 	  password) 
								VALUES('',
								'".trim($_REQUEST['first_name'])."',
								'".trim($_REQUEST['last_name'])."',
								'".trim($_REQUEST['class_val'])."',
								'".trim($_REQUEST['room'])."',
								'".trim($_REQUEST['responsible'])."',
								'0',
								'".trim($_REQUEST['current_step'])."',
								'".trim($_REQUEST['salary_date'])."',
								'".trim($_REQUEST['trb'])."',
								'".trim($_REQUEST['user_type'])."',
								'".trim($_REQUEST['username'])."',
								'".md5(trim($_REQUEST['password']))."')";
		mysql_query($insert) or die(mysql_error());						
		echo "success";    
    }
      
  } else {
    /*$update = "UPDATE staff set 
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
  mysql_query($update);*/             
    echo "password";
  }
} else {
    if(trim($_REQUEST['user_type']) == ''){
      echo "usertype";  
    } else {
      echo "error";    
    }
}
exit;
?>