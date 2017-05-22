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
	<title>Sign Up</title>
	<style>
		.content-page{
			margin-top: 65px;
		}
	</style>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

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
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
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

				<div class="alert alert-danger" style="display:none;" id="show_error2">
					<strong>เกิดข้อผิดพลาด</strong>
				</div>

				<div class="alert alert-success" style="display:none;" id="show_success">
					<strong>บันทึกข้อมูลเรียบร้อยแล้ว</strong>
				</div>
				
				<form id="register">
					<h1>Sign Up</h1>
					<div class="form-group" ng-class="{strike: deleted, bold: important,'has-error' : userError}">
						<label for="user">Username</label>
						<input type="text" class="form-control" id="user" placeholder="Username" ng-model="regist.user" ng-blur="checkUsers(regist.user);">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" id="pass" placeholder="Password" ng-model="regist.pass">
					</div>
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" placeholder="First name" ng-model="regist.fname">
					</div>
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" placeholder="Last name" ng-model="regist.lname">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" ng-model="regist.email">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<div class="form-check">
							<input type="radio" class="form-check-input" id="gender" ng-model="regist.gender" value="m"> Male
						<!-- </div>
						<div class="form-check"> -->
							<input type="radio" class="form-check-input" id="gender" ng-model="regist.gender" value="f"> Female
						</div>
					</div>

					<div class="form-group">
						<label for="dob">Date of Birth</label>
            			<div class="input-group date">
            				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			                <input type="date" class="form-control" placeholder="Date of Birth" ng-model="regist.dob">
			            </div>
			        </div>

					<div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address" placeholder="Address" cols="30" rows="5" ng-model="regist.address"></textarea>
					</div>
					<div class="form-group">
						<label for="tel">Tel</label>
						<input type="text" class="form-control" id="tel" placeholder="Tel" ng-model="regist.tel">
					</div>


					<button type="submit" class="btn btn-success" ng-click="registerpage();" ng-disabled="userError">Sign Up</button>
					<button type="reset" class="btn btn-danger">Reset</button>

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
