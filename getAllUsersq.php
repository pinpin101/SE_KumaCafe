<?php @session_start();

	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$sql = "SELECT `id`, `Username`, `Role`, `user_email`, `user_tel` FROM `user` WHERE `id` != '".$_SESSION['id_login']."' ORDER BY `id` DESC";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);

	$data = array();

	while($row = mysql_fetch_assoc($query)) {
        array_push($data, $row);
    }

	if ($num > 0) {
		
		$resp['data'] = $data;
		$resp['status'] = 'success';
	}

	$result = json_encode($resp);

	echo $result;


?>