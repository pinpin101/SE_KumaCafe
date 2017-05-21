<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);


	$code = isset($_POST['promotion_code']) ? $_POST['promotion_code'] : null;

	if ($code != null) {
		$sql = "DELETE FROM `promotion` WHERE `promotion_code` = '".$code."'";

		$query = mysql_query($sql);

		if($query){
			$resp['status'] = 'success';
		}
		$result = json_encode($resp);
		echo $result;
	}

?>