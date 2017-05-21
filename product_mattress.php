<?php @session_start(); @ob_start(); ?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>4AngelsShopping</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

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




<h1>Product List</h1>

<body>
<div class = "well">
<p><a href = "addproduct.php">Add new product</a>
</p>
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>image</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>name</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>price</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>detail</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("dbconnection.inc");
  $sql = "select * from product where (producttype_id = 3) order by product_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysql_query($sql);
  while($row = mysql_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='img/" . $row["product_img"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["product_name"] . "</td>";
    echo "<td align='center'>" .number_format($row["product_price"],2). "</td>";
    echo "<td align='center'><a href='product_detail.php?product_id=$row[product_id]'>click</a></td>";
	echo "</tr>";
  }
  ?>
</table>

				
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
