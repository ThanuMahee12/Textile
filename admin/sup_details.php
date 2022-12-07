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


        <div class="grid_10">
            <div class="box round first">
                <h2>
               Supplier Details Page
                    </h2>
                <div class="block">
                 <a href="add_sup.php">Add</a>, <a href="view_sup.php">view</a>,  <a href="view_sup.php">update</a>, <a href="view_sup.php">delete</a> Supplier Details from here.
                </div>
            </div>

<?php
include "admin_footer.php";
?>