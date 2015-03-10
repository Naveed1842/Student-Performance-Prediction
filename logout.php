<?php
	@session_start();
	foreach ($_SESSION as $key => $value) {
		$_SESSION[$key] = "";
	}
	$page = $_GET['p'];
    header("Location: ".$page);
?>