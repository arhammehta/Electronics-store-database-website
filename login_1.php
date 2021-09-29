<?php

include_once 'dbh.php';

$username=mysqli_escape_string($conn,$_POST['username']);
$password=mysqli_escape_string($conn,$_POST['password']);
$password=md5($password);

$sqll="select * from customers where email='$username' and password='$password';";
$result=mysqli_query($conn,$sqll);
$resultCheck=mysqli_num_rows($result);

if($resultCheck>0){
	$Row=mysqli_fetch_assoc($result);
		//$uid=$Row['id'];
	//$_SESSION["uid"]=$Row['id'];
	
	$_SESSION["uid"] = $Row['id'];
	$_SESSION["firstname"] = $Row['firstname'];
	$_SESSION["lastname"] = $Row['lastname'];
	$_SESSION["phone"] = $Row['phone'];
	$_SESSION["address"] = $Row['address'];
	$_SESSION["password"] = $_POST['password'];



		echo "<br>".$Row['firstname'].",you have successfully logged in<br>Your Username is: ".$Row['email'];
		//header("Location: ../includes/items.php");
		
	//include_once 'items.php';
	}
	else{header("Location: ../login.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
</head>
<body>
	<br><br>
<button onclick="location.href = 'items.php';" >to items</button>
<button onclick="location.href = 'custdet.php';" >change account details</button>
<button onclick="location.href = 'delcust.php';" >delete account</button>
</body>
</html>