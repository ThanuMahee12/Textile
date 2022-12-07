<?php
session_start();
?>
<?php

$conn = mysqli_connect("localhost","root","","online_shopping");
if(isset($_POST['submit3']))
{
$sql = mysqli_query($conn,"select * from registered_customers where user_name='$_POST[username3]' && pwd='$_POST[u_pwd3]'");
if(mysqli_num_rows($sql)>0)
{
	$_SESSION["uname"]="$_POST[username3]";
	echo"<script>location.href='light-bootstrap-dashboard-master/BS3/user.php'</script>";
}
else
{
	echo "<script>alert('invalid password')</script>";

	echo"<script>location.href='login.php'</script>";
	
}
}





?>