<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);


	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$role = isset($_POST['group']) ? $_POST['group'] : null;
	
	if ($id != null) {
		$sql = "UPDATE `user` SET `Role` = '".$role."' WHERE `id` = ".$id.";";

		$query = mysql_query($sql);
		if($query){
			$resp['status'] = 'success';
		}

		$result = json_encode($resp);
		echo $result;
	}

?>