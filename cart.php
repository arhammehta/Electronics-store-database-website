<?php
include_once 'dbh.php';
//echo $uid."this";
$customer_id=$_POST["customer_id"];
$tprice=0;


if(!empty($_POST["ditem_id"])){
$ditem_id=$_POST["ditem_id"];
$sql="delete from cart where item_id='$ditem_id' and customer_id='$customer_id';";
mysqli_query($conn,$sql);
	//$resultCheck=mysqli_num_rows($result);
}




if (empty($_POST["item_id"])) {
    echo "<br>No item added<br>";
    } else {
    $item_id = $_POST["item_id"];
    
	$sql="select * from items where id=$item_id and customer_id is null;";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{
	


    $sql="insert into cart values ('$customer_id','$item_id');";
	//$sql="UPDATE items SET customer_id = $customer_id WHERE items.id = $item_id AND customer_id is NULL;";
	 if(mysqli_query($conn,$sql))
	{
	//echo "<br><br>Items table updated<br>";
	$sql="select * from items where id=$item_id and customer_id is null;";
  	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0)
		{	
			$row=mysqli_fetch_assoc($result);
			echo "<br>".$row['name']." ".$row['category']." has been added to your cart"."<br>";
			//header("Location: ../includes/items.php");

		}
	}else{echo "<br>Failed to add item<br>";}	

	
	}	else{	echo "No such item id exists<br> ";
		//exit();
}	
}


 
	$sql=" select * from items where items.id in (select item_id from cart where customer_id='$customer_id');";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	echo "<br>Brand Category Price(Rs.)";
		while($row=mysqli_fetch_assoc($result))
				{
		
		echo "<br>".$row['id']." ".$row['name']." ".$row['category']." ".$row['price'];
		//$tprice=$tprice + $row['price'];
		//header("Location: ../includes/items.php");
}//echo "Total price=".$tprice;
		
		}else{echo "No items in your cart<br>";}	
		


		
     $sql="select sum(price) from items where items.id in(select item_id from cart where customer_id='$customer_id');";
     $result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($row['sum(price)']!=NULL){
	echo "<br><br>Total price=". $row['sum(price)']."<br>";
	$_SESSION['price']= $row['sum(price)'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart Updated</title>
</head>
<body>
	<hr>
	<br>Remove from cart:<br>
	<form action="cart.php" method="POST">
<label for="ditem_id">Item ID:</label>
       <input type="text" pattern="\d*" placeholder="Enter Item Id" name="ditem_id" >
       <br>
              <input type="hidden" name="customer_id" value="<?php echo $_SESSION["uid"];?>" >

 		<button type="submit">Remove item</button>
 	</form><br>
<form action="checkout.php" method="POST">
<label for="payment">Payment Option:</label> <br>
      <label class="radio-inline"><input type="radio" name="checkout" value="cash" checked>cash<br></label>
      <label class="radio-inline"><input type="radio" name="checkout" value="card">card<br></label>

     <br>
      		<button type="submit">checkout</button>
</form><hr>
<button onclick="location.href = 'items.php';" >Back to items</button>


</body>
</html>
