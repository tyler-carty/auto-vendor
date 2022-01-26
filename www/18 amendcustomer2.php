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
	
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$add3 = $_POST['add3'];
	$postcode = $_POST['add4'];
	$CustID = $_POST['CustID'];
	
	
	$postcode = str_replace(' ','',$postcode);
	
	
	$dbc = mysqli_connect("localhost", "root", "password", "auto");
	
	
	$notemailquery = "SELECT COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = 'Email'";
	$notadd3query = "SELECT COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = 'Address3'";
	
	$notemail = mysqli_fetch_array(mysqli_query($dbc,$notemailquery));
	$notadd3 = mysqli_fetch_array(mysqli_query($dbc,$notadd3query));
	
	
	$notemail = $notemail['COLUMN_DEFAULT'];
	$notadd3 = $notadd3['COLUMN_DEFAULT'];
	
	
	
	if((empty($email)) && (empty($add3))){
		
		$query = "UPDATE customer SET FirstName = '$firstname' , LastName = '$lastname' , Email = '$notemail' ,Phone = '$phone' , Address1 = '$add1' , Address2 = '$add2' , Address3 = '$notadd3' , Postcode = '$postcode' WHERE CustomerID = '$CustID'";
		
		mysqli_query($dbc,$query);
		
	}
	
	
	elseif(empty($email)){
		
		$query = "UPDATE customer SET FirstName = '$firstname' , LastName = '$lastname' , Email = '$notemail' ,Phone = '$phone' , Address1 = '$add1' , Address2 = '$add2' , Address3 = '$add3' , Postcode = '$postcode' WHERE CustomerID = '$CustID'";
		
		mysqli_query($dbc,$query);

	}
	
	elseif(empty($add3)){
		
		$query = "UPDATE customer SET FirstName = '$firstname' , LastName = '$lastname' , Email = '$email' ,Phone = '$phone' , Address1 = '$add1' , Address2 = '$add2' , Address3 = '$notadd3' , Postcode = '$postcode' WHERE CustomerID = '$CustID'";
		
		mysqli_query($dbc,$query);
		
	}
	
	else{
		
		$query = "UPDATE customer SET FirstName = '$firstname' , LastName = '$lastname' , Email = '$email' ,Phone = '$phone' , Address1 = '$add1' , Address2 = '$add2' , Address3 = '$add3' , Postcode = '$postcode' WHERE CustomerID = '$CustID'";
		
		mysqli_query($dbc,$query);

	}
	
	header("location: 3 menu.php");
	
	
?>	
	
</body>
</html>