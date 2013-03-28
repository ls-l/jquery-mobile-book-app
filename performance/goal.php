<?php
	include "./includes/header.php";
	if(isset($_SESSION['uid'])) {

		$goal_id = addslashes($_GET['id']);

		$res = mysql_query("SELECT * FROM goals WHERE uid = ".$_SESSION['uid']." AND id = ".$goal_id);
		if($goals = mysql_fetch_array($res)) {		
  
?>
<style>
.datatables_length {
	display: none;
}
</style>

<script>

	

</script>

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
			<th><? echo $goals['goal_title']; ?></th>
		</tr>
	</thead>
	<tbody>
	<tr class="gradeX">
		<td>
			<table width="100%" border="1">
				<tr>
					<td><u><? echo $goals['goal_title']; ?></u></td>
					<td align="right"><a href="./edit_goal.php?id=<? echo $goal_id; ?>"><img src="./images/edit.png" width="20" title="Edit Goal" /></a>&nbsp;&nbsp;<a href="./edit_goal.php?id=<? echo $goal_id; ?>">Edit Goal</a></td>
				</tr>
				<tr>
					<td colspan="2">
						<strong>Term 1</strong><br />
						<table border="0" width="100%">
							<tr>
								<td valign="top" width="20%">
									Goal:<br />
									<? echo $goals['term_1_goal']; ?>
								</td>
								<td valign="top" width="20%">
									Notes:<br />
									<? echo $goals['term_1_notes']; ?>
								</td>
								<td valign="top">
									<? echo ($goals['term_1_rank'] == 0) ? "Not Achieved" : "Achieved"; ?>
								</td>
							</tr>
						</table>									
					</td>	
				</tr>
				<tr>
					<td colspan="2">
						<strong>Term 2</strong><br />
						<table border="0" width="100%">
							<tr>
								<td valign="top" width="20%">
									Goal:<br />
									<? echo $goals['term_2_goal']; ?>
								</td>
								<td valign="top" width="20%">
									Notes:<br />
									<? echo $goals['term_2_notes']; ?>
								</td>
								<td valign="top">
									<? echo ($goals['term_2_rank'] == 0) ? "Not Achieved" : "Achieved"; ?>
								</td>
							</tr>
						</table>									
					</td>	
				</tr>
				<tr>
					<td colspan="2">
						<strong>Term 3</strong><br />
						<table border="0" width="100%">
							<tr>
								<td valign="top" width="20%">
									Goal:<br />
									<? echo $goals['term_3_goal']; ?>
								</td>
								<td valign="top" width="20%">
									Notes:<br />
									<? echo $goals['term_3_notes']; ?>
								</td>
								<td valign="top">
									<? echo ($goals['term_3_rank'] == 0) ? "Not Achieved" : "Achieved"; ?>
								</td>
							</tr>
						</table>									
					</td>	
				</tr>
				<tr>
					<td colspan="2">
						<strong>Term 4</strong><br />
						<table border="0" width="100%">
							<tr>
								<td valign="top" width="20%">
									Goal:<br />
									<? echo $goals['term_4_goal']; ?>
								</td>
								<td valign="top" width="20%">
									Notes:<br />
									<? echo $goals['term_4_notes']; ?>
								</td>
								<td valign="top">
									<? echo ($goals['term_4_rank'] == 0) ? "Not Achieved" : "Achieved"; ?>
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
		header('Location: ./edit_goal.php');
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