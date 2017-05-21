<?php @session_start();
	$resp['status'] = 'error';

	$conn = mysqli_connect("127.0.0.1","root","","onlineshopping");
		//check connection
		if(mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL:".mysqli_connect_errno();
		}

	$_POST = json_decode(file_get_contents('php://input'),TRUE);

	$sql_order = "SELECT `p.product_id`, `p.product_name`, `p.product_price`, `od.order_qty`, `od.order_price` FROM (`orderdetail od` INNER JOIN `orders o` ON `od.order_id` = `o.order_id`) INNER JOIN `product p` ON `p.product_id` = `od.product_id` WHERE `o.id` = '".$_SESSION['id_login']."' AND `o.status_id` = '0'";


	$query = mysqli_query($conn, $sql_order);
	$num = mysqli_num_rows($query);

	$data = array();

	while($row = mysqli_fetch_assoc($query)) {
        array_push($data, $row);
    }

	if ($num > 0) {
		
		$resp['data'] = $data;
		$resp['status'] = 'success';
	}

	$result = json_encode($resp);
	echo $result;
	

?>