<?php @session_start();
	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$code = isset($_POST['promotion_code']) ? $_POST['promotion_code'] : null;
	$discount = isset($_POST['promotion_discount']) ? $_POST['promotion_discount'] : null;
	$sdate = isset($_POST['promotion_startdate']) ? $_POST['promotion_startdate'] : null;
	$edate = isset($_POST['promotion_enddate']) ? $_POST['promotion_enddate'] : null;

	$sdate1 = str_replace('-', '/', $sdate);
	$startdate = date('Y-m-d',strtotime($sdate1 . "+1 days"));
	$edate1 = str_replace('-', '/', $edate);
	$enddate = date('Y-m-d',strtotime($edate1 . "+1 days"));

	if($code != null && $discount != null && $startdate != null && $enddate != null){

		$sql = "INSERT INTO `promotion` (`promotion_code`, `promotion_discount`, `promotion_startdate`, `promotion_enddate`) VALUES ('".$code."', '".$discount."', '".$startdate."', '".$enddate."')";


		$query = mysql_query($sql);
		
		if ($query) {
	 		$resp['status'] = 'success';
	 	}

	 	$result = json_encode($resp);

	 	echo $result;
	}


?>