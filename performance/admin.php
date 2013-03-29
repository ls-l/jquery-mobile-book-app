<?php
  include "./includes/header.php";
  if(isset($_SESSION['auid'])) {
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
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Progress</th>
				<th>Class</th>
				<th>Room</th>
				<th>Responsible</th>
				<th>Appraiser</th>
				<th>Current Step</th>
				<th>Salary Date</th>
				<th>TRB</th>
				<th>Username</th>
				<th>Role</th>
			</tr>
		</thead>
		<tbody>
			<?
			// ---  Start staff population --- 
			$res = mysql_query("SELECT * FROM staff ORDER BY lname");
			while($staff = mysql_fetch_array($res)) {
				echo "<tr>";
				echo "<td>".$staff['id']."</td>";
				echo "<td><a href='./details.php?user_id=".$staff['id']."'>".$staff['fname']."</a></td>";
				echo "<td><a href='./details.php?user_id=".$staff['id']."'>".$staff['lname']."</a></td>";
				if($staff['role'] == "admin" || $staff['role'] == "appraiser") {
					echo "<td><span style='color: gray;'>View Progress</span></td>";
				}
				else {
					echo "<td><a href='./index.php?user_id=".$staff['id']."'>View Progress</a></td>";
				}				
				echo "<td>".$staff['class']."</td>";
				echo "<td>".$staff['room']."</td>";
				echo "<td>".$staff['responsible']."</td>";
				echo "<td>".$staff['appraiser']."</td>";
				echo "<td>".$staff['current_step']."</td>";
				echo "<td>".$staff['salary_date']."</td>";
				echo "<td>".$staff['trb_num']."</td>";
				echo "<td>".$staff['username']."</td>";
				echo "<td>".$staff['role']."</td>";
                                echo "</tr>";
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