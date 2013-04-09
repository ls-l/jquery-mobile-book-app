<?php 
include('include/db.class.php');
include('include/common_function.php');

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/

if(isset($_REQUEST['data_id']) && $_REQUEST['data_id'] != ''){
   $str = trim($_REQUEST['data_id']); 
   $icon_char = substr($str,0,1);
   
   if($icon_char == 's'){
      $icon_type = 'star';
	  $icon_no = substr($str,1);
   }
   elseif($icon_char == 'h'){
      $icon_type = 'heart';
	  $icon_no = substr($str,1);
   }
   elseif($icon_char == 'y'){
      $icon_type = 'yellow';
	  $icon_no = substr($str,1);
   }
   elseif($icon_char == 'm'){
      $icon_type = 'mark';
	  $icon_no = substr($str,1);
   }
   elseif($icon_char == 'b'){
      $icon_type = 'bulb';
	  $icon_no = substr($str,1);
   } else {
      $icon_type = 'bookmark';
	  $icon_no = $str;
   }
}

$user_id = 1;
$db = db::__d();
$delete = "DELETE FROM tbl_icon 
                WHERE tbl_icon_userid = ".$user_id."
				AND tbl_icon_chid = ".$_REQUEST['chid']." 
			    AND tbl_icon_bookid = ".$_REQUEST['bookid']." 
				AND tbl_icon_no = ".$icon_no."
				AND tbl_icon_type = '".$icon_type."'
				AND tbl_icon_pageno = '".$_REQUEST['pageno']."'";
mysql_query($delete);
echo "deleted";
exit;
?>