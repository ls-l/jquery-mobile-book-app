<?php
include('include/db.class.php');
include('include/common_function.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initil-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/query.css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css"/>
        <!--<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css">
         <script src="javascript/js/jquery-1.8.2.min.js"></script>
         <script src="javascript/js/jquery.mobile-1.2.0.min.js"></script>-->


        <!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->

        <!--Apply Image Dragable Script-->
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />

<!--<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

        <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>-->

        <script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
        <!--Apply Image Dragable Script-->


        <script src="javascript/js/jquery.ui.touch-punch.js"></script>


        <style id="jsbin-css">
        </style>
        <style type="text/css">
            .unselectable {
                -webkit-user-select: none; /* Safari, Chrome */
                -khtml-user-select: none; /* Konqueror */
                -moz-user-select: none; /* Firefox */
                -webkit-touch-callout: none;
                -ms-user-select: none;
                -o-user-select: none;
                user-select: none; /* CSS3 */
            }
        </style>
        <title>example-of-chapter</title>
    </head>

    <body>
        <div data-role="page">
            <div data-role="content">
                <div class="inner_bg">
                    <div class="example-chep">
                        <?php
                        if (!isset($_REQUEST['pageno'])) {
                            $pageno = 1;
                        } else {
                            $pageno = $_REQUEST['pageno'];
                        }
                        $chid = trim($_REQUEST['chid']);
                        $userid = 1;
                        ?>
						<div class="top-popup-menu" id="first_top_div">
							<ul>
								<li class="heart2-icon"><a href="javascript:void(0);" class="top-icon-menu"></a></li>
								<li class="tag-popup-icon"><a href="javascript:void(0);" class="top-icon-menu"></a></li>
								 <li class="plus-icon"><a href="javascript:void(0);" class="top-icon-menu"></a></li>
								<div class="cls"></div>
							</ul>
					     </div>
						 <div class="cls"></div>						  
                        <div class="top-menu" id="second_top_div" style="height:6%;margin-top:0px; display:none;">
                            <ul>
                                <li class="setting-icon"><a href="#"></a></li>
                                <li class="heart-icon second_topmenu "><a href="#"></a></li>
                                <li class="time-icon"><a href="#"></a></li>
                                <!--<li class="pen-icon"><a href="javascript:void(0);" onClick="return select_highlight();"></a></li>-->
								<li class="pen-icon"><a href="javascript:void(0);" onClick=""></a></li>
                                <li class="pin-icon"><a href="#"></a></li>
                                <li class="search-icon"><a href="#"></a></li>
                                <li class="tag-icon" id="tag_icon_small" style="position:relative;">
                                    <?php
                                    $counticon = CountIcon($userid, $pageno, $chid, 'bookmark');
                                    for ($i = 10; $i > $counticon; $i--) {
                                        ?>
                                        <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="<?php echo $i; ?>" data-db="0"></a>
                                    <?php } ?>

                                </li>
                                <!--<img src="http://localhost/acim/images/exp-tag.png" class="draggable ui-draggable" alt="Book Mark"/>-->
                                <div class="cls"></div>
                            </ul>
                            <ul class="secd_line_icon" id="secd_line_icon">
                                <li class="icon1" >
                                    <?php
                                    $counticon_star = CountIcon($userid, $pageno, $chid, 'star');
                                    for ($i = 10; $i > $counticon_star; $i--) {
                                        ?>
                                        <div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="s<?php echo $i; ?>" data-db="0"></a>
                                        </div>
                                    <?php } ?>
                                </li>
                                <li class="icon2" style="margin-left:20%">
                                    <?php
                                    $counticon_heart = CountIcon($userid, $pageno, $chid, 'heart');
                                    for ($i = 10; $i > $counticon_heart; $i--) {
                                        ?>
                                        <div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="h<?php echo $i; ?>" data-db="0"></a>
                                        </div>
                                    <?php } ?>
                                </li>
                                <li class="icon3" style="margin-left:40%">
                                    <?php
                                    $counticon_yellow = CountIcon($userid, $pageno, $chid, 'yellow');
                                    for ($i = 10; $i > $counticon_yellow; $i--) {
                                        ?>
                                        <div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="y<?php echo $i; ?>" data-db="0"></a>
                                        </div>
                                    <?php } ?>
                                </li>
                                <li class="icon4" style="margin-left:60%">
                                    <?php
                                    $counticon_mark = CountIcon($userid, $pageno, $chid, 'mark');
                                    for ($i = 10; $i > $counticon_mark; $i--) {
                                        ?>
                                        <div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="m<?php echo $i; ?>" data-db="0"></a>
                                        </div>
                                    <?php } ?>
                                </li>
                                <li class="icon5" style="margin-left:80%">
                                    <?php
                                    $counticon_bulb = CountIcon($userid, $pageno, $chid, 'bulb');
                                    for ($i = 10; $i > $counticon_bulb; $i--) {
                                        ?>
                                        <div style="position:relative;float:left;">
                                            <a href="javascript:void(0)" class="drag" style="position:absolute;" data-id="b<?php echo $i; ?>" data-db="0"></a>
                                        </div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <!--          <div class="midd-cont" style="height:77%">-->
                        <div class="midd-cont" style="height:80%;margin-top:10px;">
                            <?php
                            $db = db::__d();
                            $query = "SELECT * FROM tbl_chapter where tbl_ch_id = " . trim($_REQUEST['chid']);
                            $res = qs($query);

                            if ($pageno == 1) {
                                $prepage = $pageno;
                            } else {
                                $prepage = $pageno - 1;
                            }
                            $nxtpage = $pageno + 1;

                            $chid = $res['tbl_ch_id'];
                            $chno = $res['tbl_ch_no'];
                            $bookid = $res['tbl_ch_bookid']
                            ?>
                            <h4>Chapter <?php echo $res['tbl_ch_no']; ?></h4>
                            <p><?php echo $res['tbl_ch_name']; ?></p>
                            <?php
                            $db = db::__d();
                            $where = " tbl_page_chid = " . $chid . " AND tbl_page_bookid = " . $bookid . " AND tbl_page_no = " . $pageno;
                            $query_count = "SELECT tbl_page_id FROM tbl_page where " . $where;
                            $res_count = q($query_count);
                            ?>
                            <div class="chapter-detail droppable123" style="">
                                <?php if (count($res_count) > 0) { ?>
                                    <div class="bookmark-page get-icon">
                                        <ul id="bookmark_icon" class="droppable">
                                            <?php
                                            $total_all_icon = 0;
                                            $total_all_icon = ($counticon + $counticon_star + $counticon_heart + $counticon_yellow + $counticon_mark + $counticon_bulb); 
                                            if ($total_all_icon > 0) {
                                                $query = "SELECT tbl_icon_top_position,tbl_icon_no,tbl_icon_type 
                                                                              FROM tbl_icon 
                                                                              WHERE tbl_icon_userid = " . $userid . " 
                                                                                    AND tbl_icon_pageno = " . $pageno . " 
                                                                                    AND tbl_icon_chid = " . $chid . " 
                                                                                    AND (
                                                                                         tbl_icon_type = 'bookmark' or 
                                                                                         tbl_icon_type = 'heart' or 
                                                                                         tbl_icon_type = 'star' or
                                                                                         tbl_icon_type = 'yellow' or
                                                                                         tbl_icon_type = 'mark' or
                                                                                         tbl_icon_type = 'bulb'
                                                                                         ) 
                                                                                    ORDER BY tbl_icon_top_position DESC ";
                                                $res = q($query);
                                                for ($i = 0; $i < count($res); $i++) {
                                                    if ($res[$i]['tbl_icon_type'] == 'bookmark') {
                                                        ?>
                                                        <li  class="book-mark-icon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;" data-id="<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                    <?php } elseif ($res[$i]['tbl_icon_type'] == 'heart') { ?>
                                                        <li  class="heart-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;height:37px;width:37px;" data-id="h<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                    <?php } elseif ($res[$i]['tbl_icon_type'] == 'star') { ?>
                                                        <li  class="star-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;height:37px;width:37px;" data-id="s<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                    <?php } elseif ($res[$i]['tbl_icon_type'] == 'yellow') { ?>
                                                        <li  class="yellow-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;height:37px;width:37px;" data-id="y<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                    <?php } elseif ($res[$i]['tbl_icon_type'] == 'mark') { ?>
                                                        <li  class="mark-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;height:37px;width:37px;" data-id="m<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                    <?php } elseif ($res[$i]['tbl_icon_type'] == 'bulb') { ?>
                                                        <li  class="bulb-listicon" style="position:relative;">
                                                            <a href="javascript:void(0)" class="drag" style="position:absolute;top:<?php echo $res[$i]['tbl_icon_top_position']; ?>px;height:37px;width:37px;" data-id="b<?php echo $res[$i]['tbl_icon_no']; ?>" data-db="1"></a></li>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <li  class="droppable book-mark-icon" style="position:relative;">&nbsp;</li>
                                                <?php
                                            }
                                            ?>
                                            </li>
                                        </ul>
                                    </div>
    
                                <?php } ?> 
                                <!--style="min-height:70%;"-->
                                <div class="cont-text unselectable" <?php if (count($res_count) > 0) { ?>  <?php } ?> id="content_area" >
                                    <?php
                                    $db = db::__d();
                                    if (count($res_count) > 0) {
                                        $query = "SELECT tbl_page_content FROM tbl_page where " . $where;
                                        $res = qs($query);
                                        ?>
                                        <?php
                                        $query_1 = "SELECT tbl_highlighted_icon_content FROM tbl_highlighted_icon WHERE tbl_highlighted_icon_userid = " . $userid . " AND tbl_highlighted_icon_chid = " . $chid . " AND tbl_highlighted_icon_pageno = " . $pageno . " ORDER BY tbl_highlighted_icon_id ASC";
                                        $res_1 = q($query_1);
                                        $content_display = $res['tbl_page_content'];
                                        if (count($res_1) > 0) {
                                            for ($i = 0; $i < count($res_1); $i++) {
                                                if ($res_1[$i]['tbl_highlighted_icon_content'] != '' and $res_1[$i]['tbl_highlighted_icon_content'] != ' ') {
                                                    $replace_text = $res_1[$i]['tbl_highlighted_icon_content'];
                                                    $content_display = str_replace($replace_text, '<span class="background-yello">' . $replace_text . '</span>', $content_display);
                                                }
                                            }
                                        }
                                        echo $content_display;
                                        ?>
                                        <?php
                                    } else {
                                        echo "No Record Found.";
                                        ?>
                                    <?php } ?>  
                                    <div class="cls"></div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                            <?php
//if(count($res_count) > 0){ 
                            $db = db::__d();
                            $query = "SELECT tbl_page_no,tbl_page_chid FROM tbl_page where tbl_page_bookid = " . $bookid . " ORDER BY tbl_page_no ASC";
                            $res = q($query);
                            $total_page = count($res);
                            if ($total_page > 0) {
                                ?>

                            <?php } ?> 

                        </div>
                        <div class="footer-cont" style="height:14%;margin-top:0px;">
                            <span class="left-arrow">
                                <?php if ($pageno != 1) { ?>
                                    <a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo GetChapternoFromPageno($bookid, $prepage); ?>&pageno=<?php echo $prepage; ?>');">
                                        <img src="images/left-arrow.png" />
                                    </a>
                                <?php } else { ?>
                                    <a href="javascript:void(0);" data-ajax="false"><img src="images/left-arrow.png" /></a>
                                <?php } ?>
                            </span>
                            <div class="pagination">
                                <?php
                                $start_page = $pageno - 1;
                                $end_page = $pageno + 2;
                                if ($end_page > $total_page) {
                                    $end_page = $total_page;
                                }

                                $start_page = $end_page - 3;
                                if ($start_page < 1) {
                                    $start_page = 1;
                                }
                                $end_page = $start_page + 3;
                                if ($end_page > $total_page) {
                                    $end_page = $total_page;
                                }

                                if ($nxtpage > $total_page) {
                                    $nxtpage = $total_page;
                                }

                                //for($i=0;$i<$total_page;$i++){ 
                                $start_loop = ($start_page - 1); 
                                for ($i = $start_loop; $i < $end_page; $i++) {
                                    if ($pageno == $res[$i]['tbl_page_no']) {
                                       echo $pageno;
                                    } else {
                                        ?>   
                                           <a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo $res[$i]['tbl_page_chid']; ?>&pageno=<?php echo $res[$i]['tbl_page_no']; ?>');"><?php echo $res[$i]['tbl_page_no']; ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <span class="right-arrow">
                                <?php if ($pageno >= $total_page) { ?>
                                    <a href="javascript:void(0);" data-ajax="false"><img src="images/right-arrow.png" /></a>
                                <?php } else { ?> 
                                    <a href="javascript:void(0);" data-ajax="false" onClick="return redirect_page('chapter.php?chid=<?php echo GetChapternoFromPageno($bookid, $nxtpage); ?>&pageno=<?php echo $nxtpage; ?>');"><img src="images/right-arrow.png" /></a>
                                <?php } ?>
                            </span>
                            <div class="cls"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pop-up" id="content_popup">
          	<div class="pop-top"></div>
           <div class="pop-midd">
          	<ul>
            	<li class="pop-icon1"><a href="#"><span></span><label>-lets you mark a sections of readings with icons.</label><div class="cls"></div></a>
                <li class="pop-icon2"><a href="#"><span></span><label>-let's you bookmark where you left off in your readings</label><div class="cls"></div></a>
                <li class="pop-icon3"><a href="#"><span></span><label>-let's you highlight section of text.</label><div class="cls"></div></a>
                <li class="pop-icon4"><a href="#"><span></span><label>-let's you search for keywords in the text.</label><div class="cls"></div></a>
                <li class="pop-icon5"><a href="#"><span></span><label>-let's you take notes about and part or the text.</label><div class="cls"></div></a>
                <li class="pop-icon6"><a href="#"><span></span><label>-let's you share/email any part of the text.</label><div class="cls"></div></a>
                <li class="pop-icon7"><a href="#"><span></span><label>-let's you set reminders to help you through the course.</label><div class="cls"></div></a>
                <li class="pop-icon8"><a href="#"><span></span><label>-tells you about the tools.</label><div class="cls"></div></a> 
            </ul>
            </div> 
          </div>
 
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
			
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
				     if($('#content_popup').css('display') == 'none'){
					    $('#content_popup').show(); 
					 } else {
					    $('#content_popup').hide(); 
					 }
				});
				$('.ui-content').css("overflow-y",'hidden'); 
                $(".second_topmenu").click(function() {                          
        
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
                            if(iconno[0] == 'h'){
                                iconno = iconno.substring(1);
                                var icon_type = 'heart';
								var drag_icon = $('.icon2').position();
								 var icon_left = (drag_area.left + drag_icon.left);		 
								 if(record_db == "1"){
								    $(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    $(el).animate({'left':'-129px'},2000); //1000 = 1second
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
								    $(el).animate({'left':'11px'},2000); //1000 = 1second
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
								    $(el).animate({'left':'-274px'},2000); //1000 = 1second
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
								    $(el).animate({'left':'-414px'},2000); //1000 = 1second
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
							        $(el).animate({'left':'-554px'},2000); //1000 = 1second
                                 }
							}
                            else {
                                var icon_type = 'bookmark'; 
								if(record_db == "1"){
								    //$( this ).addClass('active'); 
									$(el).animate({'left':'0px'},2000); //1000 = 1second
								 } else {
								    $(el).animate({'left':'-647px'},2000,function(){
									    $(el).css({backgroundSize:'60% 60%'})
									}); //1000 = 1second
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
							
							
				            
							
                            var url = "icon_insert.php?pageno=<?php echo $pageno; ?>&chid=<?php echo $chid; ?>&chno=<?php echo $chno; ?>&bookid=<?php echo $bookid; ?>&topposition="+topposition+"&iconno="+iconno+"&icon_type="+icon_type;
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
		  		 
            });
            function redirect_page(str){
                location.href = str;
            }
		   
            function select_highlight(){
                $("#content_area").removeClass("unselectable");   
                $('#content_area').mousedown(function() {
                    $('#content_area').mouseup(function() {   
                        if(window.getSelection) {  
                            var SelText = window.getSelection();
                            if(SelText != ''){
                                var url = "highlighted_icon_insert.php?pageno=<?php echo $pageno; ?>&chid=<?php echo $chid; ?>&chno=<?php echo $chno; ?>&bookid=<?php echo $bookid; ?>&content="+SelText;
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
                                    //var content_ch1 = content_ch.replace(/content/g, '<span class="background-yello">'+SelText+'</span>');
                                    var content_ch1 = content_ch.replace(new RegExp('(' + SelText + ')', 'g'), '<span class="background-yello">'+SelText+'</span>');
                                    $('#content_area').html(content_ch1); 
                                }
                            }
                        }
                    });
                });
            }
		   
        </script>
    </body>
</html>
