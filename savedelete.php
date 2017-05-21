<?php
	session_start();
    include("dbconnection.inc");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete</title>
</head>
<body>
<?php


$checks = implode(" ', ' ", $_POST['checkbox']);
$sql = "DELETE FROM `product` WHERE `product_id` in ('".$checks."') ";
	if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
	echo "<script type='text/javascript'> ";
	echo "alert('delete ERROR!!! '); ";
	echo "window.location='index.php'; ";
	echo "</script>";
	}
	echo "<script type='text/javascript'> ";
	echo "alert('delete Successfully'); ";
	echo "window.location='index.php'; ";
	echo "</script>";
	mysql_close();



?>

</body>
</html>