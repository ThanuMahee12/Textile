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
                        <li><a class="menuitem">Supplier Invoice</a>
                            <ul class="submenu">
                                <li><a href="add_sinv.php">Record Supplier Invoice</a> </li>
                                <li><a href="view_sinv.php">View & Modify Supplier Invoice table</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>


        <div class="grid_10">
            <div class="box round first">
                <h2>
                Supplier Invoice Page
                    </h2>
                <div class="block">
                 <a href="add_sinv.php">Record</a>, <a href="view_sinv.php">view</a>, <a href="view_sinv.php">update</a> Supplier Invoice table from here.
                </div>
            </div>

<?php
include "admin_footer.php";
?>