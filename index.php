<!DOCTYPE HTML>
<html>
<head>
<title>GetaCar</title>
<link rel="icon" href="img/carlogo2.png" type="image/icon"/>
<style>
#sitetitle
	{
	margin-top:2%;
	color:#FF4D4D;
	font-size:45px;
	font-style:italic;
	text-align:center;
	}
img
	{
	width:90px;
	height:80px;
	margin-top:-70%;
	}
table
	{
	margin-left:37%;
	}
#usertype
	{
	font-size:34px;
	text-align:center;
	margin-top:200px;
	}
a
	{
	border-radius:12px;
	color:black;
	font-style:italic;
	font-size:32px;
	background-color:lightgreen;
	text-decoration:none;
	padding:180px;
	}
</style>
<?php
session_start();
$_SESSION['mail']=null;
$_SESSION['password']=null;
$_SESSION['maill']=null;
$_SESSION['passwordd']=null;
?>
</head>
<body>
<table>
<thead>
	<td><h2 id="sitetitle">GetaCar</h2></td>
	<td><img id="car" src="img/carlogo2.png"></td>
</thead>
</table>
<div id="usertype">
	<a href="buyerlogin.php" target="_self"><b>Buyer</b></a>
	<a href="sellerlogin.php" target="_self"><b>Seller</b></a>
</div>
</body>
</html>
