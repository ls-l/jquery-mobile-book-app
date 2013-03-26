<?php 
include('include/db.class.php');
include('include/common_function.php');

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/

$db = db::__d();
$insert_data = array('tbl_icon_id' => '',
        "tbl_icon_userid" => 1,
        "tbl_icon_chid" => trim($_REQUEST['chid']),
        "tbl_icon_bookid" => trim($_REQUEST['bookid']),
        "tbl_icon_chno" => trim($_REQUEST['chno']),
		"tbl_icon_pageno" => trim($_REQUEST['pageno']),
        "tbl_icon_type" => 'bookmark',
		"tbl_icon_top_position" => trim($_REQUEST['topposition']),
		"tbl_icon_date" => date('Y-m-d h:i:s')
		);
$query = $db->insert_query("tbl_icon",$insert_data);
echo "Data Insert Successfully";
?>