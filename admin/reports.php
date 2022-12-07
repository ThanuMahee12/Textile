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
                        <li><a class="menuitem">Reports</a>
                            <ul class="submenu">
                                <li><a href="pdf/productrep.php">Product Report</a> </li>
                                <li><a href="pdf/orderrep.php">All Orders</a> </li>
                              	<li><a href="pdf/ordercompleted.php">Completed Orders</a> </li>
                                <li><a href="pdf/orderprocess.php">processing orders</a> </li>
                                <li><a href="pdf/ordercancel.php">Canceled orders</a> </li>
                                <li><a href="pdf/cusdetails.php">All Consumer Details</a> </li>
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
                   Reports</h2>
                <div class="block">
                    Manage & generate reports here.
                </div>
            </div>
<?php
include "admin_footer.php";  
  
?>         
