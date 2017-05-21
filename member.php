<?php @session_start(); @ob_start();
	if($_SESSION['adminpage'] != true) {
		header('Location:index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Edit Member</title>
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
		<div class="alert alert-success" id="success" style="display:none;"><strong>Data has already changed.</strong></div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>No.</td>
						<td>Username</td>
						<td>Phone</td>
						<td>Email</td>
						<td>Change Group</td>
						<td>Edit</td>
					</tr>
				</thead>

				<tbody>
					<tr ng-repeat="user in users">
						<td>#{{ $index }}</td>
						<td>
							<div ng-bind="user.Username"></div>
						</td>
						<td>
							<input type="text" class="form-control" ng-model="user.user_tel" id="input_tel_{{$index}}" style="display:none;">
							<div ng-bind="user.user_tel" class="text_{{$index}}"></div>
						</td>
						<td>
							<input type="text" class="form-control" ng-model="user.user_email" id="input_email_{{$index}}" style="display:none;">
							<div ng-bind="user.user_email" class="text_{{$index}}"></div>
						</td>
						<td>
							<select class="form-control" ng-model="user.Role" ng-change="change_group(user.id, user.Role);">
								<option value="Admin" ng-selected="user.Role == 'Admin'">Admin</option>
								<option value="Member" ng-selected="user.Role == 'Member'">Member</option>
							</select>
						</td>
						<td>
							<button class="btn btn-success" ng-click="save_user(user, $index)" id="btn_save_{{$index}}" style="display:none;">Save</button>
							<button class="btn btn-primary" ng-click="edit_user(user.id, $index)" id="btn_edit_{{$index}}">Edit</button>
						</td>
					</tr>
				</tbody>
				

			</table>
	</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/mainController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>

</body>
</html>
