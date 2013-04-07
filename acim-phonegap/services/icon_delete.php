<?php 
include('include/db.class.php');
include('include/common_function.php');

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/


$user_id = 1;
$db = db::__d();
$delete = "DELETE FROM tbl_icon 
                WHERE tbl_icon_userid = ".$user_id."
				AND tbl_icon_chid = ".$_REQUEST['chid']." 
			    AND tbl_icon_bookid = ".$_REQUEST['bookid']." 
				AND tbl_icon_no = ".$_REQUEST['icon_id']."
				AND tbl_icon_type = '".$_REQUEST['icon_type']."'";
mysql_query($delete);
echo "deleted";
exit;
?>