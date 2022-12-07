<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"online_shopping");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" name="form1" action="" method="post">
    <p><input type="text" placeholder="User Name" required name="a_name" id="a_name" ></p>
    <p><input type="password" placeholder="Password" required name="a_pwd" id="a_pwd" ></p>
    <p><input type="submit" name="submit_a" value="Log in"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php
	if(isset($_POST["submit_a"]))
	{	
		
			$res=mysqli_query($link,"select * from admin_login where username='$_POST[a_name]' && password='$_POST[a_pwd]' ");	
				while($row=mysqli_fetch_array($res))
				{
					$_SESSION["admin"]=$row["username"];
				?>
        		<script type="text/javascript">
					window.location="product.php";
        		</script>
        		<?php
				}
	}
	?>

    
    
  </body>
</html>
