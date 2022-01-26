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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
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
			
			table {
				width: 900px;
				margin: 0 auto;
				border-collapse: collapse;
				color: black;
				min-height:.01%;
				overflow-x:visible;
				border-spacing: 0;
            }
			
			table, th, td {
            
            }
			
			th, td {
				padding: 5px;
			}
			
			th {
				background-color: #47A3DA;
				color: #FFFFFF;
			}
			
			th:first-child {
                border-radius: 6px 0 0 0;
            }

            th:last-child {
            	border-radius: 0 6px 0 0;
            }

            th:only-child{
            	border-radius: 6px 6px 0 0;
            }
			
			tr:nth-child(even) {
              	background-color: #f2f2f2;
            }
			
			.form-control{
				margin: 0 auto;
				display:block;
				width:20%;
				height:34px;
				padding:6px 12px;
				font-size:14px;
				line-height:1.42857143;
				color:#555;
				background-color:#fff;
				background-image:none;
				border:1px solid #ccc;
				border-radius:4px;
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
                <h2>Search Rental Records</h2>
			   
                <div>  
                     <input type="text" name="search" id="search" class="form-control" />  
                </div>  
            
			    </br>
		
                <div>  
                     <table id="employee_table">  
						 
                          <tr>  
                               <th width="10%">ID</th>  
                               <th width="15%">Customer Name</th>  
                               <th width="15%">Address</th>  
                               <th width="15%">Postcode</th>  
                               <th width="15%">Vehicle Rented</th>  
                               <th width="15%">Return Date</th>
							   <th width="15%">Active Rental</th>
                          </tr>
						
						 
					<?PHP
						 
					
						 
						 $connect = mysqli_connect("localhost", "root", "password", "auto");
						 $query = "SELECT * FROM rental";
						 $result = $connect->query($query);
					
						 while($row = $result->fetch_assoc()){
							 
							 echo("<tr class='data'>");
							 
							 	 echo("<td>".$row['RentalID']."</td>");
							 
								 $CustID = $row['CustomerID'];
								 $VechID = $row['VehicleID'];

								 $query2 = "SELECT * FROM customer WHERE CustomerID = '$CustID'";
								 $result2 = mysqli_query($connect,$query2);
								 $row2 = mysqli_fetch_array($result2);
							 
							  	 echo("<td>".$row2['FirstName']." ".$row2['LastName']."</td>");
							 	 echo("<td>".$row2['Address1']."</td>");
							 	 echo("<td>".$row2['Postcode']."</td>");
							 
							 	 $query3 = "SELECT * FROM vehicles WHERE VehicleID = '$VechID'";
							 	 $result3 = mysqli_query($connect,$query3);
								 $row3 = mysqli_fetch_array($result3);
							 
							 	 echo("<td>".$row3['Model']." ".$row3['Name']."</td>");
							 	 echo("<td>".$row['ReturnDate']."</td>");
							 
							 	 if($row['active'] == "1"){
									 echo("<td>Yes</td>");
								 }
							 	 else{
									 echo("<td>No</td>");
								 }
							 	 
							 
							 echo("</tr>");
						 }
					
					
						
					?> 
  
                     </table>
					</br>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){ 
                $('#employee_table tr[class=data]').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();
                     } 
                });  
           }  
      });  
 </script>  