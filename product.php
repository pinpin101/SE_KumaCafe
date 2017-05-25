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
		
	table {
			background-color: #FFBE7D;
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 15%;
		}

		th {
			font-size: 20px;
			background-color: #FFFFFF;
			text-align: center;
			padding: 20px;
		}

		td {
			border-bottom: 2px solid #FFFF88; 
			text-align: center;
			padding: 20px;
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
				</ul>
			</div>
		</div>
	</nav>
 

    <!-- Page Content -->

	<div class="content-page">
		<div class="container">
    	<div class="col-md-4"> 
        <table>
			<tr>
				<th>CATEGORY</th>
    
			</tr>
			<tr>
				<td><a href="#Main Course">MAIN COURSE</td>
    
			</tr>
			<tr>
				<td><a href="#Drink">DRINK</td>
    
			</tr>
			<tr>
				<td><a href="#Dessert">DESSERT</td>
			</tr>  

		</table>
         
       	<div class="col-md-8">
		<h3 class="lead">MENU</h3>
		<div class="well">
		<div class="row">
			 <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="img/coffee.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">KUMA Coffee</a>
                                </h4>
                            </div>
                            <div class="ratings">
								<p class = "pull-right">Price</p>
                                <button class="button">Buy</button>
                                
                            </div>
                        </div>
                    </div>
					
				<div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="img/smoothie.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">KUMA Smoothie</a>
                                </h4>
                            </div>
                            <div class="ratings">
								<p class = "pull-right">Price</p>
                                <button class="button">Buy</button>
                                
                            </div>
                        </div>
                    </div>

				<div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="img/hotmilk.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">KUMA Hot Milk</a>
                                </h4>
                            </div>
                            <div class="ratings">
								<p class = "pull-right">Price</p>
                                <button class="button">Buy</button>
                                
                            </div>
                        </div>
                    </div>
				
				<div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="img/beer.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">KUMA Beer</a>
                                </h4>
                            </div>
                            <div class="ratings">
								<p class = "pull-right">Price</p>
                                <button class="button">Buy</button>
                                
                            </div>
                        </div>
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
	<script src="assets/angularjs/mainController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>
    




</body>

</html>