<?php 
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
$un=$_POST["username"];
if(isset($_POST["submit2"]))
{
				$res=mysqli_query($link,"select * from registered_customers where user_name='$_POST[username3]'");
					while($row=mysqli_fetch_array($res))
					{
						                       
						echo "error";
					}

			
				else{
				mysqli_query($link,"insert into registered_customers values('$_POST[username]','$_POST[email2]','$_POST[u_pwd]')");}


			
			
}




 ?>