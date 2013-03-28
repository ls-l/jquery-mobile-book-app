<?
session_start();

if(isset($_SESSION['uid'])) {
	?>
		<div id="ts_tabmenu">
			<ul>
				<li><a href="./index.php"><strong>Progress</strong></a></li>
				<li><a href="./details.php"><strong>Details</strong></a></li>
				<li><a href="./goals.php"><strong>Personal Goals</strong></a></li>
                                <li><a href="./school_annual_goals.php"><strong>School Annual Goals</strong></a></li>
			</ul>
		</div>
	<?
}
else if(isset($_SESSION['auid'])) {
	?>
		<div id="ts_tabmenu">
			<ul>
				<li><a href="./admin.php"><strong>Home</strong></a></li>
				<li><a href="./dimensions.php"><strong>Dimensions</strong></a></li>
			</ul>
		</div>
	<?
}
