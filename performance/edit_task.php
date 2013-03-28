<?php
	include "./includes/header.php";
	if(isset($_SESSION['auid'])) {		

	$task_id = addslashes($_GET['id']);
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
	
?>
<style>
.datatables_length {
	display: none;
}
</style>

<script>

function save_task() {
	var task_id = <? echo $task_id; ?>;	
	var name = document.getElementById('t_name').value;
	var conditions = tinyMCE.get('elm1').getContent();
	var criteria = tinyMCE.get('elm2').getContent();
	var notes = tinyMCE.get('elm3').getContent();
	var importance = document.getElementById('importance').value;
	var difficulty = document.getElementById('difficulty').value;
	
	$.post("./includes/save_task.php", {						
		task_id:task_id,
		name:name,
		conditions:conditions,
		criteria:criteria,
		notes:notes,
		importance:importance,
		difficulty:difficulty
	}, function(data){
		if(data){
			if(data == "success") {
				window.location = "./admin_tasks.php?task_id=<? echo $task_id; ?>&cat=<? echo $cat; ?>&ind=<? echo $_GET['ind']; ?>&task=<? echo $_GET['task']; ?>";
			}
			else {
				alert(data);
			}			
		}
	});	
}

</script>

<!-- TinyMCE -->
<script type="text/javascript" src="./tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<!-- /TinyMCE -->

<table width="100%">
	<tr>
		<td colspan="2"><a href="./index.php"><img src="./images/logo.png" /></a></td>
	</tr>
	<tr>
		<td><? include "./includes/navigation.php"; ?></td>
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
					<td colspan="2" align="right"><input type="button" onclick="save_task();" value=" Save " /></td>
				</tr>
				<tr>
					<td valign="top" width="100%">
						<table border="1" width="100%">
							<tr>
								<td colspan="6" width="18%">
									<strong>Role Title:</strong> Teacher<br />
									<strong>Dimension:</strong> Professional Knowledge
								</td>	
							</tr>
							<tr>
								<td colspan="6">
									<strong>Task/Skill/Competency:</strong> <input type="text" style="width: 200px;" id="t_name" value="<? echo $task['name']; ?>" />
								</td>	
							</tr>
							<tr>
								<td colspan="3" width="50%" align="center"><strong>Conditions and Supports</strong></td>	
								<td colspan="3" width="50%" align="center"><strong>Criteria/Standards</strong></td>
							</tr>
							<tr>
								<td colspan="3" valign="top">Given the following:<br /><br />
								
								<textarea id="elm1" name="elm1" rows="10" cols="20" style="width: 100%">
									<? echo $task['conditions']; ?>
								</textarea>
								
								</td>	
								<td colspan="3" valign="top">Performance is acceptable when:<br /><br />
								
								<textarea id="elm2" name="elm2" rows="10" cols="20" style="width: 100%">
									<? echo $task['criteria']; ?>
								</textarea>
								
								</td>
							</tr>
							<tr>
								<td colspan="6"><strong>Notes:</strong><br /><br />
								
								<textarea id="elm3" name="elm3" rows="10" cols="20" style="width: 50%">
									<? echo $task['notes']; ?>
								</textarea>
								</td>	
							</tr>
							<tr>
								<td colspan="3"><strong>Importance rating:</strong><br />
								
									<select id="importance">
										<option value="1" <? echo ($task['importance'] == 1) ? "selected" : ""; ?>>1</option>
										<option value="2" <? echo ($task['importance'] == 2) ? "selected" : ""; ?>>2</option>
										<option value="3" <? echo ($task['importance'] == 3) ? "selected" : ""; ?>>3</option>
										<option value="4" <? echo ($task['importance'] == 4) ? "selected" : ""; ?>>4</option>
										<option value="5" <? echo ($task['importance'] == 5) ? "selected" : ""; ?>>5</option>
									</select>
								</td>	
								<td colspan="3"><strong>Difficulty Rating:</strong><br />
								
									<select id="difficulty">
										<option value="1" <? echo ($task['difficulty'] == 1) ? "selected" : ""; ?>>1</option>
										<option value="2" <? echo ($task['difficulty'] == 2) ? "selected" : ""; ?>>2</option>
										<option value="3" <? echo ($task['difficulty'] == 3) ? "selected" : ""; ?>>3</option>
										<option value="4" <? echo ($task['difficulty'] == 4) ? "selected" : ""; ?>>4</option>
										<option value="5" <? echo ($task['difficulty'] == 5) ? "selected" : ""; ?>>5</option>
									</select>
								</td>
							</tr>
						</table>
					</td>					
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="button" onclick="save_task();" value=" Save " /></td>
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