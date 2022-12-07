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
                        <li><a class="menuitem">Display Order</a>
                            <ul class="submenu">
                                <li><a href="admin_orderviewing.php">Orders</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>


        <div class="grid_10">
            <div class="box round first">
                <h2>
                Order Page
                    </h2>
                <div class="block">
                <a href="admin_orderviewing.php">Check & update Orders</a> from here.
                </div>
            </div>

<?php
include "admin_footer.php";
?>