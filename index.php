<!DOCTYPE html>
<html>
<head>
<title>Index</title>
	<meta charset="utf-8">
    <meta name="author" content="Soash">
<link href="data.css"
	  rel="stylesheet"
	  type="text/css"/>
<style>
a{text-decoration: none;}
</style>
</head>

<body>
<?php
include 'config.php';
/*
//creating Databse
$con= @new mysqli($host,$username,$password);
if($host->connect_error)
	{die("Error : ".$con->connect_error);}
else{echo "Database Connected<br>";}

$db_sql = "CREATE DATABASE IF NOT EXISTS `BookDeals`";
$create_db = $host->query($db_sql);
if($create_db)
	{echo "Database Created : BookDeals<br>";}
else{echo "Error Database";}
*/

//creating tables
$con = new mysqli($host,$username,$password,$database);
if($con->connect_error)
	{die("Error : ".$con->connect_error);}
	
$books_sql="
CREATE TABLE IF NOT EXISTS `Books`
(
`ID` int(5) NOT NULL AUTO_INCREMENT,
`Products` varchar(100) NOT NULL,
`Price` int(5) NOT NULL,
`Sell_Price` int(5) NOT NULL,
`Quantity` int(5) NOT NULL,
 PRIMARY KEY (`ID`)
)";
$books = $con->query($books_sql);
if($books)
	{echo "Table created : Books<br>";}
	
$dealers_sql="
CREATE TABLE IF NOT EXISTS `Dealers`
(
`ID` int(5) NOT NULL AUTO_INCREMENT,
`Dealers` varchar(50) NOT NULL,
`Address` varchar(100) NOT NULL,
`Phone_Number` int(15) NOT NULL,
 PRIMARY KEY (`ID`)
);";
$dealers = $con->query($dealers_sql);
if($dealers)
	{echo "Table created : Dealers<br>";}

$deals_sql="
CREATE TABLE IF NOT EXISTS `Deals`
(
`ID` int(5) NOT NULL AUTO_INCREMENT,
`Dealers` varchar(50) NOT NULL,
`Books` varchar(50) NOT NULL,
`Quantity` int(5) NOT NULL,
 PRIMARY KEY (`ID`)
);";
$deals = $con->query($deals_sql);
if($deals)
	{echo "Table created : Deals<br>";}
?>

<table class="center">
<caption>BookDeals</caption>
<tr><td><a href="get_products.html">Get Products</a></td></tr>
<tr><td><a href="products.php">Products Data</a></td></tr>
<tr><td><a href="get_dealers.html">Get Dealers</a></td></tr>
<tr><td><a href="dealers.php">Dealers Data</a></td></tr>
<tr><td><a href="get_deals.php">Get Deals</a></td></tr>
<tr><td><a href="deals.php">Deals Data</a></td></tr>
</table>

</body>
</html>