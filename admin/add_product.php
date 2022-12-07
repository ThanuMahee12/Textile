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
                        <li><a class="menuitem">Products</a>
                            <ul class="submenu">
                                <li><a href="add_product.php">Add Product</a> </li>
                                <li><a href="display_item.php">View & Modify Products</a> </li>
                              
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
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Categoty</td>
					<td>
					<select name="pcategory">
					<option value="Mens_Clothes">Mens Clothes</option>
					<option value="Womens_Clothes">Womens Clothes</option>
					<option value="Mobile_Items">Mobile Items</option>
					</select>
					</td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="../user/images/shop/".$v3.$fnm;
   $dst1="images/shop/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



mysqli_query($link,"insert into tbl_product values('','$_POST[pnm]','$_POST[pprice]','$_POST[pqty]','$dst1','$_POST[pcategory]')");

				?>
                <script type="text/javascript">
				alert("Product added successfully");
				</script>
                
                <?php

}

?>					
					
					
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
