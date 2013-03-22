<!DOCTYPE html> 
<html> 
    <head> 
        <title>Page Title</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script>
            $(document).bind( 'mobileinit', function(){
               $.mobile.loadingMessageTheme = 'e';
               $.mobile.loadingMessageTextVisible = true;
                $.mobile.loadingMessage = "test";
            });
        </script>
        <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
        <script>
            $(document).on("click", ".show-page-loading-msg", function() {          
                $.mobile.showPageLoadingMsg();
            });
        </script>
    </head> 

    <body>
        <!-- /page -->
        <div data-role="page" class="page-map" style="width:100%; height:100%;">
            <!-- /header -->
            <div data-role="header" data-theme="b">
                <h1>Test</h1>
            </div>
            <!-- /content -->
            <div data-role="content" class="ui-bar-c ui-corner-all ui-shadow" style="padding:1em;">
                <button class="show-page-loading-msg">Click</button>
            </div>
        </div>
    </body>
</html>