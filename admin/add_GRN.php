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

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Record GRN</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>GRN No:</td>
					<td><input type="text" name="GRN_no"></td>
					</tr>
					<tr>
					<td>GRN Date:</td>
					<td><input type="date" name="GRN_date"></td>
					</tr>
					<tr>
					<td>Purchase Order No:</td>
					<td><input type="text" name="po_no"></td>
					</tr>
					<tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="record1" value="Record GRN"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["record1"]))
{



mysqli_query($link,"insert into grn values('$_POST[GRN_no]','$_POST[GRN_date]','$_POST[po_no]')");

				?>
                <script type="text/javascript">
				alert("GRN recorded successfully");
				</script>
                
                <?php

}

?>					
					
					
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
