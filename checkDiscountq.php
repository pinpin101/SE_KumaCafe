<?php @session_start();
	$resp['status'] = 'nodiscount';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$code = isset($_POST['discount']) ? $_POST['discount'] : null;

	if ($user != null) {

		$sql = "SELECT `promotion_discount` FROM `promotion` WHERE `promotion_code` = '".$code."'";
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		$row = mysql_fetch_assoc($query);

		if ($num <= 0) {
			
			$resp['status'] = 'discount';
		}

		$result = json_encode($resp);

		echo $result;
	}

	


?>