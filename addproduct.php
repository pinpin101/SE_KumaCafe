<?php @session_start(); @ob_start();
 //  $msg = "";
  
 //  //the path to store the upload image
	// $target = "img/".basename($_FILE['image']['name']);
		
 //  //get all the submitted data from the form
	// 	$image = $_FILE['image']['name'];
	// 	$text = $_POST['text'];
		
 //  //now let's move the uploaded image into the folder: images
	// 	if(move_uploaded_file($_FILE['image']['tmp_name'],$target)){
	// 		$msg = "Image uploaded successfully";
	// 	}
	// 	else{
	// 		$msg = "there was a problem uploading image";
	// 	}

?>

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



			
<body ng-controller="mainController">
<div class="content-page">
	<div class="container">
		<div class="well">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
      <h2 align="center"> Add new Product</h2>
      <hr />
     <form action="saveadd.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
    
		<div class="form-group">
            <div class="col-sm-12">
            	<p>ID</p>
		 			<input type="text"  name="id" class="form-control" placeholder="ID" />
          	</div>
        </div>		
		<div class="form-group">
            <div class="col-sm-12">
			  <p>Product name</p>
			<input type="text" name = "name" class="form-control" required placeholder="Product name"/>
			</div>
        </div>
		<div class="form-group">
            <div class="col-sm-12">
			<p>Detail</p>
			<textarea name = "detail" rows="3" class="form-control" required placeholder="Detail"></textarea>
            </div>
		</div>
		<div class="form-group">
           	<div class="col-sm-12">
			<p>Price</p>
			<input type="number"  name="price" class="form-control" required placeholder="Price" />
            </div>
		</div>
		<div class="form-group">
            <div class="col-sm-12">
			<p>Size</p>
			<div class="form-check">
				<input type="radio" name = "size"  value="3.5"> 3.5
				<input type="radio" name = "size"  value="5"> 5
				<input type="radio" name = "size"  value="6"> 6
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-12">
			  <p>Colour</p>
			<input type="text" name = "colour" class="form-control" required placeholder="Colour"/>
			</div> 
		</div>
        <div class="col-sm-8 info">
            <p>File Image</p>
            <input type="file" name="image" class="form-control" />
		</div>
		<div class="form-group">
        <div class="col-sm-12">
			  <p>VendorID</p>
			<input type="text" name = "vendorID" class="form-control" required placeholder="VendorID"/>
			</div> 
		</div>
		<div class="form-group">
               <div class="col-sm-12">
			  <p>TypeID (1 = bed, 2 = sofa, 3 = mattress)</p>
			<input type="text" name = "productTypeName" class="form-control" required placeholder="TypeID"/>
			</div> 
		</div>
		<div class="form-group">
        <div class="col-sm-12">
		<button type="submit" class="btn btn-success" name="addproduct">Submit</button>
                  </div>
        </div>
	</form>
</div>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/angularjs/mainController.js"></script>
	<script src="assets/angularjs/indexService.js"></script>


</body>
</html>