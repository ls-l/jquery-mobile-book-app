<?php 
include('include/db.class.php');
include('include/common_function.php');

$userid = 1;
$bookid = trim($_REQUEST['bookid']);
$chid = trim($_REQUEST['chid']);
$chno = GetChepNo(trim($_REQUEST['chid']),trim($_REQUEST['bookid']));
$nxtpre = trim($_REQUEST['nxtpre']);
if(isset($_REQUEST['pageno']) and $_REQUEST['pageno'] != ''){
  $pageno = trim($_REQUEST['pageno']);
} else {
  //$pageno = 0;
  $pageno = 1;
}

//echo $bookid."***".$chid."***".$chno."***".$pageno."***".$nxtpre;
//exit;
/*$link = GetNextPreChPage($bookid,$chid,$chno,$pageno,$nxtpre);

 if($link == 'first'){
    echo 'first';
 } elseif($link == 'last'){
    echo 'last';
 } elseif($link == 'next'){
    echo 'next';
 } elseif($link == 'pre'){
   echo 'pre';
 } else {
   $link_array = explode("*##*",$link); 
   $pageno = $link_array[0];
   $chid = $link_array[1];
   $chno = $link_array[2];
   $link_send = "chapter.html?chid=".$chid."&bookid=".$bookid."&pageno=".$pageno;
 }*/
 
$last_ch = GetLastChNo($bookid); 

if($nxtpre == 1){
  $max_page_no = GetChapterMaxPageno($bookid,$chid);   
  if($last_ch == $chno && $max_page_no == $pageno){
     echo "last";
  } else {
     
     if($chid > 0){
	   $pageno = $pageno + 1;
	   $checkpage = CheckPageAvailable($bookid,$chid,$pageno);
	   if($checkpage > 0){
	      
	   } else {
	      $chno = $chno + 1;   
	      $pageno = 1;
	   }
	   $chid = GetChepId($chno,$bookid);
	   echo $link_send = "chapter.html?chid=".$chid."&bookid=".$bookid."&pageno=".$pageno;
     }
  }
} else {
   if($chno == 1 && $pageno == 1){
     echo "first";
  } else {
	 if($pageno == 1){
	    $chno = $chno - 1;
		$pageno = 1;  
	 } else {
	   $pageno = $pageno - 1;
	 }
	 $chid = GetChepId($chno,$bookid);
	 
	 
	 if($chid > 0){
	   echo $link_send = "chapter.html?chid=".$chid."&bookid=".$bookid."&pageno=".$pageno;
     }
  }
}
exit;
?>