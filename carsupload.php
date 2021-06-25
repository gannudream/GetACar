<?php
session_start();
$mail=$_SESSION['mail'];
if($mail!=null)
{
$img1=$_FILES['image1']['name'];
$img2=$_FILES['image2']['name'];
$img3=$_FILES['image3']['name'];
$img4=$_FILES['image4']['name'];
$ccompany=$_POST['ccompany'];
$ccompanymodel=$_POST['ccompanymodel'];
$cprice=$_POST['cprice'];
$cmyear=$_POST['cmyear'];
$cmkms=$_POST['ckms'];
$ctt=$_POST['ctt'];
$cfuel=$_POST['cfuel'];
//connection
$conn=new mysqli('localhost','root','','GetaCar');
if($conn->connect_error)
	{
	die("connection failed:".$conn->connect_error);
	}
else
{
$query="select nitems from sellers where mailid='$mail'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);
$nitems=$row['nitems'];
$tt="item".$nitems;
//uploading car details data entered by user in database
$query="insert into cars(path1,path2,image1,image2,image3,image4,ccompany,ccompanymodel,cprice,cmkms,ctt,cfuel,cmyear) values('$mail','$tt','$img1','$img2','$img3','$img4','$ccompany','$ccompanymodel','$cprice','$cmkms','$ctt','$cfuel','$cmyear')";
if(mysqli_query($conn,$query))
	{
	//creating item folder in users folder
	mkdir("images/$mail/item$nitems");
	$n="item".$nitems;
	$target1="images/$mail/$n/".basename($img1);
	$target2="images/$mail/$n/".basename($img2);
	$target3="images/$mail/$n/".basename($img3);
	$target4="images/$mail/$n/".basename($img4);
	move_uploaded_file($_FILES['image1']['tmp_name'],$target1);
	move_uploaded_file($_FILES['image2']['tmp_name'],$target2);
	move_uploaded_file($_FILES['image3']['tmp_name'],$target3);
	move_uploaded_file($_FILES['image4']['tmp_name'],$target4);
	$nitems++;
	$query="update sellers set nitems=$nitems where mailid='$mail'";
	mysqli_query($conn,$query);
	header("location:sellermain.php");
	}
else
	{
	?>
	<script>
		window.alert("invalid details");
	</script>
	<?php
	} 
$conn->close();
}
}
else
{
echo "you have logged out";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>UploadCar</title>
<style>
table
	{
	margin-top:4%;
	margin-left:30%;
	background:lightgreen;
	padding:20px;
	border-radius:10px;
	}
img
	{
	width:90px;
	height:80px;
	margin-top:-50%;
	margin-left:70%;
	}
input
	{
	border-style:none;
	padding:12px;
	font-size:18px;
	background:lightgreen;
	}
button
	{
	margin-top:5%;
	margin-left:13%;
	}
</style>
</head>
<body>
<table class="carsdata">
<form name="myform" action="" method="post" enctype="multipart/form-data">
<thead>
	<td></td>
	<td><img id="car" src="img/carlogo2.png"></td>
</thead>
<tr>
	<td>car image1:</td>
	<td><input type="file" name="image1" required></td>
</tr>
<tr>
	<td>car image2:</td>
	<td><input type="file" name="image2" required></td>
</tr>
<tr>
	<td>car image3:</td>
	<td><input type="file" name="image3" required></td>
</tr>
<tr>
	<td>car image4:</td>
	<td><input type="file" name="image4" required></td>
</tr>
<tr>
	<td>car company:</td>
	<td><input type="text" name="ccompany" required></td>
</tr>
<tr>
	<td>car company model:</td>
	<td><input type="text" name="ccompanymodel" required></td>
</tr>
<tr>
	<td>car price:</td>
	<td><input type="text" name="cprice" id="cprice" required></td>
</tr>
<tr>
	<td>car manufactured year:</td>
	<td><input type="text" name="cmyear" required></td>
</tr>
<tr>
	<td>car kms:</td>
	<td><input type="text" name="ckms" required></td>
</tr>
<tr>
	<td>car transmission type:</td>
	<td><input type="text" name="ctt" required></td>
</tr>
<tr>
	<td>car fuel type:</td>
	<td><input type="text" name="cfuel" required></td>
</tr>
<tr>
	<td></td>
	<td><button>submit</button></td>
</tr>
</form>
</table>
</body>
</html>
