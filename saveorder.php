<?php
	session_start();
    include("dbconnection.inc");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<?php
	$id = $_REQUEST["id"];
	$order_date = Date("Y-m-d G:i:s");
//	$status_id = $_REQUEST["status_id"];
//	$order_price = $_REQUEST["order_price"];
	//save order
	$status_id = 0;
	mysql_query("BEGIN"); 
	$sql1	= "insert into orders ( `order_date`, `id`, `status_id`) values('$order_date', '$id','$status_id')";
	$query1	= mysql_query($sql1);
	//insert in lasted row becuase order_id is increment automatically
	$sql2 = "select max(order_id) as order_id from orders where id='$id' and order_date ='$order_date' and status_id ='$status_id' ";
	$query2	= mysql_query($sql2);
	$row = mysql_fetch_array($query2);
	$order_id = $row["order_id"];
//PHP foreach() call each array
	foreach($_SESSION['cart'] as $product_id=>$order_qty)
	{
		$sql3	= "select * from product where product_id=$product_id";
		$query3	= mysql_query($sql3);
		$row3	= mysql_fetch_array($query3);
		$order_price	= $row3['product_price']*$order_qty;
		
		$sql4	= "insert into orderdetail (  `product_id`, `order_qty`, `order_price`) values('$order_id', '$product_id', '$order_qty', '$order_price')";
		$query4	= mysql_query($$sql4);
	}
	
	if($query1 && $query4){
		mysql_query("COMMIT");
		$msg = "Save order successfully";
		foreach($_SESSION['cart'] as $product_id)
		{	
			//unset($_SESSION['cart'][$product_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysql_query("ROLLBACK");  
		$msg = "Error occurs !! Please contact us";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='product.php';
</script>

 




</body>
</html>