<?php
  include "./includes/header.php";
  
  $user_id = $_GET['user_id'];
  
  if(isset($_SESSION['uid']) || !empty($user_id)) {
  
	$uid = $_SESSION['uid'];
	if((isset($_SESSION['auid']) || isset($_SESSION['muid'])) && !empty($user_id)) {
		$uid = $user_id;
	}
?>	
	<table width="100%">
		<tr>
			<td colspan="2"><a href="./index.php"><img src="./images/logo.png" /></a></td>
		</tr>
		<tr>
			<td>
				<? include "./includes/navigation.php"; ?>
			</td>
			<td align="right"><a href="./logout.php" title="Logout"><img src="./images/logout.png" width="30" border="0" /></a></td>
		</tr>
	</table>
		
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="table">
		<thead>
			<tr>
				<th>Dimension</th>
				<th>Dimension Categories</th>
			</tr>
		</thead>
		<tbody>
			<?
			// ---  Start dimension population --- 
			$res = mysql_query("SELECT * FROM dimensions");
			$count = 1;
			while($dimension = mysql_fetch_array($res)) {
				$tr_code = "<tr>";
				
				// Get complete numbers (pretty much repeat code)
				$complete = check_complete($dimension);
				$com_num = explode("/", $complete);
				$percent = ($com_num[0]/$com_num[1])*100;
				
				$tr_code .= "<td valign='top'><table><tr><td valign='top' width='10'>".$count.". </td><td>".$dimension['name']."</td></tr>
							<tr><td colspan='2'><div id='progressbar'><div id='asas' style='width: ".$percent."%;'>".$complete."</div><div></td></tr></table></td>";
				$tr_code .= "<td>";
				$r = mysql_query("SELECT * FROM dimension_sub WHERE dimension_id = '".$dimension['id']."'");
				$sub_count = 1;
				
					$tr_code .= "<table width='100%'>";
					while($dimension_sub = mysql_fetch_array($r)) {	
						// --- Start complete check ---
						$total_inds = 0;
						$total_complete_inds = 0;
						$rr = mysql_query("SELECT * FROM indicators WHERE dimension_sub_id = '".$dimension_sub['id']."'");
						while($ind = mysql_fetch_array($rr)) {
							$total_inds++;
							$rrr = mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$ind['id']."'");
							$num_tasks = mysql_num_rows($rrr);
							$total_tasks = 0;
							$total_complete_tasks = 0;
							if($num_tasks > 0) {								
								$total_tasks += $num_tasks;
								while($task = mysql_fetch_array($rrr)) {
									$status = mysql_query("SELECT status FROM staff_progress WHERE uid = '".$uid."' AND task_id = '".$task['id']."'");
									if($stat = mysql_fetch_array($status)) {							
										if($stat['status'] == 1) {
											$total_complete_tasks++;
										}
									}
								}
								if($total_complete_tasks == $total_tasks) {
									$total_complete_inds++;
								}
							}
							else {
								// Indicator has no tasks
								$status = mysql_query("SELECT status FROM staff_ind_progress WHERE uid = '".$uid."' AND ind_id = '".$ind['id']."'");
								if($stat = mysql_fetch_array($status)) {							
									if($stat['status'] == 1) {
										$total_complete_inds++;								
									}
								}
							}
							
						}
						// --- End complete check ---
						$tr_code .= "<tr>";
						$admin_code = "";
						if(!empty($user_id)) {
							$admin_code = "&user_id=".$user_id;
						}
						$tr_code .= "<td valign='top' width='30'>".$count.".".$sub_count.". </td>
									<td><a href='indicators.php?sub_id=".$dimension_sub['id']."&cat=".$count.".".$sub_count."".$admin_code."' title='View Indicators'>".$dimension_sub['name']."</a></td>
									<td align='right'>";
						$tr_code .= ($total_complete_inds == $total_inds) ? "<img src='./images/tick.jpg' width='20' />" : "";
						$tr_code .= "</td>";						
						$tr_code .= "</tr>";
						$sub_count++;
					}
					$tr_code .= "</table>";
				
				$tr_code .= "</td></tr>";				
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
	
	function check_complete($dimension) {
		// --- Start complete check ---
		$tt = mysql_query("SELECT * FROM dimension_sub WHERE dimension_id = '".$dimension['id']."'");
		$total_sub = 0;
		$total_complete_sub = 0;
		while($dimension_sub = mysql_fetch_array($tt)) {	
			$total_sub++;
			$total_inds = 0;
			$total_complete_inds = 0;
			$rr = mysql_query("SELECT * FROM indicators WHERE dimension_sub_id = '".$dimension_sub['id']."'");
			while($ind = mysql_fetch_array($rr)) {
				$total_inds++;
				$rrr = mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$ind['id']."'");
				$num_tasks = mysql_num_rows($rrr);
				$total_tasks = 0;
				$total_complete_tasks = 0;
				if($num_tasks > 0) {								
					$total_tasks += $num_tasks;
					while($task = mysql_fetch_array($rrr)) {
						$status = mysql_query("SELECT status FROM staff_progress WHERE uid = '".$uid."' AND task_id = '".$task['id']."'");
						if($stat = mysql_fetch_array($status)) {							
							if($stat['status'] == 1) {
								$total_complete_tasks++;
							}
						}
					}
					if($total_complete_tasks == $total_tasks) {
						$total_complete_inds++;
					}
				}
				else {
					// Indicator has no tasks
					$status = mysql_query("SELECT status FROM staff_ind_progress WHERE uid = '".$uid."' AND ind_id = '".$ind['id']."'");
					if($stat = mysql_fetch_array($status)) {							
						if($stat['status'] == 1) {
							$total_complete_inds++;								
						}
					}
				}
				
			}
			if($total_complete_inds == $total_inds) {
				$total_complete_sub++;
			}
		}
		// --- End complete check ---
		return $total_complete_sub."/".$total_sub;		
	}
?>