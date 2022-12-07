<?php
session_start();
$conn = mysqli_connect("localhost","root","","online_shopping");
?>
<?php

if(isset($_SESSION["uname"]))
{
	$uid=$_SESSION["uname"];
		$sql = mysqli_query($conn,"select * from tbl_cart where username='$uid'");
		while ($row = mysqli_fetch_assoc($sql)) {
				$pn=$row['p_name'];
				$pid=$row['pid'];
				$price = $row['price'];
				$qty=$row['quantity'];
				$total=$row['total'];
				$date = date('Y-m-d');
			mysqli_query($conn,"insert into tbl_order values('$uid','','$pn','$price','$qty','$pid','$total', '$date','processing')");
			$sql1 = mysqli_query($conn,"select p_quantity from tbl_product where p_id='$pid'");
			$row1 = mysqli_fetch_assoc($sql1);
			$redd = $row1['p_quantity']-$qty;
			mysqli_query($conn,"update tbl_product set p_quantity='$redd' where p_id='$pid'");
		}
		mysqli_query($conn,"delete from tbl_cart where username='$uid'");
		echo "<script>alert('Order placed')</script>";
		echo"<script>location.href='index.php'</script>";

}

?>
