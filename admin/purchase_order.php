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
                        <li><a class="menuitem">Purchase Orders</a>
                            <ul class="submenu">
                                <li><a href="record_po.php">Record purchase orders</a> </li>
                                <li><a href="view_po.php">View Purchase Orders</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>



        <div class="grid_10">
            <div class="box round first">
                <h2>
               Purchse Order Page
                    </h2>
                <div class="block">
                 <a href="record_po.php">Record</a> & <a href="veiw_po.php">view</a> purchase Orders from here.
                </div>
            </div>

<?php
include "admin_footer.php";
?>