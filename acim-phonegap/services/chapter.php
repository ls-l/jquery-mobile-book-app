<?php 
include('include/db.class.php');
include('include/common_function.php');   
  
if (!isset($_REQUEST['pageno'])) {
     $pageno = 1;
} else {
     $pageno = $_REQUEST['pageno'];
}
$chid = trim($_REQUEST['chid']);
$userid = 1;


$data = '';
$data_last = '';

    $counticon = CountIcon($userid, $pageno, $chid, 'bookmark');
	for ($i = 10; $i > $counticon; $i--) {
        $data.= '<a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="'.$i.'" data-db="0"></a>';
     }
	 $data_last.=$data."#*@@*#"; 
	 $data = '';


     $counticon_star = CountIcon($userid, $pageno, $chid, 'star');
	 for ($i = 10; $i > $counticon_star; $i--) {
                                     
     $data.= '<div style="position:relative;float:left;">
                 <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="s'.$i.'" data-db="0"></a>
              </div>';
	}
	$data_last.=$data."#*@@*#";	
	$data = '';
	
	$counticon_heart = CountIcon($userid, $pageno, $chid, 'heart');
    for ($i = 10; $i > $counticon_heart; $i--) {
                          
    $data.= '<div style="position:relative;float:left;">
               <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="h'.$i.'" data-db="0"></a>
                                        </div>';
     }
	 $data_last.=$data."#*@@*#";	
	 $data = '';
	 
	
    $counticon_yellow = CountIcon($userid, $pageno, $chid, 'yellow');
    for ($i = 10; $i > $counticon_yellow; $i--) {
      $data.= '<div style="position:relative;float:left;">
                  <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="y'.$i.'" data-db="0"></a>
                                        </div>';
     }
	 $data_last.=$data."#*@@*#";	
	 $data = '';
	 
	 $counticon_mark = CountIcon($userid, $pageno, $chid, 'mark');
      for ($i = 10; $i > $counticon_mark; $i--) {
            $data.= '<div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="m'.$i.'" data-db="0"></a>
                                        </div>';
      } 
	  $data_last.=$data."#*@@*#";	
	  $data = '';

     $counticon_bulb = CountIcon($userid, $pageno, $chid, 'bulb');
          for ($i = 10; $i > $counticon_bulb; $i--) {
            $data.= '<div style="position:relative;float:left;">
                       <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="b'.$i.'" data-db="0"></a>
                    </div>';
         } 
	  $data_last.=$data."#*@@*#";	
	  $data = '';							
      
	  $db = db::__d();
      $query = "SELECT * FROM tbl_chapter where tbl_ch_id = " . trim($_REQUEST['chid']);
      $res = qs($query);

      if ($pageno == 1) {
         $prepage = $pageno;
      } else {
         $prepage = $pageno - 1;
      }
         $nxtpage = $pageno + 1;
         $chid = $res['tbl_ch_id'];
         $chno = $res['tbl_ch_no'];
         $bookid = $res['tbl_ch_bookid'];
	  
	  $data = 'Chapter '.$res['tbl_ch_no'];
	  
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	  $data = $res['tbl_ch_name'];
	  
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	  $db = db::__d();
      $where = " tbl_page_chid = " . $chid . " AND tbl_page_bookid = " . $bookid . " AND tbl_page_no = " . $pageno;
      $query_count = "SELECT tbl_page_id FROM tbl_page where " . $where;
      $res_count = q($query_count);
      
	  $data = '';                     
	  if (count($res_count) > 0) { 
        $data.='<div class="bookmark-page get-icon">
                                        <ul id="bookmark_icon" class="droppable">';
                                            
           $total_all_icon = 0;
           $total_all_icon = ($counticon + $counticon_star + $counticon_heart + $counticon_yellow + $counticon_mark + $counticon_bulb); 
           if ($total_all_icon > 0) {
                    $query = "SELECT tbl_icon_top_position,tbl_icon_no,tbl_icon_type 
                                                                              FROM tbl_icon 
                                                                              WHERE tbl_icon_userid = " . $userid . " 
                                                                                    AND tbl_icon_pageno = " . $pageno . " 
                                                                                    AND tbl_icon_chid = " . $chid . " 
                                                                                    AND (
                                                                                         tbl_icon_type = 'bookmark' or 
                                                                                         tbl_icon_type = 'heart' or 
                                                                                         tbl_icon_type = 'star' or
                                                                                         tbl_icon_type = 'yellow' or
                                                                                         tbl_icon_type = 'mark' or
                                                                                         tbl_icon_type = 'bulb'
                                                                                         ) 
                                                                                    ORDER BY tbl_icon_top_position DESC ";
                                                $res = q($query);
                                                for ($i = 0; $i < count($res); $i++) {
                                                    if ($res[$i]['tbl_icon_type'] == 'bookmark') {
                                                        
                                                        $data.='<li  class="book-mark-icon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;" data-id="'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                    } elseif ($res[$i]['tbl_icon_type'] == 'heart') { 
                                                        $data.='<li  class="heart-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;height:37px;width:37px;" data-id="h'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                     } elseif ($res[$i]['tbl_icon_type'] == 'star') { 
                                                        $data.='<li  class="star-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;height:37px;width:37px;" data-id="s'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                    } elseif ($res[$i]['tbl_icon_type'] == 'yellow') { 
                                                        $data.='<li  class="yellow-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;height:37px;width:37px;" data-id="y'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                    } elseif ($res[$i]['tbl_icon_type'] == 'mark') { 
                                                        $data.='<li  class="mark-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;height:37px;width:37px;" data-id="m'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                    } elseif ($res[$i]['tbl_icon_type'] == 'bulb') { 
                                                        $data.='<li  class="bulb-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:'.$res[$i]['tbl_icon_top_position'].'px;height:37px;width:37px;" data-id="b'.$res[$i]['tbl_icon_no'].'" data-db="1"></a></li>';
                                                        
                                                    }
                                                }
                                            } else {
                                              $data.='<li  class="droppable book-mark-icon" style="position:relative;">&nbsp;</li>';
                                               
                                            }
                                           
                                            $data.='</ul>
                                    </div>';
    
      }  
	  
	  $data.='<div class="cont-text unselectable" id="content_area" >';
                                    
       $db = db::__d();
       if (count($res_count) > 0) {
         $query = "SELECT tbl_page_content FROM tbl_page where " . $where;
         $res = qs($query);
         $query_1 = "SELECT tbl_highlighted_icon_content FROM tbl_highlighted_icon WHERE tbl_highlighted_icon_userid = " . $userid . " AND tbl_highlighted_icon_chid = " . $chid . " AND tbl_highlighted_icon_pageno = " . $pageno . " ORDER BY tbl_highlighted_icon_id ASC";
         $res_1 = q($query_1);
         $content_display = $res['tbl_page_content'];
         if (count($res_1) > 0) {
          for ($i = 0; $i < count($res_1); $i++) {
            if ($res_1[$i]['tbl_highlighted_icon_content'] != '' and $res_1[$i]['tbl_highlighted_icon_content'] != ' ') {
               $replace_text = $res_1[$i]['tbl_highlighted_icon_content'];
               $content_display = str_replace($replace_text, '<span class="background-yello">' . $replace_text . '</span>', $content_display);
         }
                                            }
                                        }
              $data.=$content_display;
              } else {
         $data.="No Record Found.";
                                         } 
         $data.='<div class="cls"></div>
     </div><div style="clear:both;"></div>';
	  
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	   
      $db = db::__d();
      $query = "SELECT tbl_page_no,tbl_page_chid FROM tbl_page where tbl_page_bookid = " . $bookid . " ORDER BY tbl_page_no ASC";
      $res = q($query);
      $total_page = count($res);
      if ($total_page > 0) { 
	  } 
	  
	  if ($pageno != 1) { 
	     $url = '';
		 $url = 'chapter.html?chid='.GetChapternoFromPageno($bookid, $prepage).'&pageno='.$prepage;
		 $url = "'".$url."'";
         $data.='<a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('.$url.');">
                                        <img src="images/left-arrow.png" />
                </a>';
     } else { 
         $data.='<a href="javascript:void(0);" data-ajax="false"><img src="images/left-arrow.png" /></a>';
      } 
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	  
                                $start_page = $pageno - 1;
                                $end_page = $pageno + 2;
                                if ($end_page > $total_page) {
                                    $end_page = $total_page;
                                }

                                $start_page = $end_page - 3;
                                if ($start_page < 1) {
                                    $start_page = 1;
                                }
                                $end_page = $start_page + 3;
                                if ($end_page > $total_page) {
                                    $end_page = $total_page;
                                }

                                if ($nxtpage > $total_page) {
                                    $nxtpage = $total_page;
                                }

                                
                                $start_loop = ($start_page - 1); 
                                for ($i = $start_loop; $i < $end_page; $i++) {
                                    if ($pageno == $res[$i]['tbl_page_no']) {
                                       $data.=$pageno;
                                    } else {
                                  $url='';         
                                  $url='chapter.html?chid='.$res[$i]['tbl_page_chid'].'&pageno='.$res[$i]['tbl_page_no'];
								  $url = "'".$url."'";
								  $data.='<a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('.$url.');">'.$res[$i]['tbl_page_no'].'</a>';
                                    }
                                }
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	  if ($pageno >= $total_page) { 
           $data.='<a href="javascript:void(0);" data-ajax="false"><img src="images/right-arrow.png" /></a>';
         } else {  
           $url = '';
		   $url = 'chapter.html?chid='.GetChapternoFromPageno($bookid, $nxtpage).'&pageno='.$nxtpage;
		   $url = "'".$url."'";
		   $data.='<a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('.$url.');"><img src="images/right-arrow.png" /></a>';
      } 
	  
	  $data_last.=$data."#*@@*#";	
	  $data = '';
	  
	  $data_last.=$pageno."**".$chid."**".$chno."**".$bookid."**".$userid."#*@@*#";
	  
	  echo $data_last;
?>
