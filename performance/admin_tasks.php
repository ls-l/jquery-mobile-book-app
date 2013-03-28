<?php
	include "./includes/header.php";
	if(isset($_SESSION['auid'])) {		

	$task_id = addslashes($_GET['task_id']);
	$cat = addslashes($_GET['cat']);
	$ind = addslashes($_GET['ind']);
	$task_num = addslashes($_GET['task']);

	$res = mysql_query("SELECT * FROM tasks WHERE id = ".$task_id."");
	if($task = mysql_fetch_array($res)) {
  
		$res = mysql_query("SELECT * FROM indicators WHERE id = '".$task['indicator_id']."'");
		if($sub = mysql_fetch_array($res)) {
			$ind_name = substr($sub['name'],0,40)."...";
			$sub_id = $sub['dimension_sub_id'];
		}
		$res = mysql_query("SELECT * FROM dimension_sub WHERE id = '".$sub_id."'");
		if($sub = mysql_fetch_array($res)) {
			$sub_name = $sub['name'];
			$dimension_id = $sub['dimension_id'];
		}
		$res = mysql_query("SELECT * FROM dimensions WHERE id = '".$dimension_id."'");
		if($sub = mysql_fetch_array($res)) {
			$dim_name = $sub['name'];
		}

		$nav = "<a href='./dimensions.php'>".$dim_name."</a> -> <a href='./dimensions.php'>".$sub_name."</a> -> <a href='./admin_indicators.php?sub_id=".$sub_id."&cat=".$cat."'>".$ind_name."</a> -> ".$task['name'];
  
?>
<style>
.datatables_length {
	display: none;
}
</style>

<script>

function delete_task() {
	var del = confirm("Are you sure you want to delete this task?");
	if(del) {
		var task_id = <? echo $task_id; ?>;
		$.post("./includes/delete_task.php", {						
			task_id:task_id          		
		}, function(data){
			if(data){
				if(data == "success") {
					window.location = "./admin_indicators.php?sub_id=<? echo $sub_id; ?>&cat=<? echo $cat; ?>";
				}
				else {
					alert(data);
				}			
			}
		});
	}	
}

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
					<td align="right"><a href="edit_task.php?id=<? echo $task_id; ?>&cat=<? echo $cat; ?>&ind=<? echo $_GET['ind']; ?>&task=<? echo $_GET['task']; ?>"><img src="./images/edit.png" title="Edit" width="20" /></a>&nbsp;&nbsp;
						<a href="#" onclick="delete_task();"><img src="./images/delete.png" title="Delete" width="20" /></a></td>
				</tr>
				<tr>
					<td valign="top" width="100%">
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
								<td colspan="3" valign="top">Given the following:<br /><? echo $task['conditions']; ?></td>	
								<td colspan="3" valign="top">Performance is acceptable when:<br /><? echo $task['criteria']; ?></td>
							</tr>
							<tr>
								<td colspan="6"><strong>Notes:</strong><br /><? echo $task['notes']; ?></td>	
							</tr>
							<tr>
								<td colspan="3"><strong>Importance rating:</strong><br />
								<?
									if($task['importance'] > 0 && $task['importance'] < 6) {
										echo "<img src='./images/num_".$task['importance'].".png' />";
									}
									else {
										echo "<img src='./images/num.png' />";
									}
								?>
								</td>	
								<td colspan="3"><strong>Difficulty Rating:</strong><br />
								<?
									if($task['difficulty'] > 0 && $task['difficulty'] < 6) {
										echo "<img src='./images/num_".$task['difficulty'].".png' />";
									}
									else {
										echo "<img src='./images/num.png' />";
									}
								?>
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
	}
	else {
		echo "Task does not exist.";
	}
?>

</body>
</html>
<?
	}
	else {
		header('Location: ./login.php');
	}
?>