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

		
	  $connect = mysqli_connect("localhost", "root", "password", "auto");
	
	  if (isset($_POST['query'])) {
		
	  $search_query1 = $_POST['query'];
	  $query = "SELECT * FROM customer WHERE (FirstName LIKE '%$search_query1%' OR LastName LIKE '%$search_query1%' OR concat(FirstName, ' ', LastName) LIKE '%$search_query1%') OR Phone LIKE '%$search_query1%' OR Email LIKE '%$search_query1%' OR Postcode LIKE '%$search_query1%' OR Address1 LIKE '%$search_query1%' OR Address2 LIKE '%$search_query1%' OR Address3 LIKE '%$search_query1%'";
	  $result = mysqli_query($connect, $query);
		
		echo("<select required name = CustID class='drop-control'>");
	  
		if (mysqli_num_rows($result) > 0) {
			
			while ($row = mysqli_fetch_array($result)) {
				echo("<option value=" .$row['CustomerID']. ">" .$row['CustomerID']. " , " .$row['FirstName']. " " .$row['LastName'] . " , " .$row['Postcode']);
			}

		} 
		else {
			echo("<option value=''>Customer Not Found</option>");
		}
		
	echo("</select>");	

		  
	}
?>	