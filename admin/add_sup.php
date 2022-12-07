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
                        <li><a class="menuitem">Supplier Details</a>
                            <ul class="submenu">
                                <li><a href="add_sup.php">Add Supplier details</a> </li>
                                <li><a href="view_sup.php">View & Modify Supplier details</a> </li>
                              
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
                  Add Supplier Details</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Supplier Name:</td>
					<td><input type="text" name="snm"></td>
					</tr>
					<tr>
					<td>Supplier Address:</td>
					<td><textarea name="saddr" ></textarea></td>
					</tr>
					<tr>
					<td>Supplier Email:</td>
					<td><input type="text" name="semail"></td>
					</tr>
					<tr>
					<tr>
					<td>Supplier Phone No:</td>
                    <td><input type="text" name="sphone"></td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="record1" value="Add Supplier"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["record1"]))
{



mysqli_query($link,"insert into supplier values('','$_POST[snm]','$_POST[saddr]','$_POST[semail]','$_POST[sphone]')");

				?>
                <script type="text/javascript">
				alert("Supplier details addded successfully");
				</script>
                
                <?php

}

?>					
					
					
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
