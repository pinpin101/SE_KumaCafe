<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);


	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$email = isset($_POST['user_email']) ? $_POST['user_email'] : null;
	$tel = isset($_POST['user_tel']) ? $_POST['user_tel'] : null;

	
	if ($id != null) {
		$sql = "UPDATE `user` 
			SET `user_email` = '".$email."', `user_tel` = '".$tel."' 
			WHERE `id` = '".$id."'";

		$query = mysql_query($sql);

		if($query){
			$resp['status'] = 'success';
		}
		$result = json_encode($resp);
		echo $result;
	}

?>