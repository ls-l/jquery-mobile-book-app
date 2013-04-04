<?php
include "./includes/header.php";

$user_id = $_GET['user_id'];

if (isset($_SESSION['uid']) || !empty($user_id)) {

    $uid = $_SESSION['uid'];
    if ((isset($_SESSION['auid']) || isset($_SESSION['muid'])) && !empty($user_id)) {
        $uid = $user_id;
        $admin_code = "user_id=" . $user_id;
    }

    $task_id = addslashes($_GET['task_id']);
    $cat = addslashes($_GET['cat']);
    $ind = addslashes($_GET['ind']);
    $task_num = addslashes($_GET['task']);

    $res = mysql_query("SELECT * FROM tasks WHERE id = " . $task_id . "");
    if ($task = mysql_fetch_array($res)) {

        $res = mysql_query("SELECT * FROM indicators WHERE id = '" . $task['indicator_id'] . "'");
        if ($sub = mysql_fetch_array($res)) {
            $ind_name = $sub['name'];
            $sub_id = $sub['dimension_sub_id'];
        }
        $res = mysql_query("SELECT * FROM dimension_sub WHERE id = '" . $sub_id . "'");
        if ($sub = mysql_fetch_array($res)) {
            $sub_name = $sub['name'];
            $dimension_id = $sub['dimension_id'];
        }
        $res = mysql_query("SELECT * FROM dimensions WHERE id = '" . $dimension_id . "'");
        if ($sub = mysql_fetch_array($res)) {
            $dim_name = $sub['name'];
        }

        $nav = "<a href='./index.php?" . $admin_code . "'>" . $dim_name . "</a> -> <a href='./index.php?" . $admin_code . "'>" . $sub_name . "</a> -> <a href='./indicators.php?sub_id=" . $sub_id . "&cat=" . $cat . "&" . $admin_code . "'>" . $ind_name . "</a> -> " . $task['name'];
        ?>
        <style>
            .datatables_length {
                display: none;
            }
        </style>

        <script>

            $(document).ready(function(){
                $('#swfupload-control').swfupload({
                    <?php /*?>upload_url: "./includes/upload-file.php?uid=<? echo $uid; ?>&task_id=<? echo $_SESSION['task_id']; ?>",<?php */?>
					upload_url: "./includes/upload-file.php?uid=<? echo $uid; ?>&task_id=<? echo $task_id; ?>",
                    file_post_name: 'uploadfile',
                    file_size_limit : "1024",
                    file_types : "*.doc;*.docx;*.txt;*.rtf;*.pdf;*.jpg;*.png;*.gif",
                    file_types_description : "Evidence files",
                    file_upload_limit : 20,
                    flash_url : "swfupload/swfupload.swf",
                    button_image_url : 'swfupload/wdp_buttons_upload_114x29.png',
                    button_width : 114,
                    button_height : 29,
                    button_placeholder : $('#button')[0],
                    debug: false
                })  	    	  
                .bind('fileQueued', function(event, file){
                    var listitem='<li id="'+file.id+'" >'+
                        'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
                        '<div class="progressbar" ><div class="progress" ></div></div>'+
                        '<p class="status" >Pending</p>'+
                        '<span class="cancel" >&nbsp;</span>'+
                        '</li>';
                    $('#log').append(listitem);
                    $('li#'+file.id+' .cancel').bind('click', function(){
                        var swfu = $.swfupload.getInstance('#swfupload-control');
                        swfu.cancelUpload(file.id);
                        $('li#'+file.id).slideUp('fast');
                    });
                    // start the upload since it's queued
                    $(this).swfupload('startUpload');
                })
                .bind('fileQueueError', function(event, file, errorCode, message){
                    alert('Size of the file "'+file.name+'" is greater than limit');
                })
                .bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
                    $('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
                })
                .bind('uploadStart', function(event, file){
                    $('#log li#'+file.id).find('p.status').text('Uploading...');
                    $('#log li#'+file.id).find('span.progressvalue').text('0%');
                    $('#log li#'+file.id).find('span.cancel').hide();
                })
                .bind('uploadProgress', function(event, file, bytesLoaded){
                    //Show Progress
                    var percentage=Math.round((bytesLoaded/file.size)*100);
                    $('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
                    $('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
                })
                .bind('uploadSuccess', function(event, file, serverData){
                    var item=$('#log li#'+file.id);
                    item.find('div.progress').css('width', '100%');
                    item.find('span.progressvalue').text('100%');
                    item.addClass('success').find('p.status').html('Done!');
                })
                .bind('uploadComplete', function(event, file){
                    // upload has completed, try the next one in the queue
                    $(this).swfupload('startUpload');
                })
            });
        	
            function statusChanged() {
                var status = document.getElementById('status').value;
                var uid = <? echo $uid; ?>;
                var task_id = <? echo $task_id; ?>;
                $("#sub").html('<img src="./images/loading.gif" alt="Loading..." />');	
                $.post("./includes/update_status.php", {						
                    uid:uid,
                    task_id:task_id,
                    status:status
                }, function(data){
                    if(data){
                        if(data == "success") {
                            $("#sub").html('Done');	
                        }
                        else {
                            $("#sub").html(data);	
                        }			
                    }
                });
            }
        <?
        if (isset($_SESSION['muid']) || isset($_SESSION['auid'])) {
            ?>
                        function scoreChanged() {
                            var score = document.getElementById('score').value;
                            var uid = <? echo $uid; ?>;
                            var task_id = <? echo $task_id; ?>;
                            $("#sub2").html('<img src="./images/loading.gif" alt="Loading..." />');	
                            $.post("./includes/update_score.php", {						
                                uid:uid,
                                task_id:task_id,
                                score:score
                            }, function(data){
                                if(data){
                                    if(data == "success") {
                                        $("#sub2").html('Done');	
                                    }
                                    else {
                                        $("#sub2").html(data);	
                                    }			
                                }
                            });
                        }
            <?
        }
        ?>
        
        <?
        if (isset($_SESSION['uid']) or (isset($_SESSION['auid']) and isset($_REQUEST['user_id']))) {
            ?>
                        function self_scoreChanged(uid) {
                            var score = document.getElementById('score_self').value;
							var task_id = <? echo $task_id; ?>;
                            $("#sub3").html('<img src="./images/loading.gif" alt="Loading..." />');	
                            $.post("./includes/update_self_score.php", {						
                                uid:uid,
                                task_id:task_id,
                                score:score
                            }, function(data){
                                if(data){
                                    if(data == "success") {
                                        $("#sub3").html('Done');	
                                    }
                                    else {
                                        $("#sub3").html(data);	
                                    }			
                                }
                            });
                        }
            <?
        }
        ?>
        
        </script>

        <table width="100%">
            <tr>
                <td colspan="2"><a href="./index.php"><img src="./images/logo.png" /></a></td>
            </tr>
            <tr>
                <td><? include "./includes/navigation.php"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $nav; ?></td>
                <td align="right"><a href="./logout.php" title="Logout"><img src="./images/logout.png" width="30" border="0" /></a></td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" class="display" id="table">
            <thead>
                <tr>
                    <th>Task - <? echo $task['name']; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="gradeX">
                    <td>
                        <table width="100%" border="0">
                            <tr>
                                <td valign="top" width="80%">
                                    <table border="1" width="100%">
                                        <tr>
                                            <td colspan="5" width="18%">
                                                <strong>Role Title:</strong> Teacher<br />
                                                <strong>Dimension:</strong> Professional Knowledge
                                            </td>	
                                            <td colspan="1" width="17%"><strong>Code:</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <strong>Task/Skill/Competency:</strong> <? echo $task['name']; ?>
                                            </td>	
                                            <td colspan="1"><strong>Code:</strong> <? echo $cat; ?>.<? echo $ind; ?>.<? echo $task_num; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" width="50%" align="center"><strong>Conditions and Supports</strong></td>	
                                            <td colspan="3" width="50%" align="center"><strong>Criteria/Standards</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" valign="top">Given the following:<br /><br /><? echo $task['conditions']; ?></td>	
                                            <td colspan="3" valign="top">Performance is acceptable when:<br /><br /><? echo $task['criteria']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><strong>Notes:</strong><br /><br /><? echo $task['notes']; ?></td>	
                                        </tr>
                                        <tr>
                                            <td colspan="3"><strong>Importance rating:</strong><br />
                                                <?
                                                if ($task['importance'] > 0 && $task['importance'] < 6) {
                                                    echo "<img src='./images/num_" . $task['importance'] . ".png' />";
                                                } else {
                                                    echo "<img src='./images/num.png' />";
                                                }
                                                ?>
                                            </td>	
                                            <td colspan="3"><strong>Difficulty Rating:</strong><br />
        <?
        if ($task['difficulty'] > 0 && $task['difficulty'] < 6) {
            echo "<img src='./images/num_" . $task['difficulty'] . ".png' />";
        } else {
            echo "<img src='./images/num.png' />";
        }
        ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="20%">
                                    <table>
                                        <tr>
                                            <td>
                                                <h3>Task Progress</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Task Status:</strong><br />
                                                Please select task status: 
        <?
        $status_res = mysql_query("SELECT status FROM staff_progress WHERE uid = '" . $uid . "' AND task_id = '" . $task_id . "'");
        if ($stat = mysql_fetch_array($status_res)) {
            $complete = false;
            if ($stat['status'] == 1) {
                $complete = true;
            }
        }
        ?>
                                                <select id="status" onchange="statusChanged();">
                                                    <option value="0" <? echo $sel = ($complete) ? "" : "selected" ?>>Not Complete</option>
                                                    <option value="1" <? echo $sel = ($complete) ? "selected" : "" ?>>Complete</option>
                                                </select>
                                                <div id="sub" style="display:inline;"></div>
                                            </td>
                                        </tr>
        <?
        if (isset($_SESSION['muid']) || isset($_SESSION['auid'])) {
			?>
                                            <tr>
                                                <td>
                                                    <strong>Appraiser Score:</strong><br />
                                                    Please select a score (1-4): 
            <?
            $status_res = mysql_query("SELECT score FROM task_score WHERE uid = '" . $uid . "' AND task_id = '" . $task_id . "'");
            if ($stat = mysql_fetch_array($status_res)) {
                $score = 0;
                $score = $stat['score'];
            }
            ?>
                                                    <select id="score" onchange="scoreChanged();">
                                                        <option value="0" <? echo $sel = ($score == 0) ? "selected" : "" ?>>0</option>
                                                        <option value="1" <? echo $sel = ($score == 1) ? "selected" : "" ?>>1</option>
                                                        <option value="2" <? echo $sel = ($score == 2) ? "selected" : "" ?>>2</option>
                                                        <option value="3" <? echo $sel = ($score == 3) ? "selected" : "" ?>>3</option>
                                                        <option value="4" <? echo $sel = ($score == 4) ? "selected" : "" ?>>4</option>
                                                    </select>
                                                    <div id="sub2" style="display:inline;"></div>
                                                </td>
                                            </tr>
				<?php 
				  if(isset($_SESSION['auid']) and $_SESSION['auid'] != '' and isset($_REQUEST['user_id']) != '' and $_REQUEST['user_id'] != ''){
				  
				  
				  }
				?>							
					<tr>
                                                <td>
                                                    <strong>Self Appraiser Score:</strong><br />
                                                    Please select a score (1-4): 
            <?
            $self_status_res = mysql_query("SELECT score FROM task_score_commonuser WHERE uid = '" . $_REQUEST['user_id'] . "' AND task_id = '" . $_REQUEST['task_id'] . "'");
            $count_reco = mysql_num_rows($self_status_res);
            if($count_reco > 0) {
              if ($stat = mysql_fetch_array($self_status_res)) {
                $score = $stat['score'];
              }    
            } else {
                $score = 0;
            }
            
            ?>
                                                    <select id="score_self" onchange="self_scoreChanged(<?php echo $_REQUEST['user_id']; ?>);">
                                                        <option value="1" <? echo $sel = ($score == 0) ? "selected" : "" ?>>0</option>
                                                        <option value="1" <? echo $sel = ($score == 1) ? "selected" : "" ?>>1</option>
                                                        <option value="2" <? echo $sel = ($score == 2) ? "selected" : "" ?>>2</option>
                                                        <option value="3" <? echo $sel = ($score == 3) ? "selected" : "" ?>>3</option>
                                                        <option value="4" <? echo $sel = ($score == 4) ? "selected" : "" ?>>4</option>
                                                    </select>
                                                    <div id="sub3" style="display:inline;"></div>
                                                </td>
                                            </tr>						
											
                <?
        } else {
            ?>
                                            <tr>
                                                <td>
                                                    <strong>Appraiser Score:</strong><br />
                                            <?
                                            
                                            $status_res = mysql_query("SELECT score FROM task_score WHERE uid = '" . $uid . "' AND task_id = '" . $task_id . "'");
                                            $score = 0;
                                            if ($stat = mysql_fetch_array($status_res)) {
                                                $score = $stat['score'];
                                            }
                                            echo $score . " / 4"
                                            ?>									
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Self Appraiser Score:</strong><br />
                                                    Please select a score (1-4): 
            <?
            $self_status_res = mysql_query("SELECT score FROM task_score_commonuser WHERE uid = '" . $_SESSION['uid'] . "' AND task_id = '" . $task_id . "'");
            $count_reco = mysql_num_rows($self_status_res);
            if($count_reco > 0) {
              if ($stat = mysql_fetch_array($self_status_res)) {
                $score = $stat['score'];
              }    
            } else {
                $score = 0;
            }
            
            ?>
                                                    <select id="score_self" onchange="self_scoreChanged(<? echo $_SESSION['uid']; ?>);">
                                                        <option value="1" <? echo $sel = ($score == 0) ? "selected" : "" ?>>0</option>
                                                        <option value="1" <? echo $sel = ($score == 1) ? "selected" : "" ?>>1</option>
                                                        <option value="2" <? echo $sel = ($score == 2) ? "selected" : "" ?>>2</option>
                                                        <option value="3" <? echo $sel = ($score == 3) ? "selected" : "" ?>>3</option>
                                                        <option value="4" <? echo $sel = ($score == 4) ? "selected" : "" ?>>4</option>
                                                    </select>
                                                    <div id="sub3" style="display:inline;"></div>
                                                </td>
                                            </tr>
            <?
        }
        ?>
                                        <tr>
                                            <td>
                                                <strong>Evidence:</strong><br />
                                        <?
                                        $r = mysql_query("SELECT evidence FROM staff_progress WHERE uid = '" . $uid . "' AND task_id = '" . $task_id . "'");
                                        if ($evi = mysql_fetch_array($r)) {
                                            $eids = explode(",", $evi['evidence']);
                                            foreach ($eids as $eid) {
                                                // Find evidence url from ID
                                                $rr = mysql_query("SELECT * FROM evidence WHERE id = '" . $eid . "'");
                                                if ($ee = mysql_fetch_array($rr)) {
                                                    $doc = explode(".", $ee['url']);
                                                    if (end($doc) == "jpg" || end($doc) == "png" || end($doc) == "gif") {
                                                        echo "<a href='" . $ee['url'] . "'><img src='./images/picture.png' width='40' /></a>";
                                                    } else {
                                                        echo "<a href='" . $ee['url'] . "'><img src='./images/docu.png' width='40' /></a>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="swfupload-control">
                                                    <p>Upload upto 20 document files as evidence for this task (.doc, .docx, .txt, .rtf, .pdf, .jpg, .png;, .gif, .txt). Each having maximum size of 1MB</p>
                                                    <input type="button" id="button" />
                                                    <p id="queuestatus" ></p>
                                                    <ol id="log"></ol>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?
    } else {
        echo "Task does not exist.";
    }
    ?>

    </body>
    </html>
    <?
} else {
    header('Location: ./login.php');
}
?>