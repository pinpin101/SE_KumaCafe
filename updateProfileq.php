<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);


	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$conpass = isset($_POST['conpass']) ? $_POST['conpass'] : null;
	$fname = isset($_POST['user_fname']) ? $_POST['user_fname'] : null;
	$lname = isset($_POST['user_lname']) ? $_POST['user_lname'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$addr1 = isset($_POST['user_addr1']) ? $_POST['user_addr1'] : null;
	$addr2 = isset($_POST['user_addr2']) ? $_POST['user_addr2'] : null;
	$tel = isset($_POST['user_tel']) ? $_POST['user_tel'] : null;
	$email = isset($_POST['user_email']) ? $_POST['user_email'] : null;

	if ($id != null) {
		$sql_check = "SELECT * FROM `user` WHERE `id` = '".$id."' AND `Password` = '".$conpass."'";
		$query = mysql_query($sql_check);
		$num = mysql_num_rows($query);
		$row = mysql_fetch_assoc($query);

		if ($pass == null) {
			$pass = $row['Password'];
		}
		
		if ($num > 0) {
			$sql = "UPDATE `user` SET `Password` = '".$pass."', `user_fname` = '".$fname."', `user_lname` = '".$lname."', `user_addr1` = '".$addr1."', `user_addr2` = '".$addr2."', `user_email` = '".$email."', `user_tel` = '".$tel."'
			WHERE `id` = '".$id."'";

			$query = mysql_query($sql);
			if($query){
				$resp['status'] = 'success';
			}
		} else {
			$resp['status'] = 'nopass';
		}

		$result = json_encode($resp);
		echo $result;
	}

?>