

<?php
session_start();
?>
<?php
$unname = $_SESSION["uname"];
$conn = mysqli_connect("localhost","root","","online_shopping");
$sql  = mysqli_query($conn,"select * from cus_details where UserName='$unname'");

$row = mysqli_fetch_assoc($sql);


$sql1 = mysqli_query($conn,"select * from registered_customers where user_name='$unname'");
$row1 = mysqli_fetch_assoc($sql1);


?>

<!doctype html>
<html lang="en">
<head>

 						<script type="text/javascript">
							function validation()
							{ 
								var a = document.forms["frm1"] ["fn"].value;
								var b = document.forms["frm1"] ["ln"].value;
								var c = document.forms["frm1"] ["addr"].value;
								var d = document.forms["frm1"] ["city"].value;
								var e = document.forms["frm1"] ["country"].value;
								var f = document.forms["frm1"] ["pcode"].value;
								
								if(a == "")
								{
									alert("First Name must be filled out");
									return false;
								}
								else if(b == "")
								{
									alert("Last Name must be filled out");
									return false;
								}
								else if(c == "")
								{
									alert("Address must be filled out");
									return false;
								}
								else if(d == "")
								{
									alert("City Name must be filled out");
									return false;
								}
								else if(e == "")
								{
									alert("Country Name must be filled out");
									return false;
								}
								else if(f == "")
								{
									alert("Postal Code must be filled out");
									return false;
								}
							}
						</script>
                                

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>My Account</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                
                <li class="active">
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="orderviewing.php">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                 

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="http://localhost:8080/new_project/user/logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post" name="frm1" id="frm1" action="update.php" onSubmit="return validation()">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" readonly value="<?php echo($_SESSION['uname']) ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" readonly placeholder="Email" value="<?php echo($row1['email'])?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fn" id="fn" class="form-control" placeholder="First Name" value="<?php echo($row['FirstName'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="ln" id="ln" placeholder="Last Name" value="<?php echo($row['LastName'])?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="addr" id="addr" placeholder="Home Address" value="<?php echo($row['Address'])?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo($row['City'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo($row['Country'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" name="pcode" id="pcode" placeholder="postal code" value="<?php echo($row['Postalcode'])?>">
                                            </div>
                                        </div>
                                    </div>

                                  

                                    <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                               
                                
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://localhost:8080/UNITEL.CO/user/">
                                Home
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
