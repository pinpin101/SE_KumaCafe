<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$fname = isset($_POST['fname']) ? $_POST['fname'] : null;
	$lname = isset($_POST['lname']) ? $_POST['lname'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	$address = isset($_POST['address']) ? $_POST['address'] : null;
	$tel = isset($_POST['tel']) ? $_POST['tel'] : null;
	$date = isset($_POST['dob']) ? $_POST['dob'] : null;

	$date1 = str_replace('-', '/', $date);
	$dob = date('Y-m-d',strtotime($date1 . "+1 days"));

	if($user != null && $pass != null && $fname != null && $lname != null && $email != null && $gender != null && $address != null && $tel != null && $dob != null){

		$sql = "INSERT INTO `user` (`Username`, `Password`, `Role`, `user_fname`, `user_lname`, `user_addr1`, `user_addr2`, `user_gender`, `user_dob`, `user_email`, `user_tel`)";
		$sql .= " VALUES ('".$user."', '".$pass."', 'Member', '".$fname."', '".$lname."', '".$address."', NULL, '".$gender."', '".$dob."', '".$email."', '".$tel."')";


		$query = mysql_query($sql);
		
		if ($query) {
	 		$resp['status'] = 'success';
			$_SESSION['memberpage'] = true;
	 		$_SESSION['id_login'] = mysql_insert_id();
	 	}

	 	$result = json_encode($resp);

	 	echo $result;
	}


?>