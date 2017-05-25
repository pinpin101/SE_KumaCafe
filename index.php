<?php @session_start(); @ob_start();?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/SEproject/">
	<title>Kuma Cafe</title>
    
	<style>
  	@import url('http://fonts.googleapis.com/css?family=Gabriela');
  	.content-page h1,.content-page h2 {
      font-family: 'Gabriela', Tahoma, sans-serif;
      font-size: 3.7em;
      font-weight: 700;
      line-height: 1.55em;
      margin-bottom: 18px;
      text-align: center;
      color: #514b53;
      letter-spacing: -0.06em;
      text-shadow: 1px 1px 0 rgba(255,255,255,0.8);
    }

	.content-page h3 { color: #514b53; font-family: 'Rouge Script', cursive; font-size: 18px; font-weight: normal; line-height: 0px; margin: 0 0 50px; text-align: center; text-shadow: 1px 1px 2px #082b34; }
	
.content-page p { color: #514b53; font-family: 'Raleway',sans-serif; font-size: 16px; font-weight: 500; line-height: 22px;  text-align: center; margin: 0 0 24px; }

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


<body id="page-top" ng-controller="indexController" background="img/yellow-pastel-bg.jpg">
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
				<a class="navbar-brand page-scroll" href="index.php"><img src="img/4Angelslogo.png" height="31px"></a>     <!--  ******  -->
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
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php
						$admin = isset($_SESSION['adminpage']) ? $_SESSION['adminpage'] : null;
						$member = isset($_SESSION['memberpage']) ? $_SESSION['memberpage'] : null;
						if($admin == false && $member == false) : ?>
					<li><a href="#register" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#login" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

    <!-- Page Content -->

	<div class="content-page">
		<div class="container">
    		<div class="col-md-8"> 
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
			        <!-- Indicators -->
			        <ol class="carousel-indicators">
			            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			            <li data-target="#myCarousel" data-slide-to="1"></li>
			            <li data-target="#myCarousel" data-slide-to="2"></li>
			        </ol>

			        <!-- Wrapper for slides -->
			        <div class="carousel-inner">
			            <div class="item active">
			                <img src="img/menu1.jpg" width="800" height="500">
			            </div>
			            <div class="item">
			                <img src="img/menu2.jpg" width="800" height="500">
			            </div>
			            <div class="item">
			                <img src="img/menu3.png" width="800" height="500">
			            </div>
			        </div>

			        <!-- Controls -->
			        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			            <span class="glyphicon glyphicon-chevron-left"></span>
			            <span class="sr-only">Previous</span>
			        </a>
			        <a class="right carousel-control" href="#myCarousel" data-slide="next">
			            <span class="glyphicon glyphicon-chevron-right"></span>
   						<span class="sr-only">Next</span>
			        </a>
			    </div>
       		
        	</div>
            
       		<div class="col-md-4">
				<img src="img/kuma1.png" width="450">

			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<div class="modal" id="login" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">&times;</button>

						<div class="alert alert-warning" style="display:none;" id="show_error">
							<strong>กรุณากรอกข้อมูลให้ครบ</strong>
						</div>

						<div class="alert alert-warning" style="display:none;" id="show_error3">
							<strong>ไม่พบข้อมูลของท่าน กรุณากรอกใหม่</strong>
						</div>

						<div class="alert alert-danger" style="display:none;" id="show_error2">
							<strong>เกิดข้อผิดพลาด</strong>
						</div>

						<h4>Sign In</h4>
					</div>

					<div class="modal-body">
						<form id="login">
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" class="form-control" id="user" placeholder="Username" ng-model="login.user">
							</div>

							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" class="form-control" id="pass" placeholder="Password" ng-model="login.pass">
							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" ng-click="loginpage();">Sign In</button>
								<button class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
	</div>
	</div>

	<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<div class="modal" id="register" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">&times;</button>

						<div class="alert alert-warning" style="display:none;" id="show_error">
							<strong>กรุณากรอกข้อมูลให้ครบ</strong>
						</div>

						<div class="alert alert-danger" style="display:none;" id="show_error2">
							<strong>เกิดข้อผิดพลาด</strong>
						</div>

						<div class="alert alert-success" style="display:none;" id="show_success">
							<strong>บันทึกข้อมูลเรียบร้อยแล้ว</strong>
						</div>

						<h4>Register</h4>
					</div>

					<div class="modal-body">
						<form id="register">
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
							<div class="form-group">
								<input type="checkbox"> I accept the term.
							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-success" ng-click="registerpage();" ng-disabled="userError">Sign Up</button>
								<button type="reset" class="btn btn-danger">Reset</button>
							</div>
						</form>
					</div>
				</div>
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
