var serviceURL = "http://thelaunchengine.com/acim/demo/services/";

$(document).ready(function(){
	  window.q_string = location.search;
	  getChapterContent();
});

function getChapterContent() {
	$.post(serviceURL + 'chapter.php'+q_string, function(data) {
	   var res = data.split("#*@@*#");
	   
	   
	   $('#tag_icon_small').append(res[0]);
	   $('#p_icon1').append(res[1]);
	   $('#p_icon2').append(res[2]);
	   $('#p_icon3').append(res[3]);
	   $('#p_icon4').append(res[4]);
       $('#p_icon5').append(res[5]);
	   $('#p_chno').append(res[6]);
	   $('#p_chname').append(res[7]);
	   $('#p_droppable').html(res[8]);
	   $('#p_left_arrow').append(res[9]);
	   $('#p_pagination').append(res[10]);
	   $('#p_right_arrow').append(res[11]);
	   var q_str_data = res[12];
	   var q_str_res = q_str_data.split("**");
	   var p_pageno = q_str_res[0];
	   var p_chid = q_str_res[1];
	   var p_chno = q_str_res[2];
	   var p_bookid = q_str_res[3];
	   var p_userid = q_str_res[4];
        	   
	   //getIconDivHeight();
	   GetDocReady(p_pageno,p_chid,p_chno,p_bookid,p_userid);
	   
	   
	});
	
}

function getIconDivHeight() {
   var h_main=$(window).height();
   var h=$(".inner_bg").height();
       var w=$(".inner_bg").width();
       var h_bookmark=$(".get-icon").height();
	   var dragablediv = h-(h/2.5);
	   $("#bookmark_icon").css("height", dragablediv);
}


function GetDocReady(p_pageno,p_chid,p_chno,p_bookid,p_userid){
   
			
			$("#tag_icon_small").on('mouseenter',function(){
			   //$("#tag_icon_big").hide();
			   //$("#tag_icon_small").show(); 
			   //$("#tag_icon_small").removeClass('tag-icon');
			   //$("#tag_icon_small").addClass('tag-icon-small');
			});
			$("#tag_icon_small").on('mouseleave',function(){
			   //$("#tag_icon_small").removeClass('tag-icon-small');
			   //$("#tag_icon_small").addClass('tag-icon');
			});
			
                $("#content_area").click(function() { 
				     if($('#content_popup').css('display') == 'none' && $('#content_popup_big').css('display') == 'none'){
					    $('#content_popup').show(); 
					 } else {
					    $('#content_popup').hide();
						$('#content_popup_big').hide();
					 }
				});
				$("#popup_desc").click(function() { 
					    $('#content_popup').hide();
						$('#content_popup_big').show();
				});
				$('.ui-content').css("overflow-y",'hidden'); 
                $("#topmenu_second").click(function() {                          
        
                    if($('#secd_line_icon').css('display') == 'none'){
                        $('.top-menu').css("height",'9%');
                        $('.midd-cont').css("height",'81%');
                        $('#secd_line_icon').show();                              
                    } else {
                        $('.top-menu').css("height",'6%');
                        $('.midd-cont').css("height",'84%');
                        $('#secd_line_icon').hide();                              
                    }
                });
                      
                      
                var h_main=$(window).height();
                var h=$(".inner_bg").height();
                var w=$(".inner_bg").width();
                var h_bookmark=$(".get-icon").height();
			 
                var dragablediv = h-(h/2.5);
			    
				$(".top-icon-menu").click(function(){
				    $("#first_top_div").hide();
					$("#second_top_div").show();
				});
                $("#bookmark_icon").css("height", dragablediv);
		//$(".clcik-delete").hover(function(){
                    //alert('hi');
                    //$(this).find('.clcik-delete').data('id');
                //});	 
                $(function() {
			 
                    var dragOptions = {
                        revert: "invalid",
                        scope: "items",
                        helper: "clone"
                    }
                    //$(".drag").draggable();
			 
                    /* $('.drag123').draggable({
                                       revert: "invalid",
                                       scope: "items"
                               });*/
                    $('.drag').draggable({
                        revert: "invalid",
                        scope: "items"
                    });
                    $('.droppable123').droppable({
                        scope: "items",
                        drop: function(event, ui) {
                            var el = ui.helper.context;
							//$(el).animate({'left':'0px'},1000); //1000 = 1second
							var iconno = $(el).data("id").toString();
							//console.log(el);
							var record_db = $(el).data("db");
							var icon_last_p = $(el).position();
				            var drag_area = $('.droppable123').position();
							var ani_left = ($(".midd-cont").offset().left - $(el).parent().parent().offset().left) + 65;
							
							
                            if(iconno[0] == 'h'){
                                iconno = iconno.substring(1);
                                var icon_type = 'heart';
								var drag_icon = $('.icon2').position();
								 var icon_left = (drag_area.left + drag_icon.left);		 
								 if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    //$(el).animate({'left':'-129px'},2000); 
									$(el).animate({'left':ani_left+'px'},2000); 
                                 }
							}
                            else if(iconno[0] == 's'){
                                iconno = iconno.substring(1);
                                var icon_type = 'star';
								var drag_icon = $('.icon1').position();
							    var icon_left = (drag_area.left + drag_icon.left);
								if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    //$(el).animate({'left':'11px'},2000); //1000 = 1second
                                    $(el).animate({'left':ani_left+'px'},2000); 
								 }
							}
                            else if(iconno[0] == 'y'){
                                iconno = iconno.substring(1);
                                var icon_type = 'yellow';
								var drag_icon = $('.icon3').position();
								var icon_left = (drag_area.left + drag_icon.left);		 
								if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    //$(el).animate({'left':'-274px'},2000); //1000 = 1second
                                    $(el).animate({'left':ani_left+'px'},2000); 
								 }
							}
                            else if(iconno[0] == 'm'){
                                iconno = iconno.substring(1);
                                var icon_type = 'mark';
								var drag_icon = $('.icon4').position();
								var icon_left = (drag_area.left + (drag_icon.left*3));		 
								if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    //$(el).animate({'left':'-414px'},2000); //1000 = 1second
                                    $(el).animate({'left':ani_left+'px'},2000); 
								 }
							}
                            else if(iconno[0] == 'b'){
                                iconno = iconno.substring(1);
								var icon_type = 'bulb';
                               var drag_icon = $('.icon5').position();
							   var icon_left = (drag_area.left + (drag_icon.left*4));		 
							   if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
							        //$(el).animate({'left':'-554px'},2000); //1000 = 1second
                                    $(el).animate({'left':ani_left+'px'},2000); 
								 }
							}
                            else {
                                var icon_type = 'bookmark'; 
								if(record_db == "1"){
								    //$( this ).addClass('active'); 
									$(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    /*$(el).animate({'left':'-647px'},2000,function(){
									    $(el).css({backgroundSize:'60% 60%'})
									});*/ 
									var ani_left = ($(".midd-cont").offset().left - $(el).parent().offset().left) + 65;
									$(el).animate({'left':ani_left+'px'},2000,function(){
									    $(el).css({backgroundSize:'60% 60%'})
									});
									 
                                 } 
							}
                            var pos = ui.draggable.position();
                            //alert('top: ' + pos.top+ ', left: ' + pos.left);
                            //alert(h+"---"+pos.top+"-----"+h_bookmark);
				            
                            var pos = ui.draggable.offset(), dPos = $(this).offset();
                            var leftposition = (pos.left - dPos.left);
							
							//$(this).offset().left.css({'left':'3px'});
							/*alert("data-id: " + ui.draggable.data("data-id") + 
                                                       ", Top: " + (pos.top - dPos.top) + 
                                                       ", Left: " + (pos.left - dPos.left));*/
                            //var topposition = (pos.top/h)*100;   
                            //var topposition = ((pos.top - dPos.top)/h)*100;
                            var topposition = (pos.top - dPos.top);
                            var url = serviceURL+"icon_insert.php?pageno="+p_pageno+"&chid="+p_chid+"&chno="+p_chno+"&bookid="+p_bookid+"&topposition="+topposition+"&iconno="+iconno+"&icon_type="+icon_type;
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
		  		 
            
}