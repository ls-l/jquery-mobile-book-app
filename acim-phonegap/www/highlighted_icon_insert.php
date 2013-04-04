<?php 
include('include/db.class.php');
include('include/common_function.php');

$db = db::__d();

$userid = 1;
$bookid = trim($_REQUEST['bookid']);
$chid = trim($_REQUEST['chid']);
$chno = trim($_REQUEST['chno']);
$pageno = trim($_REQUEST['pageno']);
$content = $_REQUEST['content'];
$date = date('Y-m-d h:i:s');
 
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
?>