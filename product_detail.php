<?php @session_start(); @ob_start(); ?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/SEproject/">
	<title>Kuma Cafe</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <!-- Custom CSS -->
    <link href="assets/css/modern-business.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- pop up section -->
    
    
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="img/icon.png">

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
				<a class="navbar-brand page-scroll" href="index.php"><img src="img/homebutton.png" height="40"></a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="product.php" class="page-scroll"><img src="img/menubutton.png" height="40"></a></li>
					<li><a href="#" class="page-scroll"><img src="img/promotionbutton.png" height="40"></a></li>
					<li><a href="#" class="page-scroll"><img src="img/reservationbutton.png" height="40"></a></li>
					<li><a href="#" class="page-scroll"><img src="img/contactbutton.png" height="40"></a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == false && $member == false) : ?>
					<li><a href="#register" data-toggle="modal"><img src="img/signupbutton.png" height="40"></a></li>
					<li><a href="#login" data-toggle="modal"><img src="img/signinbutton.png" height="40"></a></li>
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
					
                
                
                
                
<body>
<table width="600" border="0" align="center" class="square">
  <tr><td colspan="3" bgcolor="#CCCCCC"><b>Product</b></td></tr>
  
<?php
//connect db
    include("dbconnection.inc");
	$product_id = $_GET['product_id']; //get variable
	
	$sql = "select * from product where product_id=$product_id";  //select all products
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	//show detail
	echo "<tr>";
  	echo "<td width='85' valign='top'><b>Title</b></td>";
    echo "<td width='279'>" . $row["product_name"] . "</td>";
    echo "<td width='70' rowspan='4'><img src='img/" . $row["product_img"] . " ' width='100'></td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Detail</b></td>";
    echo "<td>" . $row["product_detail"] . "</td>";
  	echo "</tr>";
	echo "<tr>";
    echo "<td valign='top'><b>Size</b></td>";
    echo "<td>" . $row["product_size"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>colour</b></td>";
    echo "<td>" . $row["product_colour"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Price</b></td>";
    echo "<td>" .number_format($row["product_price"],2) . "</td>";
  	echo "</tr>"; 
  	echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<a href='cart.php?product_id=$row[product_id]&act=add'> Add to cart</a></td>";
    echo "</tr>";	
?>
</table>

<p><center><a href="product.php">Back to product list</a></center>
			</div>
		</div>	
		</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- <script src="assets/angularjs/indexController.js"></script> -->
	<script src="assets/angularjs/mainController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>


	<script src="assets/js/script.js"></script>

</body>
</html>
