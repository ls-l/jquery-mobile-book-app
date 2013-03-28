<?php
	include "./includes/header.php";
	if(isset($_SESSION['auid'])) {
		$ind_id = addslashes($_GET['ind_id']);
		$sub_id = addslashes($_GET['sub_id']);
		$cat = addslashes($_GET['cat']);
	
?>
	<script>
	function save_task() {
		var ind_id = <? echo $ind_id; ?>;	
		var name = document.getElementById('t_name').value;
		var conditions = tinyMCE.get('elm1').getContent();
		var criteria = tinyMCE.get('elm2').getContent();
		var notes = tinyMCE.get('elm3').getContent();
		var importance = document.getElementById('importance').value;
		var difficulty = document.getElementById('difficulty').value;
		
		$.post("./includes/save_task.php", {						
			ind_id:ind_id,
			name:name,
			conditions:conditions,
			criteria:criteria,
			notes:notes,
			importance:importance,
			difficulty:difficulty,
			mode:1
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
	
	<table width="100%" border="0">
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
										<strong>Task/Skill/Competency:</strong> <input type="text" style="width: 200px;" id="t_name" value="" />
									</td>	
								</tr>
								<tr>
									<td colspan="3" width="50%" align="center"><strong>Conditions and Supports</strong></td>	
									<td colspan="3" width="50%" align="center"><strong>Criteria/Standards</strong></td>
								</tr>
								<tr>
									<td colspan="3" valign="top">Given the following:<br /><br />
									
									<textarea id="elm1" name="elm1" rows="10" cols="20" style="width: 100%">
									</textarea>
									
									</td>	
									<td colspan="3" valign="top">Performance is acceptable when:<br /><br />
									
									<textarea id="elm2" name="elm2" rows="10" cols="20" style="width: 100%">
									</textarea>
									
									</td>
								</tr>
								<tr>
									<td colspan="6"><strong>Notes:</strong><br /><br />
									
									<textarea id="elm3" name="elm3" rows="10" cols="20" style="width: 50%">
									</textarea>
									</td>	
								</tr>
								<tr>
									<td colspan="3"><strong>Importance rating:</strong><br />
									
										<select id="importance">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</td>	
									<td colspan="3"><strong>Difficulty Rating:</strong><br />
									
										<select id="difficulty">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
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
	
	</body>
</html>

<?
	}
	else {
		header('Location: ./login.php');
	}
?>