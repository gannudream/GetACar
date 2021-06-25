<!DOCTYPE HTML>
<html>
<head>
<?php
$path1=$_POST['path1'];
$path2=$_POST['path2'];
$conn=new mysqli('localhost','root','','GetaCar');
if($conn->connect_error)
	{
	echo "connection failed:".$conn->connect_error;
	}
else
{
$query="select * from cars where path1='$path1' and path2='$path2'";
$result=mysqli_query($conn,$query);
$query="select * from sellers where mailid='$path1'";
$profile=mysqli_query($conn,$query);
$profile=mysqli_fetch_array($profile);
$propath="images/".$path1."/".$profile['profilepic'];
echo "<img src='$propath' id='propic' alt='no image'><br>";
$result=mysqli_fetch_array($result);
$r="images/".$path1."/".$path2."/";
$r1=$r.$result['image1'];
$r2=$r.$result['image2'];
$r3=$r.$result['image3'];
$r4=$r.$result['image4'];
echo "<div id='adj'>";
echo "<img src='$r1' id='carimages' alt='no image'>";
echo "<img src='$r2' id='carimages' alt='no image'>";
echo "<img src='$r3' id='carimages' alt='no image'>";
echo "<img src='$r4' id='carimages' alt='no image'>";
echo "</div>";
$t1=$result['ccompanymodel'];
$t2=$result['cmkms'];
$t3=$result['ccompany'];
$t4=$result['cprice'];
$t5=$result['ctt'];
$t6=$result['cfuel'];
$t7=$result['cmyear'];
//.....................................................................
$sellermail=$profile['mailid'];
$sellerphone=$profile['mobilenum'];
//.....................................................................
echo "<table id='data'>
	<tr>
	<td><b>company:</b></td>
	<td>$t3</td><br>
	</tr>
	<tr>
	<td><b>model:</b></td>
	<td>$t1</td><br>
	</tr>
	<tr>
	<td><b>price:</b></td>
	<td>$t4/-</td><br>
	</tr>
	<tr>
	<td><b>manuf year:</b></td>
	<td>$t7</td><br>
	</tr>
	<tr>
	<td><b>fuel type:</b></td>
	<td>$t6</td><br>
	</tr>
	<tr>
	<td><b>transmission:</b></td>
	<td>$t5</td><br>
	</tr>
	<tr>
	<td><b>kms drove:</b></td>
	<td>$t2</td><br>
	</tr>
	<tr>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td><b>Consult Owner:</b></td>
	</tr>
	<tr>
	<td><b>Mail id:</b></td>
	<td>$sellermail</td>
	</tr>
	<tr>
	<td><b>Phone num:</b></td>
	<td>$sellerphone</td>
	</tr>
	</table>";
echo "<br>";
echo "<form action='buyermain.php'>";
echo "<button id='back'>Back</button>";
echo "</form>";
echo "<button onclick='fun()' id='print'>print</button>";
}
?>
<script>
function fun()
	{
	window.print();
	}
</script>
<style>
#propic
	{
	width:60px;
	height:60px;
	margin-left:46%;
	border-radius:50px;
	border:2px solid green;
	box-shadow:3px 3px 3px black;	
	}
#carimages
	{
	width:200px;
	height:200px;
	margin-top:1.5%;
	box-shadow:4px 4px 4px 4px black;
	border:2px solid green;
	}
#carimages:hover
	{
	width:400px;
	height:400px;
	position:absolute;
	}
#adj
	{
	margin-left:17%;
	}
#data
	{
	margin-top:-8%;
	margin-left:40%;
	}
#back
	{
	margin-left:47%;
	}
#print
	{
	margin-left:47%;
	margin-top:2%;
	}
</style>
</head>
<body>
</body>
</html>
