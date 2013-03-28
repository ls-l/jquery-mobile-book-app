<?php
  require "./includes/config.php";
?>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<style type="text/css" title="currentStyle">
		@import "./datatables/media/css/demo_page.css";
		@import "./datatables/media/css/demo_table_jui.css";
		@import "./datatables/media/smoothness/jquery-ui-1.8.4.custom.css";
		@import "./style/style.css";
	</style>
	<script type="text/javascript" language="javascript" src="./datatables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="./datatables/media/js/jquery.dataTables.js"></script>
	
	<script type="text/javascript" src="./swfupload/swfupload.js"></script>
    <script type="text/javascript" src="./swfupload/jquery.swfupload.js"></script>

	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			oTable = $('#table').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
		} );
	</script>
	
	<style>
		img {
			border: none;
		}
	</style>
</head>
<body>