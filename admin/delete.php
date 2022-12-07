<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
$id=$_GET["id"];
mysqli_query($link,"delete from tbl_product where p_id= $id ");
?>
<script type="text/javascript">
alert("Product has been deleted");
window.location = "display_item.php";
</script>