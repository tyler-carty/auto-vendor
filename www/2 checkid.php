<html>
<head>
<title>Auto Vendor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

	<?PHP
	
		session_start(); //session is initiated
	
		$dbc = mysqli_connect("localhost","root","password","auto"); //connection to database established

		$username = $_POST["username"]; //posted username saved
		$password = $_POST["password"]; //posted password saved
	
	
		if(empty($username)or(empty($password))) //if the username or passwors are empty
		{
			header("Location: 1 index.html"); // redirect to login page
		}
		else //otherwise
		{

			$sql = "SELECT * FROM staff WHERE Username =  '$username'  AND Password =  '$password'"; //defines query

			$result = mysqli_query($dbc,$sql); //executes query

			$count = mysqli_num_rows($result); //count number of results
			
			$row = mysqli_fetch_array($result); //store results as array

			if($count == 0) //if number of results == 0
			{
				header("Location: 1 index.html"); //redirect to login page
			}
			else //otherwise
			{
				
			if($row['PayrollNum'] == "00000000"){ //if payroll number is 00000000
					echo("
				
					<script>
					
					window.alert('You are on an emercency payroll. Contact your manager for access to the system.');
					window.location.href = '1 index.html';
					
					</script>
					
					"); //display error banner and redirect to login page
				}
				
				else{ // otherwise
					$_SESSION['loggedin'] = true; //logged in session is true
					$_SESSION['StaffID'] = $row['StaffID']; //save staff ID for later
					header("Location: 3 menu.php");//redirect to main menu
				}
			}

		}
		
	
	mysqli_close($dbc); //close db connection

	?>

</body>
</html>
	
</body>
</html>