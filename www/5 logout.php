<html>
<head>
<title>Auto Vendor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

<?PHP

	session_start(); //starts session
	
	session_destroy(); //destorys session and session variables

	header("location: 1 index.html"); // redirect to login

?>

</body>
</html>
