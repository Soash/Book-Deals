<!DOCTYPE HTML>
<html>
<head>
<title>Dealers</title>
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
	{die("Error : ".$con->connect_error);}
	
$dealers=$_POST['dealers'];
$address=$_POST['address'];
$phone=$_POST['phone'];
if($dealers==NULL)
	{goto A;}
$sql="
INSERT INTO `Dealers`(Dealers,Address,Phone_Number)
VALUES('".$dealers."',
       '".$address."',
       '".$phone."');";

$result = $con->query($sql);
if(!$result)
	{echo "error Entry!!!<br>";}
A:	
$table = $con->query("SELECT * FROM `Dealers`;");
if(!$table)
	{echo "error table!!!<br>";}
	
echo "<table>
<caption>Dealers Data</caption>
<thead>
<tr>
<th>Dealers</th>
<th>Address</th>
<th>Phone Number</th>
</tr>
</thead>
<tbody>";

while($row = $table->fetch_array())
{
echo "<tr>";
echo "<td>".$row['Dealers']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['Phone_Number']."</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>

</body>
</html>
