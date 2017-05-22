<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;

	if($user != null && $pass != null){

		$resp['status'] = 'nouser';

		$sql = "SELECT * FROM `user` WHERE `username` = '".$user."' AND `password` = '".$pass."'";
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		$row = mysql_fetch_assoc($query);

		if ($num > 0) {
			if ($row['role'] === 'Admin') {
				$_SESSION['adminpage'] = true;
			}

			$_SESSION['memberpage'] = true;
			$_SESSION['id_login'] = $row['id'];
		
			$name = "'".$row['user_fname']."' '".$row['user_lname']."'";

			$resp['data'] = $name;
			$resp['status'] = 'success';
		}
	}else{
		$resp['status'] = 'required';
	}

	$result = json_encode($resp);

	echo $result;

?>