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
$res= mysqli_query($link,"select * from admin_login");
while($row=mysqli_fetch_array($res))
{
	$pwd= $row["password"];	
}
?>
<div class="grid_10">
            <div class="box round first">
                <h2>
                    Change password</h2>
                     <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
                    <label>Current password : </label> <input type="text" name="current_pwd" value="<?php  echo $pwd; ?>" readonly> 	
                   <br/><br/>
					<label>new password : </label> <input type="password" name="new_pwd"> 	
                   <br/><br/>
					<input type="submit" name="changepwd111" value="change password" align="middle" >
				
					
					
					
					
					
					</form>
                </div>
            </div>
             <?php
			if(isset($_POST["changepwd111"]))
			{
					mysqli_query($link,"Update admin_login set password='$_POST[new_pwd]' where username='admin'");
					
				
				?>
                <script type="text/javascript">
				alert("Password has been changed");
				window.location="admin_login.php";
				</script>
                
                <?php
			}
			?>




<?php
include "admin_footer.php";
?>