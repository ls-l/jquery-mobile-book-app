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
?>