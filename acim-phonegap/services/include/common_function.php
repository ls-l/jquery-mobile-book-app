<?php 
function GetChapterPageNo($bookid,$chid){
   
   $db = db::__d();
   $query = "SELECT tbl_page_no FROM tbl_page WHERE tbl_page_bookid = ".$bookid." AND tbl_page_chid = ".$chid." ORDER BY tbl_page_no ASC limit 1";
   $res = qs($query);
   if(empty($res)){
      return 0;
   }else{
      return $res['tbl_page_no'];
   }
}
function GetChapternoFromPageno($bookid,$pageno){
   $db = db::__d();
   $query = "SELECT tbl_page_chid FROM tbl_page WHERE tbl_page_bookid = ".$bookid." AND tbl_page_no = ".$pageno;
   $res = qs($query);
   if(empty($res)){
      return 0;
   }else{
      return $res['tbl_page_chid'];
   }
}
function CheckiconNo($userid,$bookid,$chid,$pageno,$icontype,$iconno){
  $db = db::__d();
  $query = "SELECT tbl_icon_id FROM tbl_icon WHERE tbl_icon_userid = ".$userid." AND tbl_icon_bookid = ".$bookid." AND tbl_icon_chid = ".$chid." AND tbl_icon_pageno = ".$pageno." AND tbl_icon_type = '".$icontype."' AND tbl_icon_no = ".$iconno;
  $res = qs($query);
  if(empty($res)){
      return 0;
   }else{
      return $res['tbl_icon_id'];
   }
}
function CountIcon($userid,$pageno,$chid,$IconType){
  $query = "SELECT tbl_icon_no FROM tbl_icon WHERE tbl_icon_userid = ".$userid." AND tbl_icon_pageno = ".$pageno." AND tbl_icon_chid = ".$chid." AND tbl_icon_type = '".$IconType."' ORDER BY tbl_icon_no DESC LIMIT 1";
  $res = q($query);
  if(empty($res)){
      return 0;
   }else{
      return $res[0]['tbl_icon_no'];
   }
}
function GetChepNo($chid,$bookid){
  $db = db::__d();
  $query = "SELECT tbl_ch_no FROM tbl_chapter WHERE tbl_ch_id = ".$chid." AND tbl_ch_bookid = ".$bookid;
  $res = qs($query);
  if(empty($res)){
      return 0;
   }else{
      return $res['tbl_ch_no'];
   }
}

function CheckHighlightPage($userid,$bookid,$chid,$chno,$pageno){
   $db = db::__d();
  $query = "SELECT tbl_highlighted_icon_id  
                   FROM tbl_highlighted_icon 
				   WHERE tbl_highlighted_icon_userid = ".$userid." 
				     AND tbl_highlighted_icon_bookid = ".$bookid." 
					 AND tbl_highlighted_icon_chid   = ".$chid."
					 AND tbl_highlighted_icon_chno   = ".$chno."
					 AND tbl_highlighted_icon_pageno = ".$pageno;
  $res = qs($query);
  if(empty($res)){
      return 0;
   }else{
      return $res['tbl_highlighted_icon_id'];
   }
}

?>