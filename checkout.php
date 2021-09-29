<?php
include_once 'dbh.php';
	$customer_id=$_SESSION['uid'];
	$price=$_SESSION['price'];
if($_POST['checkout']=='cash'){
$sql="insert into orders_cash(customer_id,price) values($customer_id,$price);";
}else{
	$sql="insert into orders_card(customer_id,price) values($customer_id,$price);";
}
mysqli_query($conn,$sql);

echo "<br>past order :<br> ";
$sql="select * from items where customer_id = $customer_id";
$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	echo "<br>Brand Category Price(Rs.)";
		while($row=mysqli_fetch_assoc($result))
				{ 
			echo "<br>"." ".$row['name']." ".$row['category']." ".$row['price'];
		}}else{echo "No items<br>";}
		
 echo "<br><hr><br>current order :<br> ";
$sql=" select * from items where items.id in (select item_id from cart where customer_id='$customer_id');";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	echo "<br>Brand Category Price(Rs.)<br>";
		while($row=mysqli_fetch_assoc($result))
				{
			echo " ".$row['name']." ".$row['category']." ".$row['price']."<br>";
					$iid=$row['id'];
		
		$sqll="";
		$sqll="update items set customer_id='$customer_id' where id=$iid;";
		mysqli_query($conn,$sqll);



		$sqlll="";
		$sqlll="delete from cart where item_id=$iid;";
		mysqli_query($conn,$sqlll);
		//$tprice=$tprice + $row['price'];
		//header("Location: ../includes/items.php");
}//echo "Total price=".$tprice;
		
		}else{echo "No items ";}	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart Updated</title>
</head>
<body>
	<br>
<button onclick="location.href = 'items.php';" >Back to items</button>
</body>
</html>