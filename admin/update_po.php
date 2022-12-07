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
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
$id = $_GET["id"];
$res= mysqli_query($link,"select * from po where po_no=$id");
while($row=mysqli_fetch_array($res))
{
	$po_no= $row["po_no"];
	$po_date= $row["po_date"];
	$s_id= $row["s_id"];
	$total= $row["total"];	
}
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




        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Update purchase order</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Purchase Order No:</td>
					<td><input type="text" name="po_no" value="<?php echo $po_no; ?>" readonly="readonly"></td>
					</tr>
					<tr>
					<td>Purchase Order Date:</td>
					<td><input type="date" name="po_date" value="<?php echo $po_date; ?>"></td>
					</tr>
					<tr>
					<td>Supplier Id:</td>
					<td><input type="text" name="sid" value="<?php echo $s_id; ?>"></td>
					</tr>
					<tr>
					<td>Purchase Order Total:</td>
					<td><input type="text" name="po_tot" value="<?php echo $total; ?>"></td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit111" value="update"></td>
				</tr>
					
					
					</table>
					
					
					</form>
                </div>
            </div>
            <?php
			if(isset($_POST["submit111"]))
			{
	mysqli_query($link,"Update po set po_date='$_POST[po_date]',s_id='$_POST[sid]',total='$_POST[po_tot]' where po_no=$id");
					
				
				
				?>
                <script type="text/javascript">
				alert("Purchase Order table has been updated");
				window.location="view_po.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>