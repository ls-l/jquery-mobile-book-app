<?php 
include('include/db.class.php');
include('include/common_function.php');

$userid = 1;
$bookid = trim($_REQUEST['bookid']);
$chid = trim($_REQUEST['chid']);
$pageno = '';
if(isset($_REQUEST['pageno']) and $_REQUEST['pageno'] != ''){
  $pageno = trim($_REQUEST['pageno']);
} 

if($bookid != '' && $chid != '' && $pageno != ''){
  
  $db = db::__d();	 	  	
  $query = "DELETE FROM tbl_icon
                  WHERE tbl_icon_userid = ".$userid." 
				    AND tbl_icon_bookid = ".$bookid." 
					AND tbl_icon_chid   = ".$chid." 
					AND tbl_icon_pageno = ".$pageno;
  mysql_query($query);
  echo "deleted";
} else {
  echo "not deleted"; 
}
exit;
?>