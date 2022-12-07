<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
$id=$_GET["id"];
mysqli_query($link,"delete from supplier where s_id=$id");
?>
<script type="text/javascript">
alert("supplier has been deleted");
window.location = "view_sup.php";
</script> 