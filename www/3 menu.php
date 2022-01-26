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
			
			div{
				text-align: center;
			}
			
			.container {
				text-align: left;
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
		
        <h1>Auto Vendor UK</h1>
		<p>
			UK car and van hire from over 100 nationwide locations. Choose an option to suit you from daily hire to flexible, longer-term rental. Select your car or van rental from our wide range including;
		</p>
		<p>Family Saloons</p>
		<p>4x4s</p>
		<p>Sports Cars</p>
		<p>Commercial Vehicles</p>
		
	</body>
</html>
