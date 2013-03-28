<?php

  require "./config.php";

  $username = addslashes($_POST['username']);
  $password = addslashes($_POST['password']);
  
  $res = mysql_query("SELECT * FROM staff WHERE username = '".$username."' AND password = '".md5($password)."' LIMIT 1");
  $num_rows = mysql_num_rows($res);
  if($num_rows > 0) {
    if($row = mysql_fetch_array($res)) {
		$uid = $row['id'];
		if($row['role'] == "user") {
			$_SESSION['uid'] = $uid;
			$message = "success";               
		} 
		elseif($row['role'] == "admin") {
			$_SESSION['auid'] = $uid;
			$message = "asuccess";
		} 
		elseif($row['role'] == "appraiser") {
			$_SESSION['muid'] = $uid;
			$message = "msuccess";
		}
    }
    else {
      $message = "Sorry, your username and passowrd are incorrect.";
    }
  }
  else {
    $message = "Sorry, your username and passowrd are incorrect.";
  }
  echo $message;
?>
