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
                    Display Products</h2>
                <div class="block">
				<?php
				
					$res=mysqli_query($link,"select * from tbl_product");
					echo "<table>";
					echo "<tr>";
					echo "<td style='font-weight:bold'>"; echo"Product Id"; echo "</td>";
					echo "<td style='font-weight:bold'>"; echo"Product Image"; echo "</td>";
					echo "<td style='font-weight:bold'>"; echo"Product Name"; echo "</td>";
					echo "<td style='font-weight:bold'>"; echo"Product Price"; echo "</td>";
					echo "<td style='font-weight:bold'>"; echo"Product Quantity"; echo "</td>";
					echo "<td style='font-weight:bold'>"; echo"Product Category"; echo "</td>";
					echo "</tr>";					
					while($row=mysqli_fetch_array($res))
					{
					echo "<tr>";
					echo "<td>"; echo $row["p_id"]; echo "</td>";
					echo "<td>"; ?> <img src="../user/<?php echo $row["product_image"]; ?>" height="100" width="100"  /> <?php  echo "</td>";
					echo "<td>"; echo $row["p_name"]; echo "</td>";
					echo "<td>"; echo $row["price"]; echo "</td>";
					echo "<td>"; echo $row["p_quantity"]; echo "</td>";
					echo "<td>"; echo $row["category"]; echo "</td>";
					echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["p_id"]; ?>"> DELETE | </a> <?php echo "</td>";
					echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["p_id"]; ?>"> UPDATE </a> <?php echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
				?>
                </div>
            </div>
 

<?php
include "admin_footer.php";
?>