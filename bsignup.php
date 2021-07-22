<?php
$mail=$_POST['mailidapoor'];
$uname=$_POST['username'];
$pword=$_POST['password'];
$cpassword=$_POST['cpassword'];
$tel=$_POST['mobilenum'];
$image=$_FILES['profilepicture']['name'];
//connection
$conn=new mysqli('localhost','root','','GetaCar');

//generating verification key
$vkey=mt_rand(1000,9999);

if($conn->connect_error)
	{
	die("connection failed:".$conn->connect_error);
	}
else
{
$query="select mailid from buyers where mailid='$mail'";
$result=mysqli_num_rows(mysqli_query($conn,$query));
if($result)
	{
	echo "<h1 style='color:green;text-align:center'>you have already registered</h1>";	
	}
else
	{
	//img upload
	$target="buyersprofile/".basename($_FILES['profilepicture']['name']);
	$image=$_FILES['profilepicture']['name'];
	$query="insert into buyers(mailid,username,password,repassword,mobilenum,profilepic) values('$mail','$uname','$pword','$cpassword','$tel','$image')";
	mysqli_query($conn,$query);
	if(move_uploaded_file($_FILES['profilepicture']['tmp_name'],$target))
		{
		echo "\n\n\n<h1 style='color:green;text-align:center'>uploaded successfully</h1>";	
		}
	else
		{
		echo "\n\n\n<h1 style='color:red;text-align:center'>uploaded failed</h1>";
		}
	}
$conn->close();
}
?>
