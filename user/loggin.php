
<?php
$conn=mysqli_connect("localhost","root","","online_shopping");
if(!$conn)
{
	die("Connetion to the dataBASE FAILED".mysqli_connect_error());
}


if(isset($_post['submit']))
{
		$un = $_POST["unamr"];
		$pass = $_POST["pass"];
		$sql = "select * from registered_customers where user_name='$un' && pwd='$pass'";
		$ret = mysqli_query($conn,$sql);
		if(mysqli_num_rows($ret)>0)
		{
			echo"loooooo";
		}
		else
		{
			echo "invalid";
		}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="#">


<input type="text" name="unamr" placeholder="uname">
<input type="text" name="pass" placeholder="pass">
<input type="submit" name="submit" value="submit">


</form>
</body>
</html>
