<?php
	@session_start();
    include("dbconnection.inc");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Save product</title>
</head>
<body>

<?php

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	

	$id = mysql_real_escape_string($_POST['id']);
	$name = mysql_real_escape_string($_POST['name']);
	$detail=mysql_real_escape_string($_POST['detail']);
	$price=mysql_real_escape_string($_POST['price']);
	$size=mysql_real_escape_string($_POST['size']);
	$colour = mysql_real_escape_string($_POST['colour']);
	$image = (isset($_REQUEST['image']) ? $_REQUEST['image'] : null);
	$vendorID = mysql_real_escape_string($_POST['vendorID']);
	$productTypeName = mysql_real_escape_string($_POST['productTypeName']);
	
	$target= $_FILES['image'];
	if($target <> '') { 

		//โฟลเดอร์ที่เก็บไฟล์
		$path="img/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['image']['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname =$numrand.$date1.$type;

		$path_copy=$path.$newname;
		$path_link="img/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);  
		
	
	}
	
	$sql = "INSERT INTO `product` (`product_name`, `product_detail`, `product_price`, `product_size`, `product_colour`, `product_img`, `vendor_id`, `producttype_id`) 
	values('".$name."', '".$detail."', '".$price."', '".$size."', '".$colour."', '".$newname."', '".$vendorID."', '".$productTypeName."')";
	


	if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
		echo "<script type='text/javascript'> ";
		echo "alert('Add ERROR!!! '); ";
		//echo "window.location='index.php'; ";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'> ";
		echo "alert('Add Successfully'); ";
		//echo "window.location='index.php'; ";
		echo "</script>";
	}
	
	mysql_close();

	?>
    </body>
</html>