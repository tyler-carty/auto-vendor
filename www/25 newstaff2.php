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
	

	
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$uname = $_POST['uname'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$pay = $_POST['pay'];
	$access = $_POST['access'];
	
	
	if($pass1 == $pass2){

		$query = "INSERT INTO staff (FirstName,LastName,Username,Password,PayrollNum,Access) VALUES ('$fname','$sname','$uname','$pass1','$pay','$access')";

		mysqli_query($dbc,$query);
		
		header("location: 3 menu.php");
		
	}

	else{
		
		echo("
				
			<script>
					
			window.alert('You have not entered matching passwords. Try Again.');
			window.location.href = '24 newstaff.php';
					
			</script>
					
		");
		
	}
	
	
?>

</body>
</html>