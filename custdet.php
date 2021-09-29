<!DOCTYPE html>
<html>
<head>
	<title>Change details</title>
</head>
<body>

<?php

include_once 'dbh.php';

?><br>
	<form action="custdet_1.php" method="Post">
  	<label for="fname">First Name:</label>
      <input type="text"  name="fname" value="<?php echo $_SESSION["firstname"];?>">
     <br><br>
     <label for="lname">Last Name:</label>
      <input type="text"  name="lname" value="<?php echo $_SESSION["lastname"];?>" >
     <br><br>
     <label for="bdate">Date of Birth:</label>
      <input style="color: gray;" type="date"  name="bdate" >
     <br><br>
     <label for="phone">Contact Number:</label>
      <input type="text" size="10" pattern="\d*"  name="phone" value="<?php echo $_SESSION["phone"];?>">
     <br><br>
     <label for="address">Address:</label>
      <input type="text" placeholder="Enter Address" name="address" value="<?php echo $_SESSION["address"];?>">
     <br><br>
     <label for="gender">Gender:</label> <br>
      <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male <br></label>
      <label class="radio-inline"><input type="radio" name="gender" value="Female">Female <br></label>
      <label class="radio-inline"><input type="radio" name="gender" value="Other">Other </label>
     <br><br>
     <label for="address">Password:</label>
      <input type="text"  name="password" value="<?php echo $_SESSION["password"];?>" >
     <br><br>
      <input type="hidden" name="customer_id" value="<?php echo $_SESSION["uid"];?>" >
     <button type="submit" name="submit">Update details</button>
   </form>
 

</body>
</html>