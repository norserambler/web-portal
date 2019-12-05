<?php
	
	$conn= mysqli_connect('localhost','root','','leave-portal');
	if(!$conn)
	{
		echo 'not connected to server';
	}
	if(!mysqli_select_db($conn,'leave-portal'))
	{
		echo 'Database not selected';
	}
	$id = $_POST['id'];
	$name = $_POST['name'];
	$desid = $_POST['desid'];
	$empid = $_POST['empid'];
	$teamid = $_POST['teamid'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	
	$sql="INSERT INTO user(id,Full_Name,Designation_ID,EmployeeCode,TeamLead_ID,Username,password,Email)
	VALUES('$id','$name','$desid','$empid','$teamid','$user','$pass','$email')";
	//$conn->query($sql);
	if(!mysqli_query($conn,$sql))
	{
		echo 'Not inserted';
	}
	else
	{		echo 'Thank you for registering . A registration mail has been sent to you email id.';
	}
	if(isset($_POST['submit'])){
	$subject = 'Registration';
$message = 'Thank you for registering';
$headers = 'From: noreply @ company . com';
mail($email,$subject,$message,$headers);
/*if (mail($email, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}*/
	}
?>