
<?php
session_start();
?>
<?php

$conn = mysqli_connect("localhost","root","","online_shopping");
if(!$conn)
{
	die("cannot connect ot database ".mysqli_connect_error());
}
if(isset($_POST['btn_submit']))
{
	$sql = mysqli_query($conn,"select * from registered_customers where user_name='$_POST[u_name]'");
if(mysqli_num_rows($sql)>0)
{
	echo"<script>alert('username already exits')</script>";
	echo"<script>location.href='signup.php'</script>";
}
else
{
	$un = $_POST['u_name'];
	$email = $_POST['email'];
	$pass=$_POST['password'];


	$sql2 = mysqli_query($conn,"insert into registered_customers values ('$un','$email','$pass')");
	$_SESSION["uname"]=$un;

	if($sql2)
	{
		$sql3 = mysqli_query($conn,"insert into cus_details values ('','','$un','','','','')");
		echo"<script>location.href='index.php'</script>";
	}
	else
	{
		echo"not inserted";
	}

}
}



?>