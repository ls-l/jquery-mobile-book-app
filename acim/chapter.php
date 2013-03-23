<?php 
include('include/db.class.php');
?>
<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <meta name="viewport" content="width=device-width, initil-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="css/query.css"/>
   <link rel="stylesheet" type="text/css" href="css/custom.css"/>
   <!-- <link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css">
    <script src="javascript/js/jquery-1.8.2.min.js"></script>
    <script src="javascript/js/jquery.mobile-1.2.0.min.js"></script>-->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript">
	    
	</script>
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
                <li class="pen-icon"><a href="#"></a></li>
                <li class="pin-icon"><a href="#"></a></li>
                <li class="search-icon"><a href="#"></a></li>
                <li class="tag-icon"><a href="#"></a></li>
                <div class="cls"></div>
            </ul>
          
          </div>
          <div class="midd-cont">
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
            	<div class="chapter-detail">
                    <?php if(count($res_count) > 0){ ?>
					<div class="bookmark-page">
                        <ul>
                            <li class="heart_chep"></li>
                            <li class="book_chep"></li>
                            <li class="yellow_chep"></li>
                        </ul>
                     </div>
					<?php } ?> 
                    <div class="cont-text" <?php if(count($res_count) > 0){ ?> style="min-height:750px;" <?php } ?>>
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
		  <?php //if(count($res_count) > 0){ ?>
          <div class="footer-cont">
          	<span class="left-arrow"><a href="chapter.php?chid=<?php echo $chid; ?>&pageno=<?php echo $prepage; ?>"><img src="images/left-arrow.png" /></a></span>
           	<div class="pagination">123</div>
            <span class="right-arrow"><a href="chapter.php?chid=<?php echo $chid; ?>&pageno=<?php echo $nxtpage; ?>"><img src="images/right-arrow.png" /></a></span>
            <div class="cls"></div>
          </div> 
		  <?php //} ?> 
          
    	</div>
    </div>
   </div>
</div>
</body>
</html>
