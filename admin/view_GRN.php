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
                        <li><a class="menuitem">Goods Recieve Note</a>
                            <ul class="submenu">
                                <li><a href="add_GRN.php">Record GRN</a> </li>
                                <li><a href="view_GRN.php">View & Modify GRN table</a> </li>
                              
                            </ul>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>




        <div class="grid_15">
            <div class="box round first">
                <h2>View GRN table</h2>
                <div class="block">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <th>GRN No</th>
                                        <th>GRN Date</th>
                                    	<th>Purchase Order No</th>
                                        <th>Supplier Id</th>
                                    </thead>
                                    <tbody>
                                        <?php
										
										$sql  = mysqli_query($conn,"select grn.GRN_no, grn.GRN_date, grn.po_no, po.s_id 
										FROM grn INNER JOIN po ON
										grn.po_no = po.po_no
										order by GRN_no asc");
                                        while($row = mysqli_fetch_assoc($sql))
										{	
                                        echo "<tr>";
                                        echo "<td>"; ?> <input type="text" value="<?php echo $row["GRN_no"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"   value="<?php echo $row["GRN_date"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["po_no"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_id"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <a href="update_GRN.php?id=<?php echo $row["GRN_no"]; ?>"> Update GRN </a> <?php echo "</td>";
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