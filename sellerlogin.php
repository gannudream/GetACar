<!DOCTYPE HTML>
<?php
session_start();
$mail=$_POST['mailid'];
$passwd=$_POST['password'];
$_SESSION['mail']=$mail;
$_SESSION['password']=$passwd;
//connection to server
$conn=new mysqli('localhost','root','','GetaCar');
if($conn->connect_error)
	{
	echo "server connection failed:".$conn->connect_error;
	}
else
{
$query="select mailid from sellers where mailid='$mail'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res))
	{
	$temp=1;
	$query="select password from sellers where mailid='$mail' and password='$passwd'";
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res))
		{
		header("location:sellermain.php");
		}
	else
		{?>
		<style>
		#password
			{
			border-bottom:2px solid red;
			}
		</style>
		<?php
		}
	}
else
	{
	?>
	<style>
		#password
			{
			border-bottom:2px solid red;
			}
		#mailid
			{
			border-bottom:2px solid red;
			}
	</style>
	<?php
	}
$conn->close();
}
?>
<html>
<head>
<title>SellerLogin</title>
<link rel="icon" href="img/carlogo2.png" type="image/icon"/>
<script>
function clearerror()
		{
		document.getElementById("password").style.border="none";
		document.getElementById("mailid").style.border="none";
		}
</script>
<style>
table
	{
	margin-top:8%;
	margin-left:32%;
	background:lightgreen;
	padding:20px;
	border-radius:10px;
	}
input
	{
	border:none;
	padding:12px;
	font-size:18px;
	background:lightgreen;
	}
img
	{
	width:90px;
	height:80px;
	margin-top:-50%;
	margin-left:70%;
	}
a
	{
	text-decoration:none;
	margin-left:50%;	
	}
button
	{
	margin-top:5%;
	margin-left:13%;
	}
#signbutton
	{
	margin-left:94%;
	background:lightgreen;
	padding:6px;
	border-radius:13px;
	}
</style>
</head>
<body>
<a href="sellersignup.html" target="_self" id="signbutton">Signup</a>
<table>
<form name="myform" action="" method="post">
<thead>
	<td></td>
	<td><img id="car" src="img/carlogo2.png"></td>
</thead>
<tr>
	<td>Mail-id:</td>
	<td><input type="mail" name="mailid" id="mailid" placeholder="enter your mail id" maxlength="30" onclick="clearerror()"></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="password" id="password" placeholder="enter your password" maxlength="10" onclick="clearerror()"></td>
</tr>
<tr>
	<td></td>
	<td><a href="forgot.html">?forgot password</a></td>
</tr>
<tr>
	<td></td>
	<td><button>submit</button></td>
</tr>
</form>
</table>
</body>
</html>
