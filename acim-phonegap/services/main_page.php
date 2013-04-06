<?php 
include('include/db.class.php');
include('include/common_function.php');   
    
	$data_last = ''; 
	$data = '';
	
    if(isset($_REQUEST['p_book_title']) and $_REQUEST['p_book_title'] == 1){
	$db = db::__d();
	$query = "SELECT tbl_book_title FROM  tbl_book where tbl_book_id = ".trim($_REQUEST['bookid']);
    $res = qs($query); 
      $data.= $res['tbl_book_title'];
    }
	 $data_last.=$data."#*@@*#"; 
	 $data = '';
	
     $db = db::__d();
	 $query = "SELECT * FROM tbl_chapter where tbl_ch_bookid = ".trim($_REQUEST['bookid']);
	 $result = q($query);
	 $totql_res = count($result);
	 $data_sub = '';
	 	if($totql_res > 0){
			for($i=0;$i<$totql_res;$i++){
							 
				$pageno_start = GetChapterPageNo(trim($_REQUEST['bookid']),$result[$i]['tbl_ch_id']);
				if($pageno_start > 0){
					$p_q_s = "&pageno=".$pageno_start;
				}else{
					$p_q_s = '';
				}
				$data.= '<li><a href="chapter.html?chid='.$result[$i]["tbl_ch_id"].$p_q_s.'" data-ajax="false"><span>Ch.'.$result[$i]['tbl_ch_no'].'-</span><label>'.$result[$i]['tbl_ch_name'].'</label></a><div class="cls"></div></li>';
			}
		} else {
		   $data.= '';
		}
	  
	  $data_last.=$data."#*@@*#"; 
	  $data = '';
	  	
	  echo $data_last;
	
        
?>
