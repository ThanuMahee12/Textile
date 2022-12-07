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


<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Record Supplier Invoice</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Invoice No:</td>
					<td><input type="text" name="sinv_no"></td>
					</tr>
					<tr>
					<td>Invoice Date:</td>
					<td><input type="date" name="sinv_date"></td>
					</tr>
					<tr>
					<td>Purchase Order No:</td>
					<td><input type="text" name="po_no"></td>
					</tr>
					<tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="record1" value="Record Invoice"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["record1"]))
{



mysqli_query($link,"insert into sup_invoice values('$_POST[sinv_no]','$_POST[sinv_date]','$_POST[po_no]')");

				?>
                <script type="text/javascript">
				alert("Supplier Invoice recorded successfully");
				</script>
                
                <?php

}

?>					
					
					
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
