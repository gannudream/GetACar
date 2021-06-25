<?php
$path1=$_POST['path1'];
$path2=$_POST['path2'];
$conn=new mysqli('localhost','root','','GetaCar');
if($conn->connect_error)
	{
	echo "connection error:".$conn->connect_error;
	}
else
{
$query="delete from cars where path1='$path1' and path2='$path2'";
$res=mysqli_query($conn,$query);
$item="images/".$path1."/".$path2;
system("rm -rf ".escapeshellarg($item));
header("location:sellermain.php");
}
?>
