<?php
	include "./includes/header.php";
	if(isset($_SESSION['uid'])) {

		$goal_id = addslashes($_GET['id']);
			
  
?>
<style>
.datatables_length {
	display: none;
}
</style>


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
			<th>School Annual Goal</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		
		<?
//		$res = mysql_query("SELECT * FROM goals WHERE uid = ".$_SESSION['uid']);
//		while($goal = mysql_fetch_array($res)) {
//			echo "<tr><td><a href='./goal.php?id=".$goal['id']."' title='View Goal'>".$goal['goal_title']."</a></td>";
//			echo "<td><a href='./index.php' title='View Dimension'>";
//				$r = mysql_query("SELECT * FROM dimensions WHERE id = ".$goal['dimension_id']);
//				if($dim = mysql_fetch_array($r)) {
//					echo $dim['name'];
//				}
//			echo "</a></td>";
//			echo "<td>";
//			if($goal['term_1_rank'] == 0 || $goal['term_2_rank'] == 0 || $goal['term_3_rank'] == 0 || $goal['term_4_rank'] == 0) {
//				echo "Not Achieved";
//			}	
//			else {
//				echo "Achieved";
//			}
//			echo "</td></tr>";
//		}
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