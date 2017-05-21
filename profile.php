<?php @session_start(); @ob_start();
	if($_SESSION['memberpage'] != true) {	//promotion, member
		header('Location:index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Edit Profile</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

<body id="page-top" ng-controller="profileController">
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
			<div class="col-md-2"></div>
			<div class="col-md-8">			
				<div class="alert alert-warning" style="display:none;" id="error_conpass">
					<strong>Please confirm the current password</strong>
				</div>
				<div class="alert alert-warning" style="display:none;" id="error_nopass">
					<strong>Wrong current password. Please try again.</strong>
				</div>
				<div class="alert alert-success" style="display:none;" id="success">
					<strong>Data has already changed.</strong>
				</div>
				<from id="profile">
					<h1>Edit Profile</h1>
					<table class="table">
						<tr>
							<td width="20%">Username</td>
							<td>
								<div ng-bind="form.Username"></div>
							</td>
						</tr>
						<tr>
							<td>New Password</td>
							<td>
								<input type="password" class="form-control" placeholder="New Password" ng-model="form.pass">
							</td>
						</tr>
						<tr>
							<td>First name*</td>
							<td>
								<input type="text" class="form-control" placeholder="Firstname" ng-model="form.user_fname">
							</td>
						</tr>
						<tr>
							<td>Last name*</td>
							<td>
								<input type="text" class="form-control" placeholder="Lastname" ng-model="form.user_lname">
							</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td ng-if="form.user_gender === 'm'">Male</td>
							<td ng-if="form.user_gender === 'f'">Female</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>
								<div ng-bind="form.user_dob"></div>
							</td>
						</tr>
						<tr>
							<td>Email*</td>
							<td>
								<input type="text" class="form-control" placeholder="Email" ng-model="form.user_email">
							</td>
						</tr>
						<tr>
							<td>Tel*</td>
							<td>
								<input type="text" class="form-control" placeholder="Tel" ng-model="form.user_tel">
							</td>
						</tr>
						<tr>
							<td>Address1*</td>
							<td>
								<textarea class="form-control" placeholder="Address1" cols="30" rows="5" ng-model="form.user_addr1"></textarea>
							</td>
						</tr>
						<tr>
							<td>Address2</td>
							<td>
								<textarea class="form-control" placeholder="Address2" cols="30" rows="5" ng-model="form.user_addr2"></textarea>
							</td>
						</tr>
						<tr>
							<td>Confirm Password**</td>
							<td>
								<input type="password" class="form-control" placeholder="Confirm Password" ng-model="form.conpass">
							</td>
						</tr>
						<tr>
							<td></td>
							<td><button class="btn btn-success" ng-click="updateProfile(form);">Save</button></td>
						</tr>
					</table>
				</from>
			</div>
		</div>	
		</div>
	</div>
</div>


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/profileController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>

</body>
</html>
