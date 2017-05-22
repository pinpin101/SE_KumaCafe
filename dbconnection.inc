<?php
	$conn= mysql_connect("localhost","root","") or die("Error: " . mysql_error());
	mysql_select_db("KumaCafe");
	mysql_query("SET NAMES 'utf8'"); 
?>
