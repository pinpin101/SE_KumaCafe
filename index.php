<?php @session_start(); @ob_start(); ?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="baseUrl" content="http://localhost/dbproject/">
	<title>4AngelsShopping</title>
    
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
  <link rel="icon" href="img/angel-icon-32x32.png">


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
 

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/slide1.jpg');"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/slide2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>New Sofa Arrival For Chirstmas</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/slide3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>INSPIRE YOUR DREAM WITH THE BEST MATTRESS</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->

	<div class="content-page">
		<div class="container">
    	<div class="col-md-3"> 

        <h3 class="lead">Product Catagory</h3>
         <img src="img/4Angelslogo.png" alt="">
             	<div class="list-group">
                    <a href="product_bed.php" class="list-group-item">BED</a>
                    <a href="product_sofa.php" class="list-group-item">SOFA</a>
                    <a href="product_mattress.php" class="list-group-item">MATTRESS</a>
                </div>
         </div>		
         
         
        <hr>
 

         
         
         
         
       	<div class="col-md-9">
		<div class="well">
		<div class="row">
        
                <h2>We stand for quality</h2>
                <br>
                <br>
                <p>We never compromise on design and would be foolish to compromise on quality. Only the finest materials are used in our furniture. We also employ inspectors that ensure technically-sound components and design throughout the process. These experts oversee production, checking in at key transaction points so that nothing is overlooked. Before an item is packaged, it is reviewed with a keen eye and must pass a comprehensive checklist by our quality control inspector.
                </p>
<p>We operate through several focused businesses, brands, and distribution channels. All of them work to design and build a better world around you.</p>
          <p>
                <a class="btn btn-default btn-lg" href="product.php">Select Product &raquo;</a></p>
                
               <hr width=50% size=5 color=770088>
          <h1>	 RECOMMENDATION </h1>

        
                            <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                           <img src="img/bed1.jpg" alt="">
                            <div class="caption">
                              	<h4 class="pull-right">price Baht</h4>
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">name</a>
                                </h4>
                                <p>details: see more detail and buy it to be your own - <a target="_blank" href="http://localhost/onlineshopping/product_detail.php?product_id=1">Click</a>.</p>
                          </div>
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                            </div>
                        </div>
        
                           <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/bed1.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">name</a>
                                </h4>
                                <p>details: see more detail and buy it to be your own - <a target="_blank" href="http://localhost/onlineshopping/product_detail.php?product_id=1">Click</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">New!</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

          <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/bed1.jpg" alt="">
                            <div class="caption">
                                <h4><a href="http://localhost/onlineshopping/product_detail.php?product_id=1">name</a>
                                </h4>
                                <p>details: see more detail and buy it to be your own - <a target="_blank" href="http://localhost/onlineshopping/product_detail.php?product_id=1">Click</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">New!</p>
                                <p>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>


          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <h2>Contact Us</h2>
          <address align="center">
          <strong>4AngelsShopping</strong> <br>
          CPE 11st floors. <br>
          126 Pracha Uthit Rd <br>
          Khwaeng Bang Mot, BKK 10140 <br>
          </address>
          <address align="center">
          <abbr title="Phone">Phone:</abbr> (+66) 08536475 <br>
          <abbr title="Email">Email:</abbr> <a href="mailto:#">mnblpnmt@4angels.com</a>
          </address>
          <p>&nbsp;</p>
          <div class="jquery-script-ads" align="center"><script type="text/javascript"><!--
            google_ad_client = "ca-pub-2783044520727903";
            /* jQuery_demo */
            google_ad_slot = "2780937993";
            google_ad_width = 728;
            google_ad_height = 90;
            //-->
            </script>
            <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			
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
