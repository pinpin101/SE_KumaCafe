<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);


	$code = isset($_POST['promotion_code']) ? $_POST['promotion_code'] : null;
	$discount = isset($_POST['promotion_discount']) ? $_POST['promotion_discount'] : null;
	$startdate = isset($_POST['promotion_startdate']) ? $_POST['promotion_startdate'] : null;
	$enddate = isset($_POST['promotion_enddate']) ? $_POST['promotion_enddate'] : null;
	
	if ($code != null) {
		$sql = "UPDATE `promotion` 
			SET `promotion_discount` = '".$discount."', `promotion_startdate` = '".$startdate."', `promotion_enddate` = '".$enddate."' 
			WHERE `promotion_code` = '".$code."'";

		$query = mysql_query($sql);

		if($query){
			$resp['status'] = 'success';
		}
		$result = json_encode($resp);
		echo $result;
	}

?>