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





        <div class="grid_15">
            <div class="box round first">
                <h2>View Supplier Invoice table</h2>
                <div class="block">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>
                                    	<th>Purchase Order No</th>
                                        <th>Supplier Id</th>
                                    </thead>
                                    <tbody>
                                        <?php
										
										$sql  = mysqli_query($conn,"select sup_invoice.invoice_no, sup_invoice.invoice_date, sup_invoice.po_no, po.s_id 
										FROM sup_invoice INNER JOIN po ON
										sup_invoice.po_no = po.po_no
										order by invoice_no asc");
                                        while($row = mysqli_fetch_assoc($sql))
										{	
                                        echo "<tr>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["invoice_no"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["invoice_date"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["po_no"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_id"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <a href="update_sinv.php?id=<?php echo $row["invoice_no"]; ?>"> Update Invoice </a> <?php echo "</td>";
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