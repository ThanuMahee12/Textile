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
$res= mysqli_query($link,"select * from tbl_product where p_id=$id");
while($row=mysqli_fetch_array($res))
{
	$p_name= $row["p_name"];
	$price= $row["price"];
	$p_quantity= $row["p_quantity"];
	$product_image= $row["product_image"];
	$category= $row["category"];	
}
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




        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Edit Product</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
                    <tr>
                    <td colspan="2" align="center">
                    	<img src="../user/<?php echo $product_image;?>" height="100" width="100" />
                    </td>
                    </tr>
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm" value="<?php echo $p_name; ?>"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value="<?php echo $price; ?>"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty" value="<?php echo $p_quantity; ?>"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Categoty</td>
					<td>

					<select name="pcategory" value="<?php echo $category; ?>" >
                                             <option value="Mens cloths">Mens cloths</option>
                                 			<option value="Womens cloths">Womens cloths</option> 
                                 			<option value="Mobile Items">Mobile Items</option>
                    </select>
					</td>
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
				$fnm=$_FILES["pimage"]["name"];
				
				if($fnm=="")
				{
					mysqli_query($link,"Update tbl_product set p_name='$_POST[pnm]',price='$_POST[pprice]',p_quantity='$_POST[pqty]',category='$_POST[pcategory]' where p_id=$id");
					
				}
				else
				{
				$v1=rand(1111,9999);
  				$v2=rand(1111,9999);
   
   				$v3=$v1.$v2;
   
 				$v3=md5($v3);
   
   
   				$fnm=$_FILES["pimage"]["name"];
   				$dst="../user/images/shop/".$v3.$fnm;
   				$dst1="images/shop/".$v3.$fnm;
  				move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
				
				
					mysqli_query($link,"Update tbl_product set product_image='$dst1', p_name='$_POST[pnm]',price='$_POST[pprice]',p_quantity='$_POST[pqty]',category='$_POST[pcategory]' where p_id=$id");
		
				}
				?>
                <script type="text/javascript">
				alert("Product has been updated");
				window.location="display_item.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>