<?php @session_start(); @ob_start();
	if($_SESSION['memberpage'] != true) {
		header('Location:index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Payment</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

<body id="page-top" ng-controller="paymentController">
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
				<a class="navbar-brand page-scroll" href="index.php"><img src="img/4Angelslogo.png" height="31px"></a>
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
				<from id="payment">
					<h3>Payment Confirmation</h3>
					<div class="form-group">
						<label for="name">Name:</label> <span ng-bind="payment.user_fname + ' ' + payment.user_lname"></span>
					</div>
					<div class="form-group">
						<label for="address">Address:</label> <span ng-bind="payment.user_addr1"></span>
					</div>
					<div class="form-group">
						<label for="tel">Tel.:</label> <span ng-bind="payment.user_tel"></span>
					</div>
					<div class="form-group">
						<label for="email">Email:</label> <span ng-bind="payment.user_email"></span>
					</div>
					<div class="form-group">
						<label for="order">Order</label>
						<table class="table table-striped">
							<thead>
								<tr>
									<td width="20%"><strong>Code</strong></td>
									<td width="20%"><strong>Name</strong></td>
									<td width="20%"><strong>Price per unit</strong></td>
									<td width="20%"><strong>Quantity</strong></td>
									<td width="20%"><strong>Amount</strong></td>
								</tr>
							</thead>

							<tbody>
								<tr ng-repeat="order in orders">
									<td>
										<div ng-bind="order.product_id" class="text_{{$index}}"></div>
									</td>
									<td>
										<div ng-bind="order.product_name" class="text_{{$index}}"></div>
									</td>
									<td>
										<div ng-bind="order.product_price" class="text_{{$index}}"></div>
									</td>
									<td>
										<div ng-bind="order.order_qty" class="text_{{$index}}"></div>
									</td>
									<td>
										<div ng-bind="order.order_price" class="text_{{$index}}"></div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><label for="total">Total:</label></td>
									<td>{{ getTotal() }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<label for="discount">Discount:</label> 
						<input type="text" size="8" class="form-control" id="discount" ng-model="discount" ng-blur="checkDiscount(discount);">
						<span ng-bind="discounts"></span>
					</div>
					<div class="form-group">
						<label for="after_discount">After Discount:</label> <span ng-bind=""></span>
					</div>
					<div class="form-group">
						<label for="vat">Vat 7%:</label> <span ng-bind=""></span>
					</div>
					<div class="form-group">
						<label for="net_price">Net Price:</label> <span ng-bind=""></span>
					</div>
					<div class="form-group">
						<label for="method">Pay Method</label>
						<div class="form-check">
							<input type="radio" class="form-check-input" id="paymethod" ng-model="" value="mtc"> Master Card
							<input type="radio" class="form-check-input" id="paymethod" ng-model="" value="vs"> Visa
						</div>
					</div>

					<button type="submit" class="btn btn-success" ng-click="submitpayment();">Confirm</button>
				</from>
				
			</div>
		</div>	
		</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/paymentController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>

</body>
</html>
