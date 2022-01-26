<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Auto Vendor</title>
		<meta name="description" content="Blueprint: Horizontal Slide Out Menu" />
		<meta name="keywords" content="horizontal, slide out, menu, navigation, responsive, javascript, images, grid" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		
		<style>
			html {
              overflow-y: scroll;
            }
			p {
                margin-top: 50px;
                margin-bottom: 50px;
                margin-right: 100px;
                margin-left: 100px;
                text-align: center;
                letter-spacing: 2px;
              }
			
			h1 {
				text-align: center;
			}
			
			div {
				text-align: center;
			}
			
			.container {
				text-align: left;
			}
			
			.sub-control:hover {
            	background-color: #FFFFFF;
				color: #47A3DA;
            }
			
			.sub-control {

                margin: 7px auto;
                display: block;
                width: 20%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #FFFFFF;
                background-color: #47A3DA;
                background-image: none;
                border: 1px solid grey;
                border-radius: 4px;
            }
			
			.inp-control {
                margin: 0 auto;
                display: block;
                width: 20%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
		</style>
		
	</head>
	<body>
		
		<?PHP

            session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{

	}
	else
	{
		echo("
				
			<script>
					
			window.alert('You are not logged in. Log in to gain access to the system');
			window.location.href = '1 index.html';
					
			</script>
					
			");
	}
	
	$StaffID = $_SESSION['StaffID'];
	$dbc = mysqli_connect("localhost", "root", "password", "auto");
	$query = "SELECT Access FROM staff WHERE StaffID = '$StaffID'";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);

	if ($row['Access'] <= 1)
	{
		
	}
	else
	{
		echo("
				
			<script>
					
			window.alert('Your access permissions are insufficient. You cannot access this page.');
			window.location.href = '3 menu.php';
					
			</script>
					
		");
	}

		?>
		
		<div class="container">
			<header class="clearfix">
				<span>Auto Vendor <span class="bp-icon bp-icon-about" data-content="We strive to make transport easy for everyone, not just the more fortunate. We pride ourselves on our excellent value for money."></span></span>
				<h1>Vehicle Rental Specialists</h1>
				<nav>
					<a href="3 menu.php">
						<img src="images/autovendorcar.jpg" alt="img-01" >
					</a>
				</nav>
			</header>	
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="#">Rental Functions</a>
								<ul class="cbp-hssubmenu">
									<li><a href="6 bookingsearch.php"><span>New Rental</span></a></li>
									<li><a href="10 returnsearch.php"><span>Return Rental</span></a></li>
								</ul>
							</li>
							<li>
								<a href="#">Customer Functions</a>
								<ul class="cbp-hssubmenu">
									<li><a href="14 newcustomer.php"><span>New Customer</span></a></li>
									<li><a href="16 amendcustomer.php"><span>Amend Customer</span></a></li>
								</ul>
							</li>
							<li>
								<a href="#">Manager Functions</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="19 newvehicle.php"><span>Book In New Vehicle</span></a></li>
									<li><a href="21 amendvehicle.php"><span>Amend Existing Vehicle</span></a></li>
									<li><a href="24 newstaff.php"><span>Assign New Staff Details</span></a></li>
									<li><a href="26 amendstaff.php"><span>Amend Current Staff Details</span></a></li>
									<li><a href="29 searchrecords.php"><span>Search All Rental Records</span></a></li>
									<li><a href="30 salesanalytics.php"><span>Analysis of Sales Patterns</span></a></li>
								</ul>
							</li>
							<li><a href="#">Our Mission</a></li>
							<li><a href="5 logout.php">Log Out</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
		</script>

<div>		
	
<h2>Enter New Staff Details:</h2>	
	
<form method="post" action="25 newstaff2.php">
	
	<input type="text" name="fname" placeholder="First Name..." class="inp-control" required>
	</br>
	<input type="text" name="sname" placeholder="Last Name..." class="inp-control" required>
	</br>
	<input type="text" name="uname" placeholder="Username..." class="inp-control" required>
	</br>
	<input type="password" name="pass1" placeholder="Password..." class="inp-control" required>
	</br>
	<input type="password" name="pass2" placeholder="Confirm Password..." class="inp-control" required>
	</br>
	<input type="text" name="pay" placeholder="Payroll Number..." class="inp-control" required>
	</br>
	<input type="text" name="access" placeholder="Access Level..." class="inp-control" required>
	</br>
	</br>
	
	<input type="submit" name="Submit" class="sub-control">
	
</form>	

</div>	
	
</body>
</html>