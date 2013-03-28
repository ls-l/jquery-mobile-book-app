<?php 
include('include/db.class.php');
include('include/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initil-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="css/query.css"/>
   <link rel="stylesheet" type="text/css" href="css/custom.css"/>
   <!--<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css">
    <script src="javascript/js/jquery-1.8.2.min.js"></script>
    <script src="javascript/js/jquery.mobile-1.2.0.min.js"></script>-->
	
	
	<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->
	
	<!--Apply Image Dragable Script-->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
 	
    <!--<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>-->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		
    <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>-->
	
	<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<!--Apply Image Dragable Script-->
	
    
	<script src="javascript/js/jquery.ui.touch-punch.js"></script>


    <style id="jsbin-css">
    </style>
	<style type="text/css">
	   .unselectable {
			-webkit-user-select: none; /* Safari, Chrome */
			-khtml-user-select: none; /* Konqueror */
			-moz-user-select: none; /* Firefox */
			-webkit-touch-callout: none;
			-ms-user-select: none;
			-o-user-select: none;
			user-select: none; /* CSS3 */
		}
	</style>
<title>example-of-chapter</title>
</head>

<body>
<div data-role="page">
   <div data-role="content">
	 <div class="inner_bg">
    	<div class="example-chep">
          <div class="top-menu">
          	<ul>
            	<li class="setting-icon"><a href="#"></a></li>
                <li class="heart-icon"><a href="#"></a></li>
                <li class="time-icon"><a href="#"></a></li>
                <li class="pen-icon"><a href="javascript:void(0);" onClick="return select_highlight();"></a></li>
                <li class="pin-icon"><a href="#"></a></li>
                <li class="search-icon"><a href="#"></a></li>
                <li class="tag-icon" style="position:relative;">
				<?php 
				if(!isset($_REQUEST['pageno'])){
				  $pageno = 1; 
				} else {
				  $pageno = $_REQUEST['pageno']; 
				}
				$chid = trim($_REQUEST['chid']);
				$userid = 1;
				$counticon = CountIcon($userid,$pageno,$chid,'bookmark');
				for($i=10;$i>$counticon;$i--) { ?>
				   <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="<?php echo $i; ?>"></a>
				<?php } ?>
				
				</li>
				<!--<img src="http://localhost/acim/images/exp-tag.png" class="draggable ui-draggable" alt="Book Mark"/>-->
                <div class="cls"></div>
            </ul>
          
          </div>
          <div class="midd-cont" style="height:77%">
		  <?php 					   
			    $db = db::__d();
			    $query = "SELECT * FROM tbl_chapter where tbl_ch_id = ".trim($_REQUEST['chid']);
				$res = qs($query);
		        
				if($pageno == 1){
				  $prepage = $pageno;
				} else {
				  $prepage = $pageno-1;
				}
				$nxtpage = $pageno+1;
				
				$chid = $res['tbl_ch_id'];
				$chno = $res['tbl_ch_no'];
				$bookid = $res['tbl_ch_bookid']
		  ?>
          	<h4>Chapter <?php echo $res['tbl_ch_no']; ?></h4>
            <p><?php echo $res['tbl_ch_name']; ?></p>
			<?php 
			      $db = db::__d();
				  $where = " tbl_page_chid = ".$chid." AND tbl_page_bookid = ".$bookid." AND tbl_page_no = ".$pageno;
		          $query_count = "SELECT tbl_page_id FROM tbl_page where ".$where;  			  
			      $res_count = q($query_count);
			?>
            	<div class="chapter-detail" style="">
                    <?php if(count($res_count) > 0){ ?>
					<div class="bookmark-page get-icon">
                        <ul>
                            <li id="bookmark_icon" class="droppable book-mark-icon" style="position:relative;">&nbsp;
							    <?php 
			                     if($counticon > 0){
								 $query = "SELECT tbl_icon_top_position,tbl_icon_no FROM tbl_icon WHERE tbl_icon_userid = ".$userid." AND tbl_icon_pageno = ".$pageno." AND tbl_icon_chid = ".$chid." AND tbl_icon_type = 'bookmark' ORDER BY tbl_icon_top_position DESC ";
									 $res = q($query);
									 for($i=0;$i<count($res);$i++){ 
									?>
									<a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px" data-id="<?php echo $res[$i]['tbl_icon_no']; ?>"></a>
									<?php
									  }
								 }
								?>
							</li>
						</ul>
                     </div>
					<?php } ?> 
                    <!--style="min-height:70%;"-->
					<div class="cont-text unselectable" <?php if(count($res_count) > 0){ ?>  <?php } ?> id="content_area" >
					  <?php  
						  $db = db::__d();
						  if(count($res_count) > 0){
						     $query = "SELECT tbl_page_content FROM tbl_page where ".$where;
						     $res = qs($query);
					   ?>
					   <?php 
					   $query_1 = "SELECT tbl_highlighted_icon_content FROM tbl_highlighted_icon WHERE tbl_highlighted_icon_userid = ".$userid." AND tbl_highlighted_icon_chid = ".$chid." AND tbl_highlighted_icon_pageno = ".$pageno." ORDER BY tbl_highlighted_icon_id ASC";
                       $res_1 = q($query_1);
					   $content_display = $res['tbl_page_content'];
					   if(count($res_1) > 0){
					      for($i=0;$i<count($res_1);$i++){
							 if($res_1[$i]['tbl_highlighted_icon_content'] != '' and $res_1[$i]['tbl_highlighted_icon_content'] != ' '){
							   $replace_text = $res_1[$i]['tbl_highlighted_icon_content'];
							   $content_display = str_replace($replace_text,'<span class="background-yello">'.$replace_text.'</span>',$content_display);
							 }
						  }
					   }
					   echo $content_display;  ?>
					   <?php
						  } else { 
						     echo "No Record Found.";
					  ?>
					 <?php } ?>  
					<div class="cls"></div>
                </div>
				 <div style="clear:both;"></div>
          </div>
		        <div style="clear:both;"></div>
		  <?php //if(count($res_count) > 0){ 
		        $db = db::__d();
				$query = "SELECT tbl_page_no,tbl_page_chid FROM tbl_page where tbl_page_bookid = ".$bookid." ORDER BY tbl_page_no ASC";
				$res = q($query);
				$total_page = count($res);
				if($total_page > 0){
		  ?>
           
		  <?php } ?> 
          
    	</div>
		  <div class="footer-cont">
          	<span class="left-arrow">
			<?php  if($pageno != 1){ ?>
			<a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo GetChapternoFromPageno($bookid,$prepage); ?>&pageno=<?php echo $prepage; ?>');">
			   <img src="images/left-arrow.png" />
			</a>
			<?php } else { ?>
			   <a href="javascript:void(0);" data-ajax="false"><img src="images/left-arrow.png" /></a>
			<?php } ?>
			</span>
           	<div class="pagination">
			   <?php 
			      $start_page = $pageno - 1; 
				  $end_page = $pageno + 2;
				  if($end_page > $total_page){
				     $end_page = $total_page;
				  }
				  
				  $start_page = $end_page - 3;
				  if($start_page < 1){
				     $start_page = 1;
				  }
				  $end_page = $start_page + 3;
				  if($end_page > $total_page){
				     $end_page = $total_page;
				  }
				   
				  if($nxtpage > $total_page){
				     $nxtpage = $total_page;
				  }
				  
			      //for($i=0;$i<$total_page;$i++){ 
				  for($i=($start_page-1);$i<$end_page;$i++){ 				     
					   if($pageno == $res[$i]['tbl_page_no']){
						  echo $pageno;
					   } else {  
				   ?>   
						 <a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo $res[$i]['tbl_page_chid']; ?>&pageno=<?php echo $res[$i]['tbl_page_no']; ?>');"><?php echo $res[$i]['tbl_page_no']; ?></a>			  
				   <?php 
					   } 
			      }
			    ?>
			</div>
            <span class="right-arrow">
			<?php  if($pageno >= $total_page){ ?>
			   <a href="javascript:void(0);" data-ajax="false"><img src="images/right-arrow.png" /></a>
			<?php } else { ?> 
			  <a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo GetChapternoFromPageno($bookid,$nxtpage); ?>&pageno=<?php echo $nxtpage; ?>');"><img src="images/right-arrow.png" /></a>
			<?php } ?>
			</span>
            <div class="cls"></div>
          </div>
    </div>
   </div>
</div>
</div>
 <script type="text/javascript" language="javascript">
		  $(document).ready(function() {
			 var h_main=$(window).height();
			 var h=$(".inner_bg").height();
			 var w=$(".inner_bg").width();
			 var h_bookmark=$(".get-icon").height();
			 
			 var dragablediv = h-(h/2.5);
			  
			 $("#bookmark_icon").css("height", dragablediv);
			 
			 $(function() {
			 
			 var dragOptions = {
					revert: "invalid",
					scope: "items",
					helper: "clone"
			 }
			 //$(".drag").draggable();
			 $('.drag').draggable({
				revert: "invalid",
				scope: "items"
			});
			$('.droppable').droppable({
				scope: "items",
				drop: function(event, ui) {
				var el = ui.helper.context;
				var iconno = $(el).data("id");
				var pos = ui.draggable.position();
				//alert('top: ' + pos.top+ ', left: ' + pos.left);
				//alert(h+"---"+pos.top+"-----"+h_bookmark);
				
				var pos = ui.draggable.offset(), dPos = $(this).offset();
				/*alert("data-id: " + ui.draggable.data("data-id") + 
						", Top: " + (pos.top - dPos.top) + 
						", Left: " + (pos.left - dPos.left));*/
				//var topposition = (pos.top/h)*100;   
				//var topposition = ((pos.top - dPos.top)/h)*100;
				var topposition = (pos.top - dPos.top);
				  
				var url = "icon_insert.php?pageno=<?php echo $pageno;?>&chid=<?php echo $chid;?>&chno=<?php echo $chno;?>&bookid=<?php echo $bookid;?>&topposition="+topposition+"&iconno="+iconno;
				  var data = '';
				  $.ajax({
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function() {
                        if(rsp.success) {
                            alert(rsp);
                        }
                    }
                 });
				 
				   
			    }
				// if you want to disable the dragging after drop un-comment this
		        /*
				drop: function(e, ui) {
					$(ui.draggable).draggable({"disabled":true});
				}
				*/
			  });
		    });
		  		 
		  });
		   function redirect_page(str){
		     location.href = str;
		   }
		   
		  function select_highlight(){
			   $("#content_area").removeClass("unselectable");   
			   $('#content_area').mousedown(function() {
				   $('#content_area').mouseup(function() {   
					   if(window.getSelection) {  
					     var SelText = window.getSelection();
						 if(SelText != ''){
							 var url = "highlighted_icon_insert.php?pageno=<?php echo $pageno;?>&chid=<?php echo $chid;?>&chno=<?php echo $chno;?>&bookid=<?php echo $bookid;?>&content="+SelText;
							  var data = '';
							  $.ajax({
								url: url,
								data: data,
								dataType: 'json',
								success: function() {
									if(rsp.success) {
										alert(rsp);
									}
								}
							 });
							 var content_ch = $('#content_area').html();
							 if(content_ch != ''){
								 //var content_ch1 = content_ch.replace(/content/g, '<span class="background-yello">'+SelText+'</span>');
								 var content_ch1 = content_ch.replace(new RegExp('(' + SelText + ')', 'g'), '<span class="background-yello">'+SelText+'</span>');
								 $('#content_area').html(content_ch1); 
						   }
						 }
					   }
				   });
			   });
		   }
		   
 </script>
</body>
</html>
