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


        <div class="grid_10">
            <div class="box round first">
                <h2>
                Product Page
                    </h2>
                <div class="block">
                 <a href="add_product.php">Add</a>, <a href="display_item.php">view</a>,  <a href="display_item.php">update</a>, <a href="display_item.php">delete</a> products from here.
                </div>
            </div>

<?php
include "admin_footer.php";
?>