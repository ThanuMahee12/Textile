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
$res= mysqli_query($link,"select * from grn where GRN_no=$id");
while($row=mysqli_fetch_array($res))
{
	$GRN_no= $row["GRN_no"];
	$GRN_date= $row["GRN_date"];
	$po_no= $row["po_no"];
}
?>

  <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Goods Recieve Note</a>
                            <ul class="submenu">
                                <li><a href="add_GRN.php">Record GRN</a> </li>
                                <li><a href="view_GRN.php">View & Modify GRN table</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>




        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Update GRN table</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>GRN No:</td>
					<td><input type="text" name="grn_no" value="<?php echo $GRN_no; ?>" readonly="readonly"></td>
					</tr>
					<tr>
					<td>GRN Date:</td>
					<td><input type="date" name="grn_date" value="<?php echo $GRN_date; ?>"></td>
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
	mysqli_query($link,"Update grn set GRN_date='$_POST[grn_date]',po_no='$_POST[po_no]' where GRN_no=$id");
					
				
				
				?>
                <script type="text/javascript">
				alert("GRN table has been updated");
				window.location="view_GRN.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>