<!DOCTYPE HTML>
<html>
<head>
<title>Deals</title>
	<meta charset="utf-8">
    <meta name="author" content="Soash">
<link href="data.css"
	  rel="stylesheet"
	  type="text/css"/>
</head>
<body>
<?php
include 'config.php';
$con = new mysqli($host,$username,$password,$database);
	if($con->connect_error)
	{
	die("Error : ".$con->connect_error);
	}
	
$dealers=$_POST['dealers'];
$books=$_POST['books'];
$quantity=$_POST['quantity'];

if($dealers==NULL)
	{goto A;}

$sql="
INSERT INTO `Deals`(Dealers,Books,Quantity)
VALUES('".$dealers."',
       '".$books."',
       '".$quantity."');";

$result = $con->query($sql);
if(!$result)
	{echo "error Entry!!!<br>";}
A:	
$table = $con->query("SELECT * FROM `Deals` ORDER BY `Dealers` ASC;");
if(!$table)
	{echo "error Table!!!<br>";}
	
echo "<table>
<caption>Deals</caption>
<thead>
<tr>
<th>Dealers</th>
<th>Books</th>
<th>Quantity</th>
</tr>
</thead>
<tbody>";

while($row = $table->fetch_array())
{
echo "<tr>";
echo "<td>".$row['Dealers']."</td>";
echo "<td>".$row['Books']."</td>";
echo "<td>".$row['Quantity']."</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>
</html>
