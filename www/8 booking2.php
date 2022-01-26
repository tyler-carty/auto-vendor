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
		
		<div>
		
		<?PHP
	
            $_SESSION['incorrect'] = false;

            $_SESSION['ReturnDate'] = $_POST['RentalPeriod']; //saves all active session variables
            $_SESSION['CustID'] = $_POST['CustID'];
            $_SESSION['VehicleID'] = $_POST['VehicleID'];

            if(empty($_SESSION['CustID']) || (empty($_SESSION['VehicleID'])) || (empty($_SESSION['ReturnDate']))){ //if any of the variables are unset then tell user they have invalid inputs

                $_SESSION['incorrect'] = true;

            }

            if($_SESSION['incorrect'] == true){ //if any of the variables are unset then tell user they have invalid inputs

                echo("

                <script>

                window.location.href='5 live_search.php';
                window.alert('You have entered invalid inputs.')

                </script>

                "); //if any of the variables are unset then tell user they have invalid inputs
            }

            $CustID = $_SESSION['CustID'];
            $VehicleID = $_SESSION['VehicleID'];

            $dbc = mysqli_connect("localhost","root","password","auto") or die("Cannot connect to database"); //connect to database

            $sql = "SELECT * FROM vehicles WHERE VehicleID =" .$VehicleID; //set sql query

            $result = mysqli_query($dbc,$sql);  //execute sql query

            $row = mysqli_fetch_array($result); //convert results into array

            $Name = $row['Name'];  //gather information about the vehicle
            $Registration = $row['Registration'];
            $RCPD = $row['RentalCostPerDay'];


            $sql2 = "SELECT * FROM customer WHERE CustomerID =" .$CustID; //set sql query

            $result2 = mysqli_query($dbc,$sql2); //execute sql query

            $row2 = mysqli_fetch_array($result2); //convert results into array

            $Forename = $row2['FirstName']; //gather information about the customer
            $Surname = $row2['LastName'];
            $Postcode = $row2['Postcode'];

            mysqli_close($dbc);

            date_default_timezone_set("Europe/London");

            echo "
			
			<p>
			
			Confirm Booking Details: </br>
            </br>Return Date: " .$_SESSION['ReturnDate']."
            </br>Vehicle: " .$Name."
            </br>Registration: " .$Registration."
            </br>VehicleID: " .$VehicleID."
            </br>Customer: " .$Forename. " " .$Surname."
            </br>Postcode: " .$Postcode."
			
			";

            $diff = abs((strtotime($_POST["RentalPeriod"]))-strtotime(date("Y-m-d")));
            $days = floor(($diff) / (60*60*24));
            $Cost = ($days*$RCPD);

			echo("
			
				</br>Price: " .$Cost."
				 
			");
			
			echo("</p>");

            $_SESSION['Cost'] = $Cost;   //show user a summary of rental using gathered information


        ?>
			
		

<form name = "Confirmation Form" method = "post" action = "9 booking3.php">
	<input type = "submit" name = "Submit" value = "Confirm Booking"></br>
</form>

</div>

</body>
</html>
