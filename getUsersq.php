<?php @session_start();

	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$sql = "SELECT `id`, `Username`, `Role`, `user_fname`, `user_lname`, `user_addr1`, `user_addr2`, `user_gender`, `user_dob`, `user_email`, `user_tel` FROM `user` WHERE `id` = '".$_SESSION['id_login']."'";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);

	if ($num > 0) {
		
		$resp['data'] = $row;
		$resp['status'] = 'success';
	}

	$result = json_encode($resp);

	echo $result;


?>