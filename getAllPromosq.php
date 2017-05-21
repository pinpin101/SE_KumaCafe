<?php @session_start();

	$resp['status'] = 'error';

	include("dbconnection.inc");

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$sql = "SELECT * FROM `promotion` ORDER BY `promotion_enddate`";

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