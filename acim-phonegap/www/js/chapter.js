var serviceURL = "http://localhost/acim-phonegap/services/";
//var serviceURL = "http://thelaunchengine.com/acim/demo3/services/";
$(document).ready(function(){
	  window.q_string = location.search;
	  var con_inner_h = '';
	  var con_inner_w = '';
	  getChapterContent();
});

function ContentPopup() {
				     //if($('#content_popup').css('display') == 'none' && $('#content_popup_big').css('display') == 'none'){
					    $('#content_popup').show(); 
					 //} else {
					    //$('#content_popup').hide();
						//$('#content_popup_big').hide();
					 //}
}

function getFirstRange() {
            var sel = rangy.getSelection();
            return sel.rangeCount ? sel.getRangeAt(0) : null;
 }

function surroundRange() {
            var range = getFirstRange();
            if (range != '') {
                var el = document.createElement("span");
                el.style.backgroundColor = "yellow";
                try {
                    var all_text = range.surroundContents(el);
					return 'yes';
				} catch(ex) {
                    if ((ex instanceof rangy.RangeException || Object.prototype.toString.call(ex) == "[object RangeException]") && ex.code == 1) {
                        alert("Unable to surround range because range partially selects a non-text node. See DOM Level 2 Range spec for more information.\n\n" + ex);
                    } else {
                        alert("Unexpected errror: " + ex);
                    }
                   return 'no';
				}
            } else {
				return 'no';
			}
        }

function select_highlight(){
                $("#content_area").removeClass("unselectable");   

                $('#content_area').mousedown(function() {

                    $('#content_area').mouseup(function() {   
						var with_range_alltext = surroundRange();
						if(with_range_alltext == 'yes'){
					    ContentPopup();
						var all_content = $('#content_area').html();
						//var all_content = "'"+all_content+"'";
						var url = serviceURL + "highlighted_icon_insert.php"+q_string;
                                var data = '';
                                $.ajax({
									type: "POST", 
                                    url: url,
                                    data: {
										'content':all_content
									},
                                    dataType: 'json',
                                    success: function(data) {
										return false;
                                    }
                                });
						}
						
						/*if(window.getSelection) {  
                            var SelText = window.getSelection();
                            if(SelText != ''){
                               var url = serviceURL + "highlighted_icon_insert.php"+q_string+"&content="+SelText;
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
                                var content_ch = $('#content_area').html();
                                if(content_ch != ''){
                                    var content_ch1 = content_ch.replace(new RegExp('(' + SelText + ')', 'g'), '<span class="background-yello">'+SelText+'</span>');
                                    $('#content_area').html(content_ch1); 
                                }
                            }
                        }*/
                    });
                });
            }

function delete_icon(list_id,icon_id,icon_type,chid,bookid){
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
    //alert(list+"**"+disp+"**"+toppos);
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
			
			$("#delete_all_icon").click(function(){
		       if (confirm("Do you want to delete all the icons of this page?")) {
				   var data = '';	
						$.ajax({
							url: serviceURL + "all_icon_delete.php"+q_string,
							data: data
							}).done(function( result ) {
							   if(result == 'deleted'){
								  window.location.reload(); 
							   } 
					 });
				} else {
				   return false;	
				}	
			});
			
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
                    var data = '';	
					$.ajax({
						url: serviceURL + "nxt_pre_page.php"+q_string+"&nxtpre=1",
						data: data
						}).done(function( result ) {
						   if(result == 'last'){
							  alert('This is a last page');   
						   } else {
						      window.location.href = result; 
						   } 
						});			
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
			      var data = '';	
					$.ajax({
						url: serviceURL + "nxt_pre_page.php"+q_string+"&nxtpre=0",
						data: data
						}).done(function( result ) {
						   if(result == 'first'){
							  alert('This is a first page');   
						   } else {
						      window.location.href = result; 
						   } 
						});
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
			
			$("#close_popup").click(function() { 
				$('#content_popup').hide();
				$('#content_popup_big').hide();							 
			});
			$("#close_popup_big").click(function() { 
				$('#content_popup').hide();
				$('#content_popup_big').hide();							 
			});
			
                $("#content_area").click(function() { 
				     /*if($('#content_popup').css('display') == 'none' && $('#content_popup_big').css('display') == 'none'){
					    $('#content_popup').show(); 
					 } else {
					    $('#content_popup').hide();
						$('#content_popup_big').hide();
					 }*/
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
                    doDrag('.drag')
                    $('.droppable123').droppable({
										 
                        scope: "items",
                        drop: function(event, ui) {
                            var el = ui.helper.context;
					
							//var $clone = ui.helper.clone();
							//$(this).data("clone",$clone);
							
							
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
							var chk_icon_type = iconno[0]+iconno[1]; 
							if(chk_icon_type == 'bm'){  
							    var icon_split = iconno.split('bm');
								iconno = icon_split[1]; 
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
										getContentRefresh('bm-l'+icon_split[1],'bm-d'+icon_split[1],topposition);
									});
									 
                                 } 
								
							 	
							} else {
							
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
		  		
				TapHandler_f();
}

function doDrag(drag){
 $(drag).draggable({
                        revert: "invalid",
                        scope: "items",
						start: function(event,ui) {
						        var chk_boom_mark = ui.helper.attr('data-id').toString();	
								var chk_boom_mark1 = chk_boom_mark[0]+chk_boom_mark[1];
								var random_no = Math.floor(Math.random()*100000+1);
								if(chk_boom_mark1 == 'bm'){
								   var clone_allow = ui.helper.attr('data-db');	
								    if(clone_allow == 0){
								       var old_dataid = ui.helper.attr('id');
									   var $clone = ui.helper.clone();
									   var new_divid = old_dataid.toString();
									   var id_split = old_dataid.split('-l');
									   
									   var new_divid2 = id_split[0]+"-l"+random_no;
									   $clone.attr('id', new_divid2);
									   $clone.attr('data-id',id_split[0]+random_no);
									   $clone
											.removeClass("ui-draggable-dragging")
											.insertBefore(ui.helper)
										;
										$(this).data("clone",$clone);
										var clone_below1 = $("#bm_below").html();
										$('#bookmark_icon').append(clone_below1);
										$('ul#bookmark_icon li').last().attr('id','bm-d'+id_split[1]);
										$('ul#bookmark_icon li').last().children().attr('data-id','bm'+id_split[1]);
										doDrag('.drag');
									}
									
								} else {
								var clone_allow = ui.helper.parent().children().attr('data-db');
								if(clone_allow == 0){
								var old_dataid = ui.helper.parent().attr('id');
								var $clone = ui.helper.parent().clone();	 
								var new_divid = old_dataid.toString();
								var id_split = old_dataid.split('-l');
							    //var new_divid2 = new_divid[0]+new_divid[1]+new_divid[2]+(parseInt(new_divid[3])+parseInt(1));
								var new_divid2 = id_split[0]+"-l"+random_no;
								$clone.attr('id', new_divid2);
								//$clone.children().attr('data-id',new_divid[0]+(parseInt(new_divid[3])+parseInt(1)));
								$clone.children().attr('data-id',new_divid[0]+random_no);
								
								$clone
								    .removeClass("ui-draggable-dragging")
								    .insertBefore(ui.helper.parent())
								;
								
								/*var old_dataid = ui.helper.attr('data-id');
								var $clone = ui.helper.clone();
								$clone
								    .removeClass("ui-draggable-dragging")
									.insertBefore(ui.helper)
								;
								var new_iconno = old_dataid.toString();
								var gen_iconno = new_iconno[0]+(parseInt(new_iconno[1])+parseInt(1)); 
								$clone.attr('data-id', gen_iconno);*/
							
					        	$(this).data("clone",$clone);
								if(new_divid[0] == 's'){
								    var clone_below1 = $("#s_below").html();
									$('#bookmark_icon').append(clone_below1);
									$('ul#bookmark_icon li').last().attr('id','s-d'+id_split[1]);
									$('ul#bookmark_icon li').last().children().attr('data-id','s'+id_split[1]);
								}
								else if(new_divid[0] == 'h'){
								    var clone_below1 = $("#h_below").html();
									$('#bookmark_icon').append(clone_below1);
									$('ul#bookmark_icon li').last().attr('id','h-d'+id_split[1]);
									$('ul#bookmark_icon li').last().children().attr('data-id','h'+id_split[1]);
								}
								else if(new_divid[0] == 'y'){
								    var clone_below1 = $("#y_below").html();
									$('#bookmark_icon').append(clone_below1);
									$('ul#bookmark_icon li').last().attr('id','y-d'+id_split[1]);
									$('ul#bookmark_icon li').last().children().attr('data-id','y'+id_split[1]);
								}
								else if(new_divid[0] == 'm'){
								    var clone_below1 = $("#m_below").html();
									$('#bookmark_icon').append(clone_below1);
									$('ul#bookmark_icon li').last().attr('id','m-d'+id_split[1]);
									$('ul#bookmark_icon li').last().children().attr('data-id','m'+id_split[1]);
								}
								else if(new_divid[0] == 'b'){
								    var clone_below1 = $("#b_below").html();
									$('#bookmark_icon').append(clone_below1);
									$('ul#bookmark_icon li').last().attr('id','b-d'+id_split[1]);
									$('ul#bookmark_icon li').last().children().attr('data-id','b'+id_split[1]);
								}
								doDrag('.drag');
							  }
							 }
							},
							stop: function(event,ui) {
								if( $(".ui-draggable-dragging.dropped").length == 0) {
									//$(this).data("clone").remove();
								};	
							}
							/*,
							refreshPositions: true,
							obstacle: '.drag.hold',
							preventCollision: true*/
                    });
}

function TapHandler_f(){
  $( "a.hold" ).on( 'taphold', tapholdHandler );
				function tapholdHandler( event ) {
				  if (confirm("Do you want to delete this icon?")) {	
                    var child = $(event.target);
					var par = $(event.target).parent();
					var data_id = child.attr('data-id');
					var a_id = par.attr('id');
					$.ajax({
						type: "POST",
						url: serviceURL + 'icon_delete.php'+q_string,
						//data: {icon_id:icon_id, icon_type:icon_type}
						data: {data_id:data_id}
						}).done(function( result ) {  
						   if(result == 'deleted'){
							 $("#"+a_id).hide();
						   } 
				    });	
				  } else {
					  return false;
				  }
				}
}