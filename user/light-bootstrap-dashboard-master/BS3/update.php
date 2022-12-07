<?php
session_start();
?>
<?php  
$conn = mysqli_connect("localhost","root","","online_shopping");
$un = $_SESSION["uname"];
if(isset($_POST['update']))
{

$sql = mysqli_query($conn,"update cus_details set FirstName='$_POST[fn]',LastName='$_POST[ln]',Address='$_POST[addr]',City='$_POST[city]',Country='$_POST[country]',Postalcode='$_POST[pcode]' where UserName='$un' ");
if($sql)
{
	echo"<script>alert('Details Changed Successfully')</script>";
	echo"<script>location.href='user.php'</script>";
}




}





?>