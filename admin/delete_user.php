<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
$name=$_GET["name"];
mysqli_query($link,"delete from registered_customers where user_name='$name'");
mysqli_query($link,"delete from cus_details where UserName='$name'");
?>
<script type="text/javascript">
alert("<?php echo $name; ?> user has been deleted");
window.location = "user_details.php";
</script>