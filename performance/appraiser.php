<?php
  include "./includes/header.php";
  if(isset($_SESSION['muid'])) {
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
	Below is a list of the staff you are responsible for appraising.<br /><br />
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Progress</th>
				<th>Username</th>
				<th>Role</th>
			</tr>
		</thead>
		<tbody>
			<?
			// ---  Start staff population --- 
			$res = mysql_query("SELECT * FROM staff WHERE role = 'user' AND appraiser = '".$_SESSION['muid']."' ORDER BY lname");
			while($staff = mysql_fetch_array($res)) {
				echo "<tr>";
				echo "<td>".$staff['id']."</td>";
				echo "<td>".$staff['fname']."</td>";
				echo "<td>".$staff['lname']."</td>";
				echo "<td><a href='./index.php?user_id=".$staff['id']."'>View Progress</a></td>";				
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