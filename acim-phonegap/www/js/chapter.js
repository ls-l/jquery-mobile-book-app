var serviceURL = "http://localhost/acim-phonegap/services/";
//var serviceURL = "http://thelaunchengine.com/acim/demo3/services/";
$(document).ready(function(){
	  window.q_string = location.search;
	  var con_inner_h = '';
	  var con_inner_w = '';
	  getChapterContent();
});

function delete_icon(list_id,icon_id,icon_type,chid,bookid){
	//alert(list_id+"**"+icon_id+"**"+icon_type);
	$.ajax({
		type: "POST",
		url: serviceURL + 'icon_delete.php',
		data: {icon_id:icon_id, icon_type:icon_type, chid:chid, bookid:bookid}
		}).done(function( result ) {
		   if(result == 'deleted'){
			 $("#"+list_id).hide();
		   } 
	    });
}
function getChapterContent() {
	var win_h = $(window).height();
	var win_w = $(window).width();
	$.post(serviceURL + 'chapter.php'+q_string+'&scr_h='+win_h+'&scr_w='+win_w, function(data) {
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
	   
	   
	   /*$('#p_left_arrow').append(res[9]);
	   $('#p_pagination').append(res[10]);
	   $('#p_right_arrow').append(res[11]);*/
       
	   
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

function getContentRefresh(list,disp,toppos){
    $("#"+list).hide();
	$("#"+disp).show();
    $("#"+disp).css("top",toppos+'px');
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
				
			var con_area_height = (($(".midd-cont").height()*75)/100);
			$("#p_droppable").css("height", con_area_height);
			$("#p_droppable").css("overflow", "hidden");
			
			$("#next_con").click(function(){
			   var con_area_height = (($(".midd-cont").height()*70)/100);
			   var h_content=$("#content_area").height();
			   var h_content=$("#p_droppable").height();
			   var mt_content=$("#inner_content_area").css('margin-top');
			   var mt_content=mt_content.substring(0,mt_content.length - 2);
			   var inner_area_height=$("#inner_content_area").height();
			   var inner_top = (parseInt(h_content) + parseInt(Math.abs(mt_content)));
			   if(inner_area_height > inner_top){
			     $("#inner_content_area").animate({'margin-top':'-'+inner_top+'px'},0);
			   } else {
			      alert('This is a last page');
			   }
			});
			
			$("#pre_con").click(function(){
			   var con_area_height = (($(".midd-cont").height()*70)/100);
			   var h_content=$("#content_area").height();
			   var h_content=$("#p_droppable").height();
			   var mt_content=$("#inner_content_area").css('margin-top');
			   var mt_content=mt_content.substring(0,mt_content.length - 2);
			   var inner_area_height=$("#inner_content_area").height();
			   var inner_top = (parseInt(Math.abs(mt_content)) - parseInt(h_content));
			   //alert(inner_area_height+"##"+inner_top+"##"+parseInt(Math.abs(mt_content))+"##"+parseInt(h_content));
			   if(inner_top >= 0){
			     $("#inner_content_area").animate({'margin-top':'-'+inner_top+'px'},0);
			   } else {
			      alert('This is a first page');
			   }
			});
			
			$("#minus_icon_div").click(function(){
				$("#first_top_div").show();
				$("#second_top_div").hide();							
			});
			
			var star_disp = new Array();
			var star_del = new Array();
			
			var star_disp = ['s-d1','s-d2','s-d3','s-d4','s-d5','s-d6','s-d7','s-d8','s-d9','s-d10'];
			var star_del = ['s-dr1','s-dr2','s-dr3','s-dr4','s-dr5','s-dr6','s-dr7','s-dr8','s-dr9','s-dr10'];
			
				
			/*for(var i=0;i<10;i++){
			   //STAR DELETE
				$("#"+star_disp[i]).on('mouseenter',function(){
				   $("#"+star_del[i]).show();
				});
				$("#"+star_disp[i]).on('mouseleave',function(){
				   $("#"+star_del[i]).hide();
				});
				$("#"+star_disp[i]).mousedown(function() {
				  $("#"+star_del[i]).hide();
				});
			}
			$("#s-d1").on('mouseenter',function(){
				   $("#s-dr1").show();
				});
				$("#s-d1").on('mouseleave',function(){
				   $("#s-dr1").hide();
				});
				$("#s-d1").mousedown(function() {
				  //$("#s-dr1").hide();
				});
			
			*/
			
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
                        $('.midd-cont').css("height",'79%');
                        $('#secd_line_icon').show();                              
                    } else {
                        $('.top-menu').css("height",'6%');
                        $('.midd-cont').css("height",'79%');
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
							
							
							var mt_content=$("#inner_content_area").css('margin-top');
			                var mt_content=mt_content.substring(0,mt_content.length - 2);
                            var top_icon_t = (parseInt(icon_last_p.top) + parseInt(Math.abs(mt_content)));
							//alert(top_icon_t);
							//alert($(el).offset().top);
							//$(el).css({ top: top_icon_t+'px' });
							//$(el).animate({'top':top_icon_t+'px'},2000);
							
				            var drag_area = $('.droppable123').position();
							//var ani_left = ($(".midd-cont").offset().left - $(el).parent().parent().offset().left) + 65;
							
							//var ani_left = ((-($("#p_chno").offset().left)) + $(".midd-cont").offset().left);
							var ani_left = ($("#p_chno").offset().left - $(el).parent().parent().offset().left);
							//alert($("#inner_content_area").offset().left);
                            
							
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
							
							//Scroller with icon
							var mt_content=$("#inner_content_area").css('margin-top');
			                var mt_content=mt_content.substring(0,mt_content.length - 2);
                            var topposition = (parseInt(topposition) + parseInt(Math.abs(mt_content)));
							//Scroller with icon
							
                            if(iconno[0] == 'h'){
                                iconno = iconno.substring(1);
                                var icon_type = 'heart';
								var drag_icon = $('.icon2').position();
								 var icon_left = (drag_area.left + drag_icon.left);		 
								 if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    //$(el).animate({'left':'-129px'},2000); 
									$(el).animate({'left':ani_left+'px'},2000,function(){
									    getContentRefresh('h-l'+iconno,'h-d'+iconno,topposition);
									});
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
                                    $(el).animate({'left':ani_left+'px'},2000,function(){
									    getContentRefresh('s-l'+iconno,'s-d'+iconno,topposition);
									}); 
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
                                    $(el).animate({'left':ani_left+'px'},2000,function(){
									    getContentRefresh('y-l'+iconno,'y-d'+iconno,topposition);
									});
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
                                    $(el).animate({'left':ani_left+'px'},2000,function(){
									    getContentRefresh('m-l'+iconno,'m-d'+iconno,topposition);
									});
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
                                    $(el).animate({'left':ani_left+'px'},2000,function(){
									    getContentRefresh('b-l'+iconno,'b-d'+iconno,topposition);
									});
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
									//var ani_left = ($(".midd-cont").offset().left - $(el).parent().offset().left) + 65;
									//var ani_left = $("#p_chno").offset().left;
									var ani_left = ($("#p_chno").offset().left - $(el).parent().offset().left);
									$(el).animate({'left':ani_left+'px'},2000,function(){
									    $(el).css({backgroundSize:'60% 60%'});
										getContentRefresh('bm-l'+iconno,'bm-d'+iconno,topposition);
									});
									 
                                 } 
							}
                            
							var win_h = $(window).height();
							var win_w = $(window).width();
							
							var win_inner_h = $("#inner_content_area").height();
							
							//var win_h = $("#inner_content_area").height();
							//var win_w = $("#inner_content_area").width();
							
							var url = serviceURL+"icon_insert.php?pageno="+p_pageno+"&chid="+p_chid+"&chno="+p_chno+"&bookid="+p_bookid+"&topposition="+topposition+"&iconno="+iconno+"&icon_type="+icon_type+"&win_h="+win_h+"&win_w="+win_w+"&win_inner_h="+win_inner_h;
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