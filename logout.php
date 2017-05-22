<?php @session_start(); @ob_start();

	unset($_SESSION['memberpage'],$_SESSION['id_login']);
	session_destroy();

	header("Location:index.php");

?>
