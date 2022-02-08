<!DOCTYPE HTML>
<html>

<head>
<title>Get Deals</title>
	<meta charset="utf-8">
    <meta name="author" content="Soash">
<link href="get_data.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<?php
include 'config.php';
$con = new mysqli($host,$username,$password,$database);
$dealers = $con->query("SELECT `Dealers` FROM Dealers;");
$books = $con->query("SELECT `Products` FROM Books;");
?>

<div class="div1 center">
<form action="deals.php" method="post">
<legend>GET DEALS</legend>

<select name="dealers">
<option selected>Dealers</option>
<?php
while($row1 = $dealers->fetch_array())
{
$dn=$row1['Dealers'];
echo "<option>".$dn."</option>";
//dn=dealers name
}?>
</select>

<select name="books">
<option selected>Books</option>
<?php
while($row2 = $books->fetch_array())
{
$bn=$row2['Products'];
echo "<option>".$bn."</option>";
//bn=books name
}?>
</select>

<input name="quantity"
	   type="number"
	   placeholder="Quantity">
<input type="submit">

</form>
</div>

</body>
</html>
