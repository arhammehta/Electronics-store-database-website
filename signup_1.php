<?php
include_once 'dbh.php';

$Err="";
if (empty($_POST["bdate"])) {
    $dobErr = "Date is required";
  } else {
     $dob = strtotime($_POST["bdate"]);
  $dob = date('Y-m-d', $dob);
    
  }
  if (empty($_POST["fname"])) {
    $Err = "Firstname is required<br>";
  } else {
    $firstname = test_input($_POST["fname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $Err .= "Only letters and white space allowed<br>"; 
    }
}
   if (empty($_POST["lname"])) {
    $Err .= "Lastname is required<br>";
  } else {
    $lastname = test_input($_POST["lname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $Err .= "Only letters and white space allowed<br>"; 
    }
  }
 if (empty($_POST["email"])) {
    $Err .= "Email is required<br>";
  } else {
    $email = test_input($_POST["email"]);
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $Err .= "Invalid email format<br>"; 
    }
  }
/* 
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }
*/
  if (empty($_POST["address"])) {
    $Err .= "Address is required<br>";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["gender"])) {
    $Err .= "Gender is required<br>";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["phone"])) {
    $Err .= "Phone Number is required<br>";
  } else {
    $phone = ($_POST["phone"]);
    
    if (!preg_match("/^\d{10}$/",$phone)) {
      $Err .= "Please enter a valid phone number<br>"; 
      
    }
    
}
 if (empty($_POST["password_1"]) || empty($_POST["password_2"])) {
    $Err .= "Password is required<br>";
  } else {
  	$password_1=$_POST["password_1"];
  	$password_2=$_POST["password_2"];
  	if($password_1!=$password_2){
    $Err .= "Passwords do not match<br>";
	}else{
		$password=md5($password_1);
	}
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($Err)) {
$sql="insert into customers(firstname,lastname,dob,phone,address,email,gender,password) values ('$firstname','$lastname','$dob','$phone','$address','$email','$gender','$password');";

  
if (mysqli_query($conn,$sql)){
	//echo "NewbRecord created successfuly";
	header("Location: ../login.php");
} else { 
	echo "Error: ".$sql."<br>".mysqli_error($conn);
}
}else{echo "<br>Error: Missing Fields <br>" .$Err;}
?>