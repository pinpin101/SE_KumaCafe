<?php @session_start(); @ob_start();
	// if($_SESSION['adminpage'] != true) {
	// 	header('Location:index.php');
	// 	exit();
	// }
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Promotion</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

<body id="page-top" ng-controller="promotionController">
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
			<div class="alert alert-success" id="success" style="display:none;"><strong>Promotion has already changed.</strong></div>
			<div class="alert alert-success" id="success2" style="display:none;"><strong>Promotion has already deleted.</strong></div>
			<div class="alert alert-success" id="success3" style="display:none;"><strong>Promotion has already recorded</strong></div>
			<div class="alert alert-warning" id="error" style="display:none;"><strong>Invalid</strong></div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td width="20%"><strong>Code</strong></td>
						<td width="20%"><strong>Discount</strong></td>
						<td width="20%"><strong>Start Date</strong></td>
						<td width="20%"><strong>End Date</strong></td>
						<td width="20%"><strong>Edit</strong></td>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td ng-class="{strike: deleted, bold: important,'has-error' : promoError}">
							<input type="text" class="form-control" ng-model="promo.promotion_code" id="input_code" ng-blur="checkPromos(promo.promotion_code);" style="display:none;" placeholder="Code">
						</td>
						<td>
							<input type="text" class="form-control" ng-model="promo.promotion_discount" id="input_discount" style="display:none;" placeholder="Discount">
						</td>
						<td>
							<input type="date" class="form-control" ng-model="promo.promotion_startdate" id="input_startdate" style="display:none;" placeholder="Start Date">
						</td>
						<td>
							<input type="date" class="form-control" ng-model="promo.promotion_enddate" id="input_enddate" style="display:none;" placeholder="End date">
						</td>
						<td>
							<button type="submit" class="btn btn-success" ng-click="insert_promo();" id="btn_save" ng-disabled="promoError" style="display:none;">Save</button>
							<button class="btn btn-default" ng-click="add_promo();" id="btn_add">Add</button>
						</td>
					</tr>
					<tr ng-repeat="promo in promos">
						<td>
							<div ng-bind="promo.promotion_code"></div>
						</td>
						<td>
							<input type="text" class="form-control" ng-model="promo.promotion_discount" id="input_discount_{{$index}}" style="display:none;">
							<div ng-bind="promo.promotion_discount" class="text_{{$index}}"></div>
						</td>
						<td>
							<input type="text" class="form-control" ng-model="promo.promotion_startdate" id="input_startdate_{{$index}}" style="display:none;">
							<div ng-bind="promo.promotion_startdate" class="text_{{$index}}"></div>
						</td>
						<td>
							<input type="text" class="form-control" ng-model="promo.promotion_enddate" id="input_enddate_{{$index}}" style="display:none;">
							<div ng-bind="promo.promotion_enddate" class="text_{{$index}}"></div>
						</td>
						<td>
							<button class="btn btn-success" ng-click="save_promo(promo, $index)" id="btn_save_{{$index}}" style="display:none;">Save</button>
							<button class="btn btn-primary" ng-click="edit_promo(promo.promotion_code, $index)" id="btn_edit_{{$index}}">Edit</button>
							<button class="btn btn-danger" ng-click="delete_promo(promo, $index)" id="btn_del_{{$index}}">Delete</button>
						</td>
					</tr>
				</tbody>
				

			</table>
				
			</div>	
		</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/promotionController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>

</body>
</html>
