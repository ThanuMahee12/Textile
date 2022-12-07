<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "admin_header.php";
?>

<div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Purchase Orders</a>
                            <ul class="submenu">
                                <li><a href="record_po.php">Record purchase orders</a> </li>
                                <li><a href="view_po.php">View Purchase Orders</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>


<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Record Purchase Order</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Purchase Order No:</td>
					<td><input type="text" name="pno"></td>
					</tr>
					<tr>
					<td>Purchase Order Date:</td>
					<td><input type="date" name="po_date"></td>
					</tr>
					<tr>
					<td>Supplier Id:</td>
					<td><input type="text" name="sid"></td>
					</tr>
					<tr>
					<tr>
					<td>Purchase Order Total:</td>
                    <td><input type="text" name="tot"></td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="record1" value="Record"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["record1"]))
{

mysqli_query($link,"insert into po values('$_POST[pno]','$_POST[po_date]','$_POST[sid]','$_POST[tot]')");

				?>
                <script type="text/javascript">
				alert("Purchase Order recorded successfully");
				</script>
                
                <?php

}

?>					
					
					
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
