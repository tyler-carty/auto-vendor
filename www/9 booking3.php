<html>
<head>
<title>DVD Rentals</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

<h1>Auto Vendor</h1>

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

  	$VehicleID = $_SESSION['VehicleID'];
  	$CustomerID = $_SESSION['CustID'];
	$Cost = $_SESSION['Cost'];
	$ReturnDate = $_SESSION['ReturnDate'];

	date_default_timezone_set("UTC");

	$dbc = mysqli_connect("localhost","root","password","auto") or die("Cannot connect to database");

	$sql = "INSERT INTO rental (VehicleID, CustomerID, ReturnDate, Cost, active) VALUES('$VehicleID','$CustomerID','$ReturnDate','$Cost','1')";

	$query = mysqli_query($dbc,$sql);

	$sql2 = "UPDATE customer SET Renting = '1' WHERE CustomerID = '$CustomerID'";

	$query2 = mysqli_query($dbc,$sql2);
	
	$sql3 = "UPDATE vehicles SET BeingRented = '1' WHERE VehicleID = '$VehicleID'";
	
	$query3 = mysqli_query($dbc,$sql3);
	
	$sql4 = "UPDATE vehicles SET NumRentals = NumRentals + 1 WHERE VehicleID = '$VehicleID'";
	
	$query4 = mysqli_query($dbc,$sql4);
	
	mysqli_close($dbc);

	header("location: 3 menu.php"); //gets information from previous page and makes the appropriate changes to the database in order to record a rental


?>

</body>
</html>
