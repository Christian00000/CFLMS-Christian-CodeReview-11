<?php

require_once '../dbconnect.php';

if($_POST){
	$category=$_POST["category"];
	$name=$_POST["name"];
	$zipcode=$_POST["zipCode"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$image=$_POST["image"];
	$description=$_POST["description"];
	$hobbies=$_POST["hobbies"];
	$website=$_POST["website"];
	$age=$_POST["age"];

	
	

	$sql="INSERT INTO animal (category, `name`, zipCode, city,`address`,`image`,`description`, hobbies, website, age ) 
	      VALUES ('$category','$name',$zipcode,'$city','$address','$image','$description','$hobbies','$website','$age')";

		

if($conn->query($sql) === TRUE) {
   echo "<p>New Record Successfully Created</p>" ;
   echo "<a href='../create.php'><button class= 'btn btn-primary' type='button'>Back</button></a>";
	echo "<a href='../admin.php'><button type='button'>Home</button></a>";
} else  {
   echo "Error " . $sql . ' ' . $conn->connect_error;
}

$conn->close();
}

?>