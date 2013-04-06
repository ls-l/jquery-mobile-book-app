<?php 
include('include/db.class.php');
include('include/common_function.php');

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/

$db = db::__d();

$userid = 1;
$bookid           = trim($_REQUEST['bookid']);
$chid             = trim($_REQUEST['chid']);
$pageno           = trim($_REQUEST['pageno']);
$icontype         = trim($_REQUEST['icon_type']);
$iconno           = trim($_REQUEST['iconno']);
$win_h            = trim($_REQUEST['win_h']);
$win_w            = trim($_REQUEST['win_w']);
$win_inner_h      = trim($_REQUEST['win_inner_h']);
$inserted_icon_no = CheckiconNo($userid,$bookid,$chid,$pageno,$icontype,$iconno);
if($inserted_icon_no == 0){
$insert_data = array('tbl_icon_id' => '',
        "tbl_icon_userid" => 1,
        "tbl_icon_chid" => trim($_REQUEST['chid']),
        "tbl_icon_bookid" => trim($_REQUEST['bookid']),
        "tbl_icon_chno" => trim($_REQUEST['chno']),
		"tbl_icon_pageno" => trim($_REQUEST['pageno']),
        "tbl_icon_type" => $icontype,
		"tbl_icon_no" => trim($_REQUEST['iconno']),
		"tbl_icon_top_position" => trim($_REQUEST['topposition']),
		"tbl_icon_screen_width" => $win_w,
		"tbl_icon_screen_height" => $win_h,
		"tbl_icon_content_height" => $win_inner_h,
		"tbl_icon_date" => date('Y-m-d h:i:s')
		);
$query = $db->insert_query("tbl_icon",$insert_data);
echo "Icon Position Inserted Successfully";
} else {
  if($inserted_icon_no > 0 and $inserted_icon_no != ''){
     $update_data = array(
		"tbl_icon_top_position" => trim($_REQUEST['topposition']),
		"tbl_icon_screen_width" => $win_w,
		"tbl_icon_screen_height" => $win_h,
		"tbl_icon_content_height" => $win_inner_h
		);
     $where = ' tbl_icon_id = '.$inserted_icon_no.' ';	
	 $query = $db->update_query("tbl_icon",$update_data,$where);
	 echo "Icon Position Updated Successfully";	
  }
}
exit;
?>