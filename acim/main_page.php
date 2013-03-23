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
          <div class="top-menu cont-text">
          	  <?php
			     $db = db::__d();
				 $query = "SELECT tbl_book_title FROM  tbl_book where tbl_book_id = ".trim($_REQUEST['bookid']);
				 $res = qs($query);
			     echo $res['tbl_book_title']; 
			  ?>
          </div>
		  <div style="clear:both;"></div>
          <div class="midd-cont">
            	<div class="chapter-detail">
                    
					 <?php 					   
						$db = db::__d();
						$query = "SELECT * FROM tbl_chapter where tbl_ch_bookid = ".trim($_REQUEST['bookid']);
						$result = q($query);
						$totql_res = count($result);
						if($totql_res > 0){
						  for($i=0;$i<$totql_res;$i++){
					 ?>
							<div class="cont-text" style="float:left;margin-right:10px;width:20px;">
							   <?php 
							      echo $result[$i]['tbl_ch_no'];
							   ?>
							</div>
							<div class="cont-text" style="float:left;">
								<a href="chapter.php?chid=<?php echo $result[$i]['tbl_ch_id']; ?>">
								<?php 
								   echo $result[$i]['tbl_ch_name'];
								?>
								</a>
							</div>
							<div style="clear:both;"></div>
	                 <?php  } 
					      }  
					 ?>
                    <div class="cls"></div>
                </div>
          </div>
          <!--<div class="footer-cont">
          	<span class="left-arrow"><a href="#"><img src="images/left-arrow.png" /></a></span>
           	<div class="pagination">123</div>
            <span class="right-arrow"><a href="#"><img src="images/right-arrow.png" /></a></span>
            <div class="cls"></div>
          </div>-->  
          
    	</div>
    </div>
   </div>
</div>
</body>
</html>
