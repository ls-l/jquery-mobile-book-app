<?php 
include('include/db.class.php');
include('include/common_function.php');   
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
<title>Reading-Chapter</title>
</head>

<body>
	<div data-role="page">
	   <div data-role="content">
		<div class="inner_bg">
			<div class="content">
			  <div class="home_icon"><a href="home.php"><img src="images/home.png" /></a></div>
			  <?php
			     $db = db::__d();
				 $query = "SELECT tbl_book_title FROM  tbl_book where tbl_book_id = ".trim($_REQUEST['bookid']);
				 $res = qs($query); 
			  ?>
			  <h2><?php echo $res['tbl_book_title']; ?></h2>
			  <div class="chapter">
			   
				<ul>
				    <!--class="close_chep"-->
					<li><a href="javascript:void(0);">Preface</a><div class="cls"></div></li>
					<li><a href="javascript:void(0);">Introduction</a><div class="cls"></div></li>
					<?php 					   
						$db = db::__d();
						$query = "SELECT * FROM tbl_chapter where tbl_ch_bookid = ".trim($_REQUEST['bookid']);
						$result = q($query);
						$totql_res = count($result);
						if($totql_res > 0){
						  for($i=0;$i<$totql_res;$i++){
					 
					      $pageno_start = GetChapterPageNo(trim($_REQUEST['bookid']),$result[$i]['tbl_ch_id']);
						  if($pageno_start > 0){
							     $p_q_s = "&pageno=".$pageno_start;
						  }else{
							     $p_q_s = '';
						  }
					 ?>
					     <!--class="close_chep"-->
					        <li><a href="chapter.php?chid=<?php echo $result[$i]['tbl_ch_id'].$p_q_s; ?>" data-ajax="false"><span>Ch. <?php echo $result[$i]['tbl_ch_no'];?>-</span><label><?php echo $result[$i]['tbl_ch_name'];?></label></a><div class="cls"></div></li>
	                 <?php  } 
					      }  
					 ?>
				</ul>
			  
			  </div> 
				
			</div>
		
	
	</div>
	   </div>
	</div>   
</body>
</html>
