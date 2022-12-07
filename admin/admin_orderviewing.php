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

  



        <div class="grid_15">
            <div class="box round first">
                <h2>Orders</h2>
                <div class="block">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <th>Order ID</th>
                                        <th>User Name</th>
                                    	<th>Product Name</th>
                                    	<th>Price</th>
                                    	<th>Quantity</th>
                                    	<th>Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
										
										$sql  = mysqli_query($conn,"select * from tbl_order order by order_id asc");
                                        while($row = mysqli_fetch_assoc($sql))
										{	
                                        echo "<tr>";
                                        echo "<td>"; ?> <input type="text" value="<?php echo $row["order_id"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"   value="<?php echo $row["uname"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["p_name"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="$<?php echo $row["price"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["p_quantity"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="$<?php echo $row["total"]; ?>" readonly > <?php echo "</td>";
                                        echo "<td>"; ?> <input type="text"  value="<?php echo $row["order_date"]; ?>" readonly > <?php echo "</td>";
										echo "<td>"; ?> <input type="text"  value="<?php echo $row["order_status"]; ?>" readonly > <?php echo "</td>";	
										echo "<td>"; ?> <a href="update_status.php?id=<?php echo $row["order_id"]; ?>"> Update Status </a> <?php echo "</td>";
                                        echo "</tr>";
										
										
                                        }
										  $sql1 = mysqli_query($conn,"select * from tbl_order where order_status='completed'");
										  while($row1 = mysqli_fetch_array($sql1))
										  {
											$oid = $row1["order_id"];
											$un = $row1["uname"];
											$t = $row1["total"];
											 $query = mysqli_query($conn, "select * from payment_details where order_id='$oid'");
											 if(mysqli_num_rows($query)>0)
											 {
											 }
											 else
											 {
										  		mysqli_query($conn,"insert into payment_details values('','$oid','$un','$t','Cash on Delievery')");
											 }
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