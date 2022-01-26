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

		
	  $connect = mysqli_connect("localhost", "root", "password", "auto");
	
	  if (isset($_POST['query'])) {
		
	  $search_query1 = $_POST['query'];

	  $query = "SELECT * FROM vehicles WHERE (Model LIKE '%$search_query1%' OR Name LIKE '%$search_query1%' OR concat(Model, ' ', Name) LIKE '%$search_query1%') OR Colour LIKE '%$search_query1%' OR Registration LIKE '%$search_query1%' OR RentalCostPerDay LIKE '%$search_query1%'";
	  $result = mysqli_query($connect, $query);
		
		echo("<select required name = VechID class='drop-control'>");
	  
		if (mysqli_num_rows($result) > 0) {
			
			while ($row = mysqli_fetch_array($result)) {
				echo("<option value=" .$row['VehicleID']. ">" .$row['VehicleID']. " , " .$row['Model']. " " .$row['Name'] . " , " .$row['Registration']);
			}

		} 
		else {
			echo("<option value=''>Vehicle Not Found</option>");
		}
		
	echo("</select>");	

		  
	}
?>	
