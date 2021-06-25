<?php
$path1=$_POST['path1'];
$path2=$_POST['path2'];
echo "<form action='deleteexe.php' method='post'>";
echo "<p>are you sure want to delete car?</p>";
echo "<button>delete</button>";
echo "<input name='path1' type='hidden' value='$path1'>";	
echo "<input name='path2' type='hidden' value='$path2'>";
echo "</form>";
echo "<form action='sellermain.php'>";
echo "<button>cancel</button>";
echo "</form>";
?>
