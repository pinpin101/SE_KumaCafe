<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$user = isset($_POST['user']) ? $_POST['user'] : null;

	if ($user != null) {

		$sql = "SELECT `Username` FROM `user` WHERE `Username` = '".$user."'";
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		$row = mysql_fetch_assoc($query);

		if ($num <= 0) {
			
			$resp['status'] = 'success';
		}

		$result = json_encode($resp);

		echo $result;
	}

	


?>