<?php
  include "./includes/header.php";
  
  $user_id = $_GET['user_id'];
  
  if(isset($_SESSION['uid']) || !empty($user_id)) {
  
	$uid = $_SESSION['uid'];
	if((isset($_SESSION['auid']) || isset($_SESSION['muid'])) && !empty($user_id)) {
		$uid = $user_id;
		$admin_code = "user_id=".$user_id;
	}
  
	$sub_id = addslashes($_GET['sub_id']);
	$cat = addslashes($_GET['cat']);

	$res = mysql_query("SELECT * FROM dimension_sub WHERE id = '".$sub_id."'");
	if($sub = mysql_fetch_array($res)) {
		$sub_name = $sub['name'];
		$dimension_id = $sub['dimension_id'];
	}
	$res = mysql_query("SELECT * FROM dimensions WHERE id = '".$dimension_id."'");
	if($sub = mysql_fetch_array($res)) {
		$dim_name = $sub['name'];
	}
	
	$nav = "<a href='./index.php?".$admin_code."'>".$dim_name."</a> -> <a href='./index.php?".$admin_code."'>".$sub_name."</a> -> Indicators";
	?>
	
	<script>
		function statusChanged(ind_id) {
			var status = document.getElementById('status'+ind_id).value;
			var uid = <? echo $uid; ?>;
			var ind_id = ind_id;
			$("#sub"+ind_id).html('<img src="./images/loading.gif" alt="Loading..." />');	
			$.post("./includes/update_ind_status.php", {						
				uid:uid,
				ind_id:ind_id,
				status:status
			}, function(data){
				if(data){
					var strings = data.split("-");
					if(strings[0] == "success") {
						if(strings[1] == "1") {
							$("#sub"+ind_id).html("<img src='./images/tick.jpg' width='20' />");
							$("#prog"+ind_id).html("<div id='progressbar'><div id='asas' style='width: 100%;'>1/1</div><div>");
						}
						else {
							$("#sub"+ind_id).html("");
							$("#prog"+ind_id).html("<div id='progressbar'><div id='asas' style='width: 0%;'>0/0</div><div>");
						}						
					}
					else {
						$("#sub"+ind_id).html(data);	
						$("#prog"+ind_id).html("<div id='progressbar'><div id='asas' style='width: 0%;'>0/0</div><div>");
					}			
				}
			});
		}
	</script>
	
	<table width="100%" border="0">
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
				<th>Indicator</th>
				<th>Tasks</th>
			</tr>
		</thead>
		<tbody>
			<?
			// ---  Start indicator/task population --- 
			$res = mysql_query("SELECT * FROM indicators WHERE dimension_sub_id = '".$sub_id."'");
			$count = 1;
			while($indic = mysql_fetch_array($res)) {
				
				$r = mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$indic['id']."'");
				
				// --- Start completed task count ---
				$num_tasks = mysql_num_rows(mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$indic['id']."'"));
				$num_comp_tasks = 0;
				$stat_code = "";
				if($num_tasks > 0) {
					while($task = mysql_fetch_array($r)) {
						$status = mysql_query("SELECT status FROM staff_progress WHERE uid = '".$uid."' AND task_id = '".$task['id']."'");
						if($stat = mysql_fetch_array($status)) {							
							if($stat['status'] == 1) {
								$num_comp_tasks++;
							}
						}
					}
					// --- Start percentage of tasks ---
					$perc = ($num_comp_tasks/$num_tasks)*100;
					// --- End percentage of tasks ---
					$stat_code .= "<div id='prog".$indic['id']."'><div id='progressbar'><div id='asas' style='width: ".$perc."%;'>".$num_comp_tasks."/".$num_tasks."</div><div><div>";					
				}
				else {
					// Indicator has no tasks
					$status = mysql_query("SELECT status FROM staff_ind_progress WHERE uid = '".$uid."' AND ind_id = '".$indic['id']."'");
					if($stat = mysql_fetch_array($status)) {							
						if($stat['status'] == 1) {
							$stat_code .= "<div id='prog".$indic['id']."'><div id='progressbar'><div id='asas' style='width: 100%;'>1/1</div><div><div>";								
						}
						else {
							$stat_code .= "<div id='prog".$indic['id']."'><div id='progressbar'><div id='asas' style='width: 0%;'>0/1</div><div><div>";	
						}
					}
					else {
						$stat_code .= "<div id='prog".$indic['id']."'><div id='progressbar'><div id='asas' style='width: 0%;'>0/1</div><div><div>";	
					}
				}				
									
				// --- End completed task count ---
				
				$task_count = 1;
				$tr_code = "<tr>";
				$tr_code .= "<td valign='top'><table><tr><td valign='top'>".$cat.".".$count."</td><td>".$indic['name']."<br />";
				$tr_code .= $stat_code."</td></tr></table></td>";
				$tr_code .= "<td>";
				
					$rr = mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$indic['id']."'");					
					if(mysql_num_rows($rr) > 0) {
						$tr_code .= "<table width='100%'>";
						while($task = mysql_fetch_array($rr)) {	
							
							// --- Start Look for task completion ---
							$status = mysql_query("SELECT status FROM staff_progress WHERE uid = '".$uid."' AND task_id = '".$task['id']."'");
							$td = "";
							if($stat = mysql_fetch_array($status)) {							
								if($stat['status'] == 1) {
									$td = "<img src='./images/tick.jpg' width='20' />";
								}
							}
							// --- End Look for task completion ---
							$admin_code = "";
							if(!empty($user_id)) {
								$admin_code = "&user_id=".$user_id;
							}
							$tr_code .= "<tr>";
							$tr_code .= "<td valign='top' width='30'>".$cat.".".$count.".".$task_count." </td>
										<td><a href='task.php?task_id=".$task['id']."&cat=".$cat."&ind=".$count."&task=".$task_count."".$admin_code."' title='View Task'>".$task['name']."</a></td>	
										<td align='right'>".$td."</td>";
							$tr_code .= "</tr>";
							$task_count++;
						}
						$tr_code .= "</table>";
					}	
					else {
						$td = "";
						$options = "<option value='0' selected>Not Complete</option>
									<option value='1'>Complete</option>";
						$status = mysql_query("SELECT status FROM staff_ind_progress WHERE uid = '".$uid."' AND ind_id = '".$indic['id']."'");
						if($stat = mysql_fetch_array($status)) {							
							if($stat['status'] == 1) {
								$td = "<img src='./images/tick.jpg' width='20' />";
								$options = "<option value='0'>Not Complete</option>
											<option value='1' selected>Complete</option>";
							}
						}
						$tr_code .= "<table width='100%'>";
						$tr_code .= "<tr>";
						$tr_code .= "<td valign='top'>
									<select id='status".$indic['id']."' onchange='statusChanged(".$indic['id'].");'>
										".$options."
									</select>									
									</td><td align='right'><div id='sub".$indic['id']."' style='display:inline;'>".$td."</div></td>";
						$tr_code .= "</tr>";
						$tr_code .= "</table>";
					}
				
					
				
				$tr_code .= "</td>";
				$tr_code .= "</tr>";				
				echo $tr_code;
				$count++;
			}
			// ---  End dimension population --- 
			?>
		</tbody>
	</table>
</body>
</html>
<?
	}
	else {
		header('Location: ./login.php');
	}
?>