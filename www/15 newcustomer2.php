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
	
	$dbc = mysqli_connect("localhost", "root", "password", "auto");
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$add3 = $_POST['add3'];
	$postcode = $_POST['add4'];
	
	$postcode = str_replace(' ','',$postcode);
	
	echo($firstname);

	if((empty($email)) && (empty($add3))){
		
		$query = "INSERT INTO customer (FirstName,LastName,Phone,Address1,Address2,Postcode) VALUES 
		('$firstname','$lastname','$phone','$add1','$add2','$postcode')";
		
		mysqli_query($dbc,$query);
		
	}
	
	
	elseif(empty($email)){
		
		$query = "INSERT INTO customer (FirstName,LastName,Phone,Address1,Address2,,Address3,Postcode) VALUES 
		('$firstname','$lastname','$phone','$add1','$add2','$add3','$postcode')";
		
		mysqli_query($dbc,$query);

	}
	
	elseif(empty($add3)){
		
		$query = "INSERT INTO customer (FirstName,LastName,Email,Phone,Address1,Address2,Postcode) VALUES 
		('$firstname','$lastname','$email','$phone','$add1','$add2','$postcode')";
		
		mysqli_query($dbc,$query);
		
	}
	
	else{
		
		$query = "INSERT INTO customer (FirstName,LastName,Email,Phone,Address1,Address2,Address3,Postcode) VALUES ('$firstname','$lastname','$email','$phone','$add1','$add2','$add3','$postcode')";
		
		mysqli_query($dbc,$query);

	}
	
	header("location: 3 menu.php");
	
?>

</body>
</html>