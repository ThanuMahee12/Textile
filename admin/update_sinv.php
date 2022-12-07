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
$res= mysqli_query($link,"select * from sup_invoice where invoice_no=$id");
while($row=mysqli_fetch_array($res))
{
	$invoice_no= $row["invoice_no"];
	$invoice_date= $row["invoice_date"];
	$po_no= $row["po_no"];
}
?>

 
  <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Supplier Invoice</a>
                            <ul class="submenu">
                                <li><a href="add_sinv.php">Record Supplier Invoice</a> </li>
                                <li><a href="view_sinv.php">View & Modify Supplier Invoice table</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>





        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Update Supplier Invoice table</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Invoice No:</td>
					<td><input type="text" name="invoice_no" value="<?php echo $invoice_no; ?>" readonly="readonly"></td>
					</tr>
					<tr>
					<td>Invoice Date:</td>
					<td><input type="date" name="invoice_date" value="<?php echo $invoice_date; ?>"></td>
					</tr>
					<tr>
					<td>Purchase Order No:</td>
					<td><input type="text" name="po_no" value="<?php echo $po_no; ?>"></td>
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
				
	mysqli_query($link,"Update sup_invoice set invoice_date='$_POST[invoice_date]',po_no='$_POST[po_no]' where invoice_no=$id");
					
				
				
				?>
                <script type="text/javascript">
				alert("Supplier Invoice table has been updated");
				window.location="view_sinv.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>