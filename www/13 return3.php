<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Auto Vendor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
	
	
	$RentID = $_SESSION['RentalRentID'];
	$CustID = $_SESSION['RentalCustID'];
	$VechID = $_SESSION['RentalVechID'];
	
	
	$dbc = mysqli_connect("localhost", "root", "password", "auto");
	
	$CustQuery = "UPDATE customer SET Renting = '0' WHERE CustomerID = '$CustID'";
	$VechQuery = "UPDATE vehicles SET BeingRented = '0' WHERE VehicleID = '$VechID'";
	$RentQuery = "UPDATE rental SET active = '0' WHERE RentalID = '$RentID'";
	
	
	mysqli_query($dbc,$RentQuery);
	mysqli_query($dbc,$CustQuery);
	mysqli_query($dbc,$VechQuery);
	
	header("location: 3 menu.php");
	
?>
	
</body>
</html>