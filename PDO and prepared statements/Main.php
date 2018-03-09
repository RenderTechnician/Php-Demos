<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method= "post" id="form">
	<input type="text" name="SID" placeholder="Student ID">&nbsp;
	<input type="text" name="Name" placeholder="Name">&nbsp;
	<input type="text" name="Email" placeholder="Email">&nbsp;
	<button type="submit">Submit</button>
	</form>
	<?php
	$dsn = 'mysql:host=127.0.0.1;dbname=student;';
	$user ='root';
	$password = '';
	try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
	
	if (isset($_POST['SID']) && isset($_POST['Name']) && isset($_POST['Email']))
	{
	//prepare the query
	$sqlQuery = "INSERT INTO students VALUES(?,?,?)";
	$query = $dbHandler->prepare($sqlQuery);

	$sid 	= 	$_POST['SID'];
	$name 	= 	$_POST['Name'];
	$email	=	$_POST['Email'];
	//execute the query
	$query->execute(array($sid,$name,$email));
		}
	//creates the query
	$query = "SELECT * FROM STUDENTS";
	//sends the query to the database
	$result = $dbHandler->query($query);
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		echo '<pre>', print_r($row), '</pre>';
	}
	  ?>
</body>
</html>