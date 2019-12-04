<?php
	
	$conn= mysqli_connect('localhost','root','','estone');
	if(!$conn)
	{
		echo 'not connected to server';
	}
	if(!mysqli_select_db($conn,'estone'))
	{
		echo 'Database not selected';
	}
	$id = $_POST['id'];
	$name = $_POST['name'];
	$desid = $_POST['desid'];
	$empid = $_POST['empid'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	
	$sql="INSERT INTO user1 (id, full_name,des_id,emp_id,username,password,email)
	VALUES('$id','$name','$desid','$empid','$user','$pass','$email')";
	//$conn->query($sql);
	if(!mysqli_query($conn,$sql))
	{
		echo 'Not inserted';
	}
	else
	{		echo 'Inserted';
	}
?>