<?php
include_once 'dbh.php';
$customer_id=$_SESSION["uid"];
$sql="delete from customers where id='$customer_id';";
  	mysqli_query($conn,$sql);
  	header("Location: ../login.php");
?>