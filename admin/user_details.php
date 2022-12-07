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
                    Users</h2>
                <div class="block">
				 		<form name="form1" action="" method="post" enctype="multipart/form-data">
								 <table>
                                    <thead>
                                        <th>User Name</th>
                                        <th>Email</th>
					 				</thead>
                                    <tbody>		
                 <?php
				
					$res=mysqli_query($link,"select * from registered_customers");		
					while($row=mysqli_fetch_array($res))
					{
					echo "<tr>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["user_name"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <input type="text"  value="<?php echo $row["email"]; ?>" readonly > <?php echo "</td>";
					echo "<td>"; ?> <a href="delete_user.php?name=<?php echo $row["user_name"]; ?>"> Delete User </a> <?php echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
				?>
                </div>
            </div>
 

<?php
include "admin_footer.php";
?>