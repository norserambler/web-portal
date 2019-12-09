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
	
 $username = "";

if(isset($_POST['user_name'])){
    $username = $_POST['user_name'];
}
 $password = "";
if(isset($_POST['pass_word'])){
    $password = $_POST['pass_word'];
 }
 $username = stripcslashes($username);
 $password = stripcslashes($password);
 //$username = mysql_real_escape_string($username);
 //$password = mysql_real_escape_string($password);

$result = mysqli_query($conn,"select * from user where Username = '$username' and password = '$password'")
  or die('Failed to query database');
 $row = mysqli_fetch_array($result);
 if ( $row['Username'] == $username && $row['password'] == $password ) {
 echo '<center><p>Login success! Welcome '.$row['Username'],
 '<p><center>Go to your web portal<br>
 <form action="portal.php" method="POST">
 <label>Confirm your email id<br>
 <input type="text" name="em">
 <button type="submit">Go</button></form></center>';
 } else {
     echo '<center><p>Failed to login!<br>
	 <button><a href="login.html">Return</button>
	 </p></center>';
}

?>