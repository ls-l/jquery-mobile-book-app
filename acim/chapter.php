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
				<?php for($i=1;$i<=10;$i++) { ?>
				   <a href="javascript:void(0)" class="drag" style="position:absolute;"></a>
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
		        if(!isset($_REQUEST['pageno'])){
				  $pageno = 1; 
				} else {
				  $pageno = $_REQUEST['pageno']; 
				}
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
					<div class="bookmark-page">
                        <ul>
                            <li id="bookmark_icon" class="droppable" style="">&nbsp;
							    <div style="top:33%;position:absolute;">..</div>
							</li>
						</ul>
                     </div>
					<?php } ?> 
                    <!--style="min-height:70%;"-->
					<div class="cont-text unselectable" <?php if(count($res_count) > 0){ ?>  <?php } ?> id="content_area">
					  <?php  
						  $db = db::__d();
						  if(count($res_count) > 0){
						     $query = "SELECT tbl_page_content FROM tbl_page where ".$where;
						     $res = qs($query);
						     echo $res['tbl_page_content'];
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
		     //var h=window.innerHeight;
		     var h=$(".inner_bg").height();
			 var w=$(".inner_bg").width();
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
				  var pos = ui.draggable.position();
				  //alert('top: ' + pos.top+ ', left: ' + pos.left);
				  //alert(h+"--"+w);
				  var topposition = (pos.top/h)*100; 
				  //var topposition = (pos.top/dragablediv)*100; 
				  //alert(topposition);
				  var url = "icon_insert.php?pageno=<?php echo $pageno;?>&chid=<?php echo $chid;?>&chno=<?php echo $chno;?>&bookid=<?php echo $bookid;?>&topposition="+topposition;
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
		   $('.cont-text').click(function(e){
                    //e.preventDefault();
					//$("#content_area").addClass("unselectable");
					//$('#content_area').css('background-color', 'red');
                    $('#content_area::selection').css({color: "#3c3"})
		   });
		  function select_highlight(){
                //e.preventDefault();
				$("#content_area").removeClass("unselectable");
           }
		   
 </script>
</body>
</html>
