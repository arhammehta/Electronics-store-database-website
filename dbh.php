
<?php
session_start();
//echo $_SESSION["uid"]."dbh<br>";
//gives error first time for reasons unknown to me,works fine if the page is refreshed once
$servername="localhost";
$username="root";
$userpassword="";
$dbname="e-commerce";
$uid;
$conn=mysqli_connect($servername,$username,$userpassword,$dbname);
if(!$conn){ 
 echo "Connection failed";}
else{ 
	echo "(Connection established)<br>";
}
?>	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button onclick="location.href = 'logout.php';" >Logout</button>
<br>
</body>
</html>