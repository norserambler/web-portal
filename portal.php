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
	
 $em = "";

if(isset($_POST['em'])){
    $em = $_POST['em'];
}
 
 $em = stripcslashes($em);
$result = mysqli_query($conn,"select * from leaves where Email = '$em'")
  or die('Failed to query database');
 $row = mysqli_fetch_array($result);
 if($row['Email']==$em)
 {
	 echo '<form action="portal2.php" method="POST">
	<center><p><label>ID:</label>'.$row['id'],
	'
	<br>
	<label>User ID:</label><br><input type="text" name="User_id" placeholder="User ID">
	<br>
	<label>Start Date of Leave:</label><br><input type="date" name="st_date" placeholder="Start date of leave">
	<br>
	<label>End Date of Leave:</label><br><input type="date" name="end_date" placeholder="End Date of Leave:">
	<br>
	<label>Type of leave</label><br><select id="input" name="type_leave">
	<option>option1</option>
	<option>option2</option>
	<option>option3</option>
	</select>
	<br>
	<label>Reason:</label><br><input type="text" name="reason" placeholder="Reason">
	<br>
	<label>Approved or not:</label><br><select id="input" name="app_p">
	<option>Yes</option>
	<option>No</option>
	</select>
	<br><label>Email:</label><br><input type="text" name="email" placeholder="Email">
	<br></p>
	<button type="submit" name="submit">Confirm</button></center>
</form>';
 }
 else
	 echo'<p>Failed Login.Go back to login page</p>
 <br><button><a href="login.html">login page</a></button>';
?>

