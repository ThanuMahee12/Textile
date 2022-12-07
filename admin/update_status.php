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
$id = $_GET["id"];
$res= mysqli_query($link,"select * from tbl_order where order_id=$id");
while($row=mysqli_fetch_array($res))
{
	$ord_id= $row["order_id"];	
}
?>

        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Update Order Status</h2>
                <div class="block">
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					
                    
					<label>Order Id : </label><input type="text" name="o_id" value="<?php echo $ord_id; ?>" readonly="readonly">	
                    <br/><br/>
					<label>Status : </label><select name="status" >
                                 			<option value="processing">processing</option>
                                 			<option value="completed">completed</option> 
                                 			<option value="canceled">canceled</option>
                        					</select>	
                   <br/><br/>
					<input type="submit" name="update111" value="update status" align="middle" >
				
					
					
					
					
					
					</form>
                </div>
            </div>
            <?php
			if(isset($_POST["update111"]))
			{
					mysqli_query($link,"Update tbl_order set order_status='$_POST[status]' where order_id=$id");
					
				
				?>
                <script type="text/javascript">
				alert("Order Status has been updated");
				window.location="admin_orderviewing.php";
				</script>
                
                <?php
			}
			?>
            
            

<?php
include "admin_footer.php";
?>