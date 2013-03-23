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
		<script>
            $(document).on("click", ".loader", function() {          
                
                $.mobile.showPageLoadingMsg();
				var bgColor = $(this).attr('id');
				var loader  = $('div.ui-loader');
			
				loader.removeAttr('class');
				loader.attr('class','ui-loader ui-body-'+bgColor+' ui-corner-all');
				$(this).trigger('create');
			});
			function divFunction(){
               
				var w=window.innerWidth;
                var h=window.innerHeight;
                var w = w-50;
				
				if(w < 400){
				   var per = 100;
				} else if(w < 1000){
				  var per = 70;
				} else if(w < 1300){
				  var per = 60;
				} else {
				  var per = 40;
				}
				
				
				var popupwidth = (w*per)/100;			
				var marginleft = (w-popupwidth)/2;
				var marginright = (w-popupwidth)/2;
				
				   $("#popupReading").css("width", popupwidth);
				   $("#popupReading").css("margin-left", marginleft);
				   $("#popupReading").css("margin-right", marginright);
				   $("#popupReading").css("left", "0px");
				   $("#popupReading").css("right", "0px");
			    
			}
        </script>
</head>
<body>
   <div data-role="content">
		<div class="home innertube">
    	<div class="main_bg innertube">
            <h1>A Course In <br/> Miracles</h1>
            <h2>Living the Love every day!</h2>
          	<div class="menu innertube">
                <ul data-type="horizontal" class="localnav">
                    <!--<li><a href="reading_chapter.html" class="loader"><span><img src="images/reding.png" /></span><label>Reading</label></a></li>-->	
                    <!--<li><a href="reading_chapter.html" class="loader" ><span><img src="images/reding.png" /></span><label>Reading</label></a></li>-->
					<li><a href="#popupReading" data-rel="popup" onClick="divFunction()"><span><img src="images/reding.png" /></span><label>Reading</label></a></li>
					<li class="menu_sep"><a href="setting.html" class="loader"><span><img src="images/setting.png" /></span><label>Settings</label></a></li>	
                    <li><a href="#"><span><img src="images/lesson.png" class="loader"/></span><label>Lessons</label></a></li>	
                </ul>
                <ul class="menu_img"  data-type="horizontal">
                    <li><a href="#"><span><img src="images/resource.png" /></span><label>Resources</label></a></li>	
                    <li class="menu_sep"><a href="#"><span><img src="images/reminder.png" /></span><label>Reminders</label></a></li>	
                    <li><a href="#"><span><img src="images/info.png" /></span><label>Info</label></a></li>	
                </ul> 
        	  </div>
			  <div data-role="popup" id="popupReading" class="home-popup">
				   <div class="home-popup-content">
				        <div class="home-popup-content-first"><a href="chapter.php" class="loader"><span><img src="images/reding.png" /></span><br/><label>Text Book</label></a></div>
						<div class="home-popup-content-other"><a href="chapter.php" class="loader"><span><img src="images/reding.png" /></span><br/><label>Teachers's Manual</label></a></div>
						<div class="home-popup-content-other"><a href="chapter.php" class="loader"><span><img src="images/reding.png" /></span><br/><label>The Song of Prayer</label></a></div>
						<div class="home-popup-content-other2"><a href="chapter.php" class="loader"><span><img src="images/reding.png" /></span><br/><label>The Psychotherapy Supplementory</label></a></div>
                   </div> 
				   </div>
    	</div>
	 </div>
	 
  </div>
</body>
</html>