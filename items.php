
<!DOCTYPE html>
 <html>
 <head>
 	<title>Items</title>
 </head>
 <?php 
include_once 'dbh.php';
	//echo "Account Created!<br>".$Row['firstname'].",Your Username is: ".$Row['id'];
	//echo $uid."this";
if(empty($_POST["category"]) && empty($_POST["brand"]))
{
	$sql="select * from items where customer_id is NULL;";
}
else{
	if (empty($_POST["brand"]))
	{
		$category=$_POST["category"];
		$sql="select * from items where customer_id is NULL and category='$category';";
	}else{
		if(empty($_POST["category"]))
			{
			$brand=$_POST["brand"];
			$sql="select * from items where customer_id is NULL and name='$brand';";
			}
			else {
				$brand=$_POST["brand"];
				$category=$_POST["category"];
				$sql="select * from items where customer_id is NULL and name='$brand'and category='$category';";
			}
		}
	}



	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0){	
		echo "<br>ID Brand Category Price(Rs.)<br>";
		while($row=mysqli_fetch_assoc($result))
				{
					echo $row['id']." ".$row['name']." ".$row['category']." ".$row['price']."<br>";
				}
		}else{echo "No items available";}
		
 ?>
 <body>

 	<form action="cart.php" method="POST">
 		<br><br>

    <label for="item_id">Add Item:</label>
       <input type="text" pattern="\d*" placeholder="Enter Item Id" name="item_id" >
       <br>
       <input type="hidden" name="customer_id" value="<?php echo $_SESSION["uid"];?>" >
       <button type="submit">Add to cart</button>
 	</form>
 	<br><br>
 	Filters:
 	<form action="items.php" method="POST">
 		<label for="category">Category:</label>
 		<input type="text" name="category">

 		<label for="brand">Brand:</label>
 		<input type="text" name="brand">

 		<!--
 		<label for="price">Max Range:</label>
 		<input type="range" min="500" max="20000" value="5000" name="price">
 		-->

       <button type="submit">Submit</button>
 	</form>
</body>
</html>