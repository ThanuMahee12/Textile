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
$res= mysqli_query($link,"select * from supplier where s_id=$id");
while($row=mysqli_fetch_array($res))
{
	$s_id= $row["s_id"];
	$s_name= $row["s_name"];
	$s_addr= $row["s_addr"];
	$s_email= $row["s_email"];	
	$s_phone= $row["s_phone"];	
}
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




        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Update Supplier Details</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Supplier Id:</td>
					<td><input type="text" name="sid" value="<?php echo $s_id; ?>" readonly="readonly"></td>
					</tr>
					<tr>
					<td>Supplier Name:</td>
					<td><input type="text" name="snm" value="<?php echo $s_name; ?>"></td>
					</tr>
					<tr>
					<td>Supplier Address:</td>
					<td><input type="text" name="saddr" value="<?php echo $s_addr; ?>"></td>
					</tr>
					<tr>
					<td>Supplier Email:</td>
					<td><input type="text" name="semail" value="<?php echo $s_email; ?>"></td>
					</tr>
                    <tr>
					<td>Supplier Phone Number:</td>
					<td><input type="text" name="sphone" value="<?php echo $s_phone; ?>"></td>
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
	mysqli_query($link,"Update supplier set s_name='$_POST[snm]',s_addr='$_POST[saddr]',s_email='$_POST[semail]',s_phone='$_POST[sphone]' where s_id=$id");
					
				
				
				?>
                <script type="text/javascript">
				alert("Supplier details has been updated");
				window.location="view_sup.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>