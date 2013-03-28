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
				
				$tr_code .= "<td valign='top'><table><tr><td valign='top' width='10'>".$count.". </td><td>".$dimension['name']."</td></tr></table></td>";
				$tr_code .= "<td>";
				$r = mysql_query("SELECT * FROM dimension_sub WHERE dimension_id = '".$dimension['id']."'");
				$sub_count = 1;
				
					$tr_code .= "<table width='100%'>";
					while($dimension_sub = mysql_fetch_array($r)) {	

						$tr_code .= "<tr>";
						$tr_code .= "<td valign='top' width='30'>".$count.".".$sub_count.". </td>
									<td><a href='admin_indicators.php?sub_id=".$dimension_sub['id']."&cat=".$count.".".$sub_count."' title='View Indicators'>".$dimension_sub['name']."</a></td>";						
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
?>