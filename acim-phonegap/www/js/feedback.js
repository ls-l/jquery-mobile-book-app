var serviceURL = "http://localhost/acim-phonegap/services/";
//var serviceURL = "http://thelaunchengine.com/acim/demo3/services/";
$(document).ready(function(){
	 $('form').submit(function() {  
		 if($("#date_feed").val() != '' && $("#email").val() != '' && $("#comments").val() != ''){
			 $.post(serviceURL + 'feedback.php',$("#feedback_form").serialize(),function(data){
				$("#date_feed").val('');
				$("#email").val('');
				$("#comments").val('');
				$("#error_msg").hide();
		        $("#succ_msg").show();
				setTimeout(function() {
                 $('#succ_msg').fadeOut('slow');
			    }, 6000);
				
			  });
		 } else {
		   $("#succ_msg").hide();
		   $("#error_msg").show();	
		   setTimeout(function() {
                 $('#error_msg').fadeOut('slow');
			}, 6000);
	     }
		 return false;
	});
});