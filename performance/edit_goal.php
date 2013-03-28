<?php
	include "./includes/header.php";
	if(isset($_SESSION['uid'])) {		
	
	$mode = 1;
	$goal_id = addslashes($_GET['id']);
	
	$res = mysql_query("SELECT * FROM goals WHERE uid = ".$_SESSION['uid']." AND id = ".$goal_id);
	if($goal = mysql_fetch_array($res)) {
		if($_GET['add'] != 1) {
			$term_1_goal = $goal['term_1_goal'];
			$term_1_notes = $goal['term_1_notes'];
			$term_1_rank = $goal['term_1_rank'];
			$term_2_goal = $goal['term_2_goal'];
			$term_2_notes = $goal['term_2_notes'];
			$term_2_rank = $goal['term_2_rank'];
			$term_3_goal = $goal['term_3_goal'];
			$term_3_notes = $goal['term_3_notes'];
			$term_3_rank = $goal['term_3_rank'];
			$term_4_goal = $goal['term_4_goal'];
			$term_4_notes = $goal['term_4_notes'];
			$term_4_rank = $goal['term_4_rank'];
			$mode = 0;
			$title = $goal['goal_title'];
			$dimension = $goal['dimension_id'];
		}
	}
?>
<style>
.datatables_length {
	display: none;
}
</style>

<script>

function save_goal() {
	var uid = <? echo $_SESSION['uid']; ?>;	
	var term_1_goal = tinyMCE.get('elm1').getContent();
	var term_1_notes = tinyMCE.get('elm1_notes').getContent();
	var term_1_rank = document.getElementById('rank_1').value;
	
	var term_2_goal = tinyMCE.get('elm2').getContent();
	var term_2_notes = tinyMCE.get('elm2_notes').getContent();
	var term_2_rank = document.getElementById('rank_2').value;
	
	var term_3_goal = tinyMCE.get('elm3').getContent();
	var term_3_notes = tinyMCE.get('elm3_notes').getContent();
	var term_3_rank = document.getElementById('rank_3').value;
	
	var term_4_goal = tinyMCE.get('elm4').getContent();
	var term_4_notes = tinyMCE.get('elm4_notes').getContent();
	var term_4_rank = document.getElementById('rank_4').value;
	var title = document.getElementById('title').value;
	var dimension = document.getElementById('dimension').value;
	
	var mode = <? echo $mode; ?>;
	
	$.post("./includes/save_goal.php", {						
		uid:uid,
		term_1_goal:term_1_goal,
		term_1_notes:term_1_notes,
		term_1_rank:term_1_rank,
		term_2_goal:term_2_goal,
		term_2_notes:term_2_notes,
		term_2_rank:term_2_rank,
		term_3_goal:term_3_goal,
		term_3_notes:term_3_notes,
		term_3_rank:term_3_rank,
		term_4_goal:term_4_goal,
		term_4_notes:term_4_notes,
		term_4_rank:term_4_rank,
		mode:mode,
		title:title,
		dimension:dimension
	}, function(data){
		if(data){
			if(data == "success") {
				window.location = "./goals.php";
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
			<th><? echo $title; ?></th>
		</tr>
	</thead>
	<tbody>
	<tr class="gradeX">
		<td>
			<table width="100%" border="0">
				<tr>
					<td>Goal Title: <input type="text" id="title" name="title" style="width: 250px;" value="<? echo $title; ?>" />
						<br />Dimension: <select id="dimension" name="dimension">
								<?
								// Dimension options
								$r = mysql_query("SELECT * FROM dimensions");
								while($dim = mysql_fetch_array($r)) {
									echo "<option value='".$dim['id']."'";
										if($dim['id'] == $dimension) {
											echo "selected";
										}
									echo ">".$dim['name']."</option>";
								}
								?>
							  </select></td>
					<td align="right" valign="top"><input type="button" onclick="save_goal();" value=" Save " /></td>
				</tr>
				<tr>
					<td valign="top" width="100%" colspan="2">
						<table border="0" width="100%">
							<tr>
								<td colspan="6" width="18%">
									<strong>Term 1</strong><br />
									<table border="0">
										<tr>
											<td>
												Goal:<br />
												<textarea id="elm1" name="elm1" rows="10" cols="20" style="width: 20%">
												<? echo $term_1_goal; ?>
												</textarea>
											</td>
											<td>
												Notes:<br />
												<textarea id="elm1_notes" name="elm1_notes" rows="10" cols="20" style="width: 20%">
												<? echo $term_1_notes; ?>
												</textarea>
											</td>
											<td>
												<select id="rank_1">
													<option value="0" <? echo ($term_1_rank == 0) ? "selected" : ""; ?>>Not Achieved</option>
													<option value="1" <? echo ($term_1_rank == 1) ? "selected" : ""; ?>>Achieved</option>
												</select>
											</td>
										</tr>
									</table>									
								</td>	
							</tr>
							<tr>
								<td colspan="6" width="18%">
									<strong>Term 2</strong><br />
									<table border="0">
										<tr>
											<td>
												Goal:<br />
												<textarea id="elm2" name="elm2" rows="10" cols="20" style="width: 20%">
												<? echo $term_2_goal; ?>
												</textarea>
											</td>
											<td>
												Notes:<br />
												<textarea id="elm2_notes" name="elm2_notes" rows="10" cols="20" style="width: 20%">
												<? echo $term_2_notes; ?>
												</textarea>
											</td>
											<td>
												<select id="rank_2">
													<option value="0" <? echo ($term_2_rank == 0) ? "selected" : ""; ?>>Not Achieved</option>
													<option value="1" <? echo ($term_2_rank == 1) ? "selected" : ""; ?>>Achieved</option>
												</select>
											</td>
										</tr>
									</table>									
								</td>	
							</tr>
							<tr>
								<td colspan="6" width="18%">
									<strong>Term 3</strong><br />
									<table border="0">
										<tr>
											<td>
												Goal:<br />
												<textarea id="elm3" name="elm3" rows="10" cols="20" style="width: 20%">
												<? echo $term_3_goal; ?>
												</textarea>
											</td>
											<td>
												Notes:<br />
												<textarea id="elm3_notes" name="elm3_notes" rows="10" cols="20" style="width: 20%">
												<? echo $term_3_notes; ?>
												</textarea>
											</td>
											<td>
												<select id="rank_3">
													<option value="0" <? echo ($term_3_rank == 0) ? "selected" : ""; ?>>Not Achieved</option>
													<option value="1" <? echo ($term_3_rank == 1) ? "selected" : ""; ?>>Achieved</option>
												</select>
											</td>
										</tr>
									</table>									
								</td>	
							</tr>
							<tr>
								<td colspan="6" width="18%">
									<strong>Term 4</strong><br />
									<table border="0">
										<tr>
											<td>
												Goal:<br />
												<textarea id="elm4" name="elm4" rows="10" cols="20" style="width: 20%">
												<? echo $term_4_goal; ?>
												</textarea>
											</td>
											<td>
												Notes:<br />
												<textarea id="elm4_notes" name="elm4_notes" rows="10" cols="20" style="width: 20%">
												<? echo $term_4_notes; ?>
												</textarea>
											</td>
											<td>
												<select id="rank_4">
													<option value="0" <? echo ($term_4_rank == 0) ? "selected" : ""; ?>>Not Achieved</option>
													<option value="1" <? echo ($term_4_rank == 1) ? "selected" : ""; ?>>Achieved</option>
												</select>
											</td>
										</tr>
									</table>									
								</td>	
							</tr>
						</table>
					</td>					
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="button" onclick="save_goal();" value=" Save " /></td>
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