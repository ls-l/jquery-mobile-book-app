<!DOCTYPE html>
<html>
<!--
  Created using jsbin.com
  Source can be edited via http://jsbin.com/igena4/1/edit
-->
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Drag - Test</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
    <script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
  
<style id="jsbin-css">

</style>
</head> 
<body>
<div data-role="page">
  <div data-role="content" style="width:500px;height:500px;border:1px solid red;">
    <img src="http://upload.wikimedia.org/wikipedia/en/thumb/9/9e/JQuery_logo.svg/200px-JQuery_logo.svg.png" class="draggable" alt="jQuery logo" />
    <img src="http://upload.wikimedia.org/wikipedia/en/a/ab/Apple-logo.png" class="draggable" alt="Apple Inc. logo" />
  </div>
</div>
<script>
$(document).ready(function() {
    $(".draggable").draggable();
});

</script>
<!--<script src="http://static.jsbin.com/js/render/edit.js"></script>
<script>jsbinShowEdit({"root":"http://static.jsbin.com","csrf":"DDRTbl+7XgCQvyVZscbBTLgl"});</script>
<script src="http://static.jsbin.com/js/vendor/eventsource.js"></script>
<script src="http://static.jsbin.com/js/spike.js"></script>
<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-1656750-13']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
})();
</script>-->

</body>
</html>