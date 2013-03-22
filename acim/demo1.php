<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <meta name="viewport" content="width=device-width, initil-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/query.css"/>
   <!-- <link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css">
    <script src="javascript/js/jquery-1.8.2.min.js"></script>
    <script src="javascript/js/jquery.mobile-1.2.0.min.js"></script>-->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript">
	    
	</script>
	<script>
	      //$.mobile.showPageLoadingMsg("a", "Loading theme a...");
            /*$(document).bind( 'mobileinit', function(){
               $.mobile.loadingMessageTheme = 'e';
               $.mobile.loadingMessageTextVisible = true;
               $.mobile.loadingMessage = "Loading...";
			   
            });*/
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
        </script>
</head>
<body>
  <div data-role="page">
     
	 <div data-role="content">
		<div class="home">
    	<div class="main_bg">
            <h1>A Course In <br/> Miracles</h1>
            <h2>Living the Love every day!</h2>
          	<div class="menu">
                <ul data-type="horizontal" class="localnav">
                    <li><a href="reading_chapter.html" class="loader"><span><img src="images/reding.png" /></span><label>Reading</label></a></li>	
                    <li class="menu_sep"><a href="setting.html" class="loader"><span><img src="images/setting.png" /></span><label>Settings</label></a></li>	
                    <li><a href="#"><span><img src="images/lesson.png" class="loader"/></span><label>Lessons</label></a></li>	
                </ul>
                <ul class="menu_img"  data-type="horizontal">
                    <li><a href="#"><span><img src="images/resource.png" /></span><label>Resources</label></a></li>	
                    <li class="menu_sep"><a href="#"><span><img src="images/reminder.png" /></span><label>Reminders</label></a></li>	
                    <li><a href="#"><span><img src="images/info.png" /></span><label>Info</label></a></li>	
                </ul> 
        	  </div>
    	</div>
	 </div>
	 
  </div>
</body>
</html>