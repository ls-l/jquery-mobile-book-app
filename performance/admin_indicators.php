<?php
  include "./includes/header.php";
  if(isset($_SESSION['auid'])) {
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
	
	$nav = "<a href='./dimensions.php'>".$dim_name."</a> -> <a href='./dimensions.php'>".$sub_name."</a> -> Indicators";
	?>
	
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
				
				$task_count = 1;
				$tr_code = "<tr>";
				$tr_code .= "<td valign='top'><table><tr><td valign='top'>".$cat.".".$count."</td><td>".$indic['name']."<br />";
				$tr_code .= $stat_code."</td></tr></table></td>";
				$tr_code .= "<td>";
				
					$rr = mysql_query("SELECT * FROM tasks WHERE indicator_id = '".$indic['id']."'");					
					if(mysql_num_rows($rr) > 0) {
						$tr_code .= "<table width='100%'>";
						while($task = mysql_fetch_array($rr)) {							
							
							$tr_code .= "<tr>";
							$tr_code .= "<td valign='top' width='30'>".$cat.".".$count.".".$task_count." </td>
										<td><a href='admin_tasks.php?task_id=".$task['id']."&cat=".$cat."&ind=".$count."&task=".$task_count."' title='View Task'>".$task['name']."</a></td>";
							$tr_code .= "</tr>";
							$task_count++;
						}
						$tr_code .= "<tr>";
						$tr_code .= "<td valign='top' width='30'>".$cat.".".$count.".".$task_count." </td>
									<td><a href='add_task.php?ind_id=".$indic['id']."&sub_id=".$sub_id."&cat=".$cat."'>Add Task...</a></td>";
						$tr_code .= "</tr>";
						$tr_code .= "</table>";
					}	
					else {
						$tr_code .= "<table width='100%'>";
						$tr_code .= "<tr>";
						$tr_code .= "<td valign='top' width='30'>".$cat.".".$count.".".$task_count." </td>
									<td><a href='add_task.php?ind_id=".$indic['id']."&sub_id=".$sub_id."&cat=".$cat."'>Add Task...</a></td>";
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