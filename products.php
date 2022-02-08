<!DOCTYPE HTML>
<html>
<head>
<title>Products</title>
	<meta charset="utf-8">
    <meta name="author" content="Soash">
<link href="data.css"
	  rel="stylesheet"
	  type="text/css">
</head>
<body>
<?php
include 'config.php';
$con = new mysqli($host,$username,$password,$database);

if($con->connect_error)
	{die("Error : ".$con->connect_error);}
	
$products=$_POST['products'];
$price=$_POST['price'];
$sell_price=$price + $price*0.2;
$quantity=$_POST['quantity'];

if($products==NULL)
	{goto A;}
	
$sql="
INSERT INTO `Books`(Products,Price,Sell_Price,Quantity)
VALUES('".$products."',
       '".$price."',
       '".$sell_price."',
       '".$quantity."');";

$result = $con->query($sql);
if(!$result)
	{echo "error Entry!!!<br>";}
A:	
$table = $con->query("SELECT * FROM `Books`;");
if(!$table)
	{echo "error Table!!!";}
	
echo "<table>
<caption>Products List</caption>
<thead>
<tr>
<th>Products</th>
<th>Price</th>
<th>Sell_Price</th>
<th>Quantity</th>
</tr>
</thead>
<tbody>";

while($row = $table->fetch_array())
{
echo "<tr>";
echo "<td>".$row['Products']."</td>";
echo "<td>".$row['Price']."</td>";
echo "<td>".$row['Sell_Price']."</td>";
echo "<td>".$row['Quantity']."</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>
</html>
