<?php
session_start();
$conn = mysqli_connect("localhost","root","","online_shopping");
$uname;
$row;
$row1;
$row2;
if(isset($_SESSION["uname"]))
{
	$uname=$_SESSION["uname"];
	$sql=mysqli_query($conn,"select * from cus_details where UserName = '$uname'");
	$row= mysqli_fetch_assoc($sql);
	$sql1 = mysqli_query($conn,"select * from registered_customers where user_name = '$uname'");
	$row1= mysqli_fetch_assoc($sql1);
	
	$sql2 = mysqli_query($conn,"select * from tbl_cart where username='$uname'");
	


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | UNITEL.CO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><h1><span>UNI</span>TEL.CO</h1></a>
						</div>
					</div>
					<div class="col-sm-8">
						<?php  if(isset($_SESSION['uname'])){ ?>
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="light-bootstrap-dashboard-master/BS3/user.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Log Out</a></li>
							</ul>
						</div>
					<?php } else{  ?>
					</div>
					<div class="col-sm-8">
						
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				<?php  }?>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="shop.php">Shop</a></li> 
								
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			


			



			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
                	
                
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						if(mysqli_num_rows($sql)>0)
						{
								
								while($row2= mysqli_fetch_assoc($sql2)){
						
						
						
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo $row2['Item'] ?>" alt="" height="100" width="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $row2['p_name'] ?></a></h4>

							</td>
							<td class="cart_price">
								<p><?php echo $row2['price'] ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $row2['quantity'] ?>" autocomplete="off" size="2" readonly>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $row2['total'] ?></p>
							</td>
                            
						</tr>
					<?php } }

					else
					{
						echo "<script>alert('No Items In Cart to checkout')</script>";
					}




					?>
					




					</tbody>
				</table>
							

			</div>
			<div class="btn-default" style="align-content: center;margin: 30px;text-decoration: underline;">
                    <h2><a href="placeorder.php" name="placeorder">Place Order</a></h2>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>UNI</span>TEL.CO</h2>
							<p>THE BEST ONLINE SHOP</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2019</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span>|</span>HELP AND INFORMATION</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>Got questions? Contact us at 077777777</li>
								<li>No: 120/5, Wijerama (Vidya) Mawatha, Colombo 07, Sri Lanka</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span>|</span>MENU</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="index.html">HOME</a></li>
								<li><a href="shop.php">SHOP</a></li>
								<li><a href="blog.html">BLOG</a></li>
								<li><a href="contact-us.html">CONTACT</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span>|</span>Contact Us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><i class="fa fa-home" aria-hidden="true"></i> Address: <br/>
									No: 120/5, Wijerama (Vidya) Mawatha, Colombo 07, Sri Lanka.</li><br/>
								<li><i class="fa fa-phone" aria-hidden="true"></i> Phone:<br/>
								077-1757509</a></li><br/>
								<li><a href="mailto:info@example.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email:<br/>
								mkgod.sup@gmail.com</li><br/>					 	 
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span>|</span>My Account</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="login.php">LogIn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
								<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 UNITEL.CO. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Assassin1.0</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>