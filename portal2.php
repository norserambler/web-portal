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
	$User_id = $_POST['User_id'];
	$st_date = $_POST['st_date'];
	$end_date = $_POST['end_date'];
	$type_leave = $_POST['type_leave'];
	$reason = $_POST['reason'];
	//$app = $_POST['app_p'];
	session_start();
	$email=$_SESSION["ema"];
	
	$sql="UPDATE leaves SET User_id='$User_id',StartDateOfleave='$st_date',EndDateOfLeave='$end_date',typeOfLeave='$type_leave'
	,Reason='$reason',isApproved='no' WHERE Email='$email'";
	//$conn->query($sql);
	//$sql1="INSERT INTO leaves(id,Email)VALUES('$id','$email')";
	if(!mysqli_query($conn,$sql))
	
	{
		echo 'Not inserted';
	}
	
	else
	{		echo '<link rel="stylesheet" type="text/css" href="form.css">
			<div><center><p>Thank you . A mail has been sent to you the respective member.</p></center></div>';
	}
	
	if(isset($_POST['submit'])){
	$subject = 'Leave application';
$message = 'Leave application message';
$headers = 'From: noreply @ company . com';
mail($email,$subject,$message,$headers);
/*if (mail($email, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}*/
	}
?>