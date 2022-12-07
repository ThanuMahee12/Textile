<?php
session_start();

?>
<?php


$username=$_SESSION["uname"];
$conn = mysqli_connect("localhost","root","","online_shopping");

echo "$username";

	$id = $_GET['id1'];
	echo "$id";
	if(mysqli_query($conn,"delete  from tbl_cart where pid=$id"))
	{
		echo "deleted";
		echo "<script>location.href='cart.php'</script>";
	}


?>
