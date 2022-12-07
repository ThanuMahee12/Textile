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



        <div class="grid_15">
            <div class="box round first">
                <h2>View Supplier Details</h2>
                <div class="block">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <th>Supplier Id</th>
                                        <th>Supplier Name</th>
                                    	<th>Supplier Address</th>
                                    	<th>Supplier Email</th>
                                        <th>Supplier Phone Number</th>
                                    </thead>
                                    <tbody>
                                        <?php
										
										$sql  = mysqli_query($conn,"select * from supplier order by s_id asc");
                                        while($row = mysqli_fetch_assoc($sql))
										{	
                                        echo "<tr>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_id"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_name"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_addr"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_email"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["s_phone"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <a href="delete_sup.php?id=<?php echo $row["s_id"]; ?>"> DELETE Supplier|</a> <?php echo "</td>";
										echo "<td>"; echo " "; echo "</td>";	
										echo "<td>"; ?> <a href="update_sup.php?id=<?php echo $row["s_id"]; ?>"> UPDATE supplier details </a> <?php echo "</td>";
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