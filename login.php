<?php @session_start(); @ob_start();
	if($_SESSION['memberpage'] == true) {
		header('Location:index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>Sign In</title>
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

<body id="page-top">
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
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == false && $member == false) : ?>
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>



<div class="content-page" ng-controller="indexController">
	<div class="container">
		<div class="well">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					
				<div class="alert alert-warning" style="display:none;" id="show_error">
					<strong>กรุณากรอกข้อมูลให้ครบ</strong>
				</div>

				<div class="alert alert-warning" style="display:none;" id="show_error3">
					<strong>ไม่พบข้อมูลของท่าน กรุณากรอกใหม่</strong>
				</div>

				<div class="alert alert-danger" style="display:none;" id="show_error2">
					<strong>เกิดข้อผิดพลาด</strong>
				</div>

				<form id="login">
					<h1>Welcome</h1>
					<div class="form-group">
						<label for="user">Username</label>
						<input type="text" class="form-control" id="user" placeholder="Username" ng-model="login.user">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" id="pass" placeholder="Password" ng-model="login.pass">
					</div>

					<button type="submit" class="btn btn-default" ng-click="loginpage();">Sign In</button>
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
	<script src="assets/angularjs/indexController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>

</body>
</html>
