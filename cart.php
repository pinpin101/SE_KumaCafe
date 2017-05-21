<?php @session_start(); @ob_start(); ?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Cart</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="img/angel-icon-32x32.png">

<body id="page-top" ng-controller="mainController">
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top"><img src="img/4Angelslogo.png" height="31px"></a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php" class="page-scroll">Home</a></li>
					<li><a href="product.php" class="page-scroll">Product</a></li>
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == true || $member == true) : ?>
					<li><a href="cart.php" class="page-scroll">Cart</a></li>
					<?php endif; ?>
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						if($admin == true) : ?>
					<li><a href="promotion.php" class="page-scroll">Promotion</a></li>
					<li><a href="member.php" class="page-scroll">Member</a></li>
					<?php endif; ?>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == false && $member == false) : ?>
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
					<?php endif; ?>
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == true || $member == true) : ?>
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Hello, {{ name }}</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>



<div class="content-page">
	<div class="container">
		<div class="well">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
<?php
	$product_id = $_POST['product_id']; 
	$act = $_POST['act'];

	if($act=='add' && !empty($product_id))
	{
		if(isset($_SESSION['cart'][$product_id])) //check valur in cart for add item
		{
			$_SESSION['cart'][$product_id]++;
		}
		else
		{
			$_SESSION['cart'][$product_id]=1;
		}
	}

	if($act=='remove' && !empty($product_id))  //delete item
	{
		unset($_SESSION['cart'][$product_id]);
	}

	if($act=='update') //for add more item in order list 
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $product_id=>$amount)
		{
			$_SESSION['cart'][$product_id]=$amount;
		}
	}
?>

<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" height="113" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>Shopping Cart</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">Product</td>
      <td align="center" bgcolor="#EAEAEA">Price</td>
      <td align="center" bgcolor="#EAEAEA">Quantity</td>
      <td align="center" bgcolor="#EAEAEA">Total Price</td>
      <td align="center" bgcolor="#EAEAEA">Remove</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("dbconnection.inc");
	foreach($_SESSION['cart'] as $product_id=>$order_qty)
	{
		$sql = "SELECT * FROM `product` WHERE `product_id`=`'".$product_id."'";
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		$sum = $row['product_price'] * $order_qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["product_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["product_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$product_id]' value='$order_qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?product_id=$product_id&act=remove'>remove</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>Total price</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="product.php">Back to product</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="modify" />
    <input type="button" name="Submit2" value="confirm order" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
			</div>
		</div>	
		</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/mainController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>


</body>
</html>
