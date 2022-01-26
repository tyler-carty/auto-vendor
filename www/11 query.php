<?PHP

	session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) //validate that the user is logged on by inspecting session variable
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

	
	  $connect = mysqli_connect("localhost", "root", "password", "auto"); //connect to database
	
	  if (isset($_POST['query'])) { //if the search query is set
		
	  $search_query1 = $_POST['query'];
	  $query = "SELECT * FROM customer WHERE Renting = 1 AND (FirstName LIKE '%$search_query1%' OR LastName LIKE '%$search_query1%' OR concat(FirstName, ' ', LastName) LIKE '%$search_query1%')";
	  $result = mysqli_query($connect, $query); //carry out sql query to find potential returns
		
		echo("<select required name = CustID class='drop-control'>"); //define a drop down menu
	  
		if (mysqli_num_rows($result) > 0) { //if there are no results
			
			while ($row = mysqli_fetch_array($result)) {
				echo("<option value=" .$row['CustomerID']. ">" .$row['CustomerID']. " , " .$row['FirstName']. " " .$row['LastName'] . " , " .$row['Postcode']); //outputs records into drop down menu
			}

		} 
		else {
			echo("<option value=''>Customer Not Found</option>"); //outouts no customers found if no customers are found
		}
		
	echo("</select>");	
		  
	}
?>