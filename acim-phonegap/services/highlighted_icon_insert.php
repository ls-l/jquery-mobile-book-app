<?php 
include('include/db.class.php');
include('include/common_function.php');

$userid = 1;
$bookid = trim($_REQUEST['bookid']);
$chid = trim($_REQUEST['chid']);
$chno = GetChepNo(trim($_REQUEST['chid']),trim($_REQUEST['bookid']));
$pageno = trim($_REQUEST['pageno']);
$content = addslashes($_REQUEST['content']);
$date = date('Y-m-d h:i:s');


$highlighter_id = CheckHighlightPage($userid,$bookid,$chid,$chno,$pageno);
if($highlighter_id == 0){
  $db = db::__d(); 
  $insert_data = array(
        "tbl_highlighted_icon_id" => '',
        "tbl_highlighted_icon_userid" => $userid,
        "tbl_highlighted_icon_chid" => $chid,
        "tbl_highlighted_icon_bookid" => $bookid,
		"tbl_highlighted_icon_chno" => $chno,
        "tbl_highlighted_icon_pageno" => $pageno,
		"tbl_highlighted_icon_content" => $content,
		"tbl_highlighted_icon_date" => $date
		);
   $query = $db->insert_query("tbl_highlighted_icon",$insert_data);
   echo "Heighlighted Line Inserted Successfully";
} else {
   $db = db::__d(); 
   
   $update_data = array(
		"tbl_highlighted_icon_content" => $content
		);
   $where = ' tbl_highlighted_icon_id = '.$highlighter_id.' ';	
   $query = $db->update_query("tbl_highlighted_icon",$update_data,$where);
   echo "Heighlighted Line Updated Successfully";
}

?>