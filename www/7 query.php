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

	$connect = mysqli_connect("localhost", "root", "password", "auto"); //connect to database

#--------------------------------------------------------------------------------------------------

	if (isset($_POST['query'])) { //if the query value is set
		
	  $search_query1 = $_POST['query']; //saves query value
	  $query = "SELECT * FROM customer WHERE FirstName LIKE '%$search_query1%' OR LastName LIKE '%$search_query1%' OR concat(FirstName, ' ', LastName) LIKE '%$search_query1%' AND renting='0'"; //saves sql query
	  $result = mysqli_query($connect, $query); //carries out query
		
		echo("<select required name = CustID class='drop-control'>"); //creates drop down menu
	  
		if (mysqli_num_rows($result) > 0) { //if number of results is bigger than 0
			
			while ($row = mysqli_fetch_array($result)) {
				echo("<option value=" .$row['CustomerID']. ">" .$row['CustomerID']. " , " .$row['FirstName']. " " .$row['LastName'] . " , " .$row['Postcode']); //enters record into drop down menu
			}

		} 
		else {
			echo("<option value=''>Customer Not Found</option>"); //enters blank value into drop down menu
		}
		
	echo("</select>");	
		
}

#--------------------------------------------------------------------------------------------------

	if (isset($_POST['query2'])) {
		
	  $search_query2 = $_POST['query2'];
	  $query = "SELECT * FROM vehicles WHERE BeingRented = '0' AND (Name LIKE '%$search_query2%' OR Model LIKE '%$search_query2%' OR concat(Model, ' ', Name) LIKE '%$search_query2%')";
	  $result = mysqli_query($connect, $query);
		
		echo("<select required name =VehicleID class='drop-control'>");
	  
		if (mysqli_num_rows($result) > 0) {
			
			while ($row = mysqli_fetch_array($result)) {
				echo("<option value=" .$row['VehicleID']. ">" .$row['VehicleID']. " , " .$row['Model']. " " .$row['Name']. " , " .$row['Registration']);
			}
			
		} 
		else {
			$query2 = "SELECT * FROM vehicles WHERE (Name LIKE '%$search_query2%' OR Model LIKE '%$search_query2%' OR concat(Model, ' ', Name) LIKE '%$search_query2%')";
	  		$result2 = mysqli_query($connect, $query2);
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['BeingRented'] == 1){ //if searched vehicle is being rented
					$numdoor = $row2['NumDoors']; //finds that vehicles details
					$numseat = $row2['NumSeats']; //finds that vehicles details
					$size = $row2['EngineSize']; //finds that vehicles details
					$sizeA = $size-0.3; //finds that vehicles details
					$sizeB = $size+0.3; //finds that vehicles details
					echo($size); 
					$query3 = "SELECT * FROM vehicles WHERE BeingRented = '0' AND (NumDoors = $numdoor AND NumSeats = $numseat AND (EngineSize BETWEEN $sizeA and $sizeB))";
					$result3 = mysqli_query($connect, $query3); //carries out query for finding similar cars

					if(mysqli_num_rows($result3) > 0){
						while ($row3 = mysqli_fetch_array($result3)) {
							echo("<option value=" .$row3['VehicleID']. ">" .$row3['VehicleID']. " , " .$row3['Model']. " " .$row3['Name']. " , " .$row3['Registration']);
						}
					}
					else{
						echo("<option value=''>Vehicle Not Found</option>");
					}
				}
			}
		}
		
	echo("</select>");

}	

?>