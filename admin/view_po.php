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
$conn = mysqli_connect("localhost","root","","online_shopping");
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




        <div class="grid_15">
            <div class="box round first">
                <h2>View Purchase Orders</h2>
                <div class="block">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <th>Purchase Order No</th>
                                        <th>Purchase Order Date</th>
                                    	<th>Supplier Id</th>
                                    	<th>Purchase Order Total</th>
                                    </thead>
                                    <tbody>
                                        <?php
										
										$sql  = mysqli_query($conn,"select * from po order by po_no asc");
                                        while($row = mysqli_fetch_assoc($sql))
										{	
                                        echo "<tr>";
                                        echo "<td>"; ?> <input type="text" value="<?php echo $row["po_no"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"   value="<?php echo $row["po_date"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_id"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="$<?php echo $row["total"]; ?>" readonly > <?php echo "</td>";	
										echo "<td>"; ?> <a href="update_po.php?id=<?php echo $row["po_no"]; ?>"> Update Purchase Order </a> <?php echo "</td>";
                                        echo "</tr>";
										
										
                                        }
										  
										?>
                                       
										
								
                                       

                                    </tbody>
                                </table>
                                </form>
                  

                            </div>
                        </div>
        
        

<?php
include "admin_footer.php";
?>