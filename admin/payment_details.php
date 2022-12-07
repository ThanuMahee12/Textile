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
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
?>


        <div class="grid_10">
            <div class="box round first">
                <h2>
                Bill & Payment Details
                    </h2>
                <div class="block">
                
                <form name="form1" action="" method="post" enctype="multipart/form-data">
								 <table>
                                    <thead>
                                        <th>Bill no</th>
                                        <th>Order id</th>
                                        <th>User name</th>
                                        <th>Total</th>
                                        <th>Payment method</th>
					 				</thead>
                                    <tbody>		
                 <?php
										
                                        
				
					$res=mysqli_query($link,"select * from payment_details order by bill_no asc");		
					while($row=mysqli_fetch_array($res))
					{
					echo "<tr>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["bill_no"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["order_id"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["user_name"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["total"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["payment_method"]; ?>" readonly > <?php echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
					
					
				?>
                
                </div>
            </div>

<?php
include "admin_footer.php";
?>