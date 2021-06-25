<!DOCTYPE HTML>
<html>
<head>
<title>BuyerMain</title>
<link rel="icon" href="img/carlogo2.png" type="image/icon"/>
<style>
#profile
	{
	width:60px;
	height:60px;
	border-radius:50px;
	border:2px solid green;
	box-shadow:2px 2px 2px black;
	margin-top:0px;
	margin-left:10px;
	float:left;
	cursor:pointer;
	}
#propic
	{
	margin-left:5%;
	padding:4px;
	border:2px solid firebrick;
	margin-top:16px;
	position:absolute;
	color:firebrick;
	font-size:20px;
	border-radius:20px;
	cursor:pointer;
	}
#sitetitle
	{
	margin-top:7px;;
	color:#FF4D4D;
	font-size:45px;
	font-style:italic;
	position:absolute;
	margin-left:37%;
	}
#logo
	{
	width:90px;
	height:80px;
	margin-left:52.5%;
	position:absolute;
	margin-top:-21px;
	}
#upload
	{
	margin-left:88%;
	position:absolute;
	float:right;
	width:60px;
	height:60px;
	}
#sellertable
	{
	margin-top:100px;
	margin-left:9%;
	}
#sellerrow
	{
	border:4px solid lightgreen;
	}
#move
	{
	margin-top:-150px;
	margin-left:35px;
	}
#col1
	{
	width:50%;
	}
#col2
	{
	width:40%;
	font-size:22px;
	}
#col3
	{
	width:20%;	
	}
#data
	{
	margin-left:-40px;
	}
#getdetails
	{
	padding:10px;
	background:green;
	font-size:22px;
	border:2px solid black;
	border-radius:14px;
	cursor:pointer;
	margin-left:10px;
	color:white;
	}
</style>
</head>
<body>
<h2 id="sitetitle">GetaCar</h2>
<img id="logo" src="img/carlogo2.png">
</body>
</html>
<?php
session_start();
$mail=$_SESSION['maill'];
$password=$_SESSION['passwordd'];
if($mail!=null and $password!=null)
{
//connection to server
$conn=new mysqli('localhost','root','','GetaCar');
if($conn->connect_error)
	{
	echo "server connection failed:".$conn->connect_error;
	}
else
{
$query="select username from buyers where mailid='$mail'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);
$user=$row['username'];
echo "<form action='index.php'>";
echo "<button id='propic'>$user</button>";
echo "</form>";
$query="select profilepic from buyers where mailid='$mail'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);
$path="buyersprofile/".$row['profilepic'];
//.................................................................................................................................
echo "<img src=$path id='profile' onclick='index.php' alt='no image found'><br>";
//.................................................................................................................................
//showing vehicals
$query="select * from cars";
$x=mysqli_query($conn,$query);
if(mysqli_num_rows($x)>0)
	{
	echo "<table id='sellertable'>";
	while($result=mysqli_fetch_array($x))
		{
		$path="images/".$result['path1']."/".$result['path2']."/";
		$path1=$path.$result['image1'];
		//details
		$t1=$result['ccompanymodel'];
		$t2=$result['cmkms'];
		$t3=$result['ccompany'];
		$t4=$result['cprice'];
		$t5=$result['ctt'];
		$t6=$result['cfuel'];
		$t7=$result['cmyear'];
		echo "<tr id='sellerrow'>";
		echo "<td id='col1'><img src='$path1' style='width:400px;height:400px;border-radius:50px;border:4px solid lightgreen;'></td>";
		echo "<td id='col2'>";
		echo "<p id='move'><table id='data'>
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
		</table>
		</p>";
		$p1=$result['path1'];
		$p2=$result['path2'];
		echo "</td>";
		echo "<form action='getdetails.php' method='post'>";
		echo "<td id='col3'><button id='getdetails'>Details</button>
			<input name='path1' type='hidden' value='$p1'>	
			<input name='path2' type='hidden' value='$p2'>		
			</form></td>";
		echo "</tr>";
		}
	echo "</table>";
	}
else
	{
	echo "<img src='img/carlogo2.png' style='opacity:0.5;width:50%;height:50%;margin-top:-8%;margin-left:20%;'>";
	}
$conn->close();
}
}
else
	{
	header("location:index.php");
	}
?>
