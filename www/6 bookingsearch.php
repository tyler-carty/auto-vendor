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
			
			h3 {
				text-align: center;
				font-weight: 400;
			}
			
			div {
				text-align: center;
			}
			
			.container {
				text-align: left;
			}
			
			.form-control {

                margin: 7px auto;
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
			
			.sub-control:hover {
            	background-color: #FFFFFF;
				color: #47A3DA;
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
			
			.date-control {
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
			
			.drop-control {
                margin: 7px auto;
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
				text-align: center;
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
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		
<form name='test' method='post' action="8 booking2.php">
	
	
<div id="search_container">
   <h2>Search for Customer...</h2>
   <input type="text" name="customer" id="customer" class="form-control" autocomplete="off">
   <div id="results"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){ //readies function for input
    $("#customer").keyup(function(){ //starts functions upon keyup
	  var go = "go"; //creates activation variable
      var query = $(this).val(); //sets query value to be passed
      if (go = "go") { //starts ajax call
        $.ajax({
                url: '7 query.php', //sets destination of function pass
                method: 'POST', //sets method of function pass
                data: {query:query}, //sests data of function pass
                success: function(data) //looks to see if the function pass was successfull
                {
                  $('#results').html(data); //draws the results of function pass onto page if pass successful
                  $('#results').css('display', 'inline');   //''
                  $("#customer").focusout(function(){       //''
                  	$('#results').css('display', 'inline'); //''
                  });                                       //''
                  $("#customer").focusin(function(){        //''
                    $('#results').css('display', 'inline'); //''
                  });
                }
        });
      } else {
             $('#results').css('display', 'inline'); //draws nothing if not successful
      }
    });
  });

</script>

<div id="search_container2">
   <h2>Search for Vehicle...</h2>
	<h3>Alternative vehicles will be shown if there are no search results</h3>
   <input type="text" name="vehicle" id="vehicle" class="form-control" autocomplete="off">
   <div id="results2"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#vehicle").keyup(function(){
	  var go2 = "go";
      var query2 = $(this).val();
      if (go2 = "go") {
        $.ajax({
                url: '7 query.php',
                method: 'POST',
                data: {query2:query2},
                success: function(data)
                {
                  $('#results2').html(data);
                  $('#results2').css('display', 'inline');
                  $("#vehicle").focusout(function(){
                    $('#results2').css('display', 'inline');
                  });
                  $("#vehicle").focusin(function(){
                    $('#results2').css('display', 'inline');
                  });
                }
        });
      } else {
             $('#results2').css('display', 'inline');
      }
    });
  });
	
</script>
	
	
<?PHP

	date_default_timezone_set("GMT");
	
	$date = date("Y/m/d");
	$tomorrow = date('Y-m-d',strtotime($date . "+1 days")); //finds date of tomorrow
	

	
	echo("
	
	<div>
	
		<h2>Select Return Date...</h2>
	
		<input type='date' class='date-control' name=RentalPeriod min= " .$tomorrow. ">

		</br></br>
		
		<input type='submit' value='Submit' class='sub-control'>
		
	</div>
	
	");
	
?>
	

</form>

	
	
</body>
</html>