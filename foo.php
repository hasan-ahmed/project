<?php 

$servername = "bqc353.encs.concordia.ca";
$username = "bqc353_4";
$password = "1234abcd";

$mysqli = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
	echo "Connected successfully <br>";

?>


<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 



<form method="post" action="foo.php">  
  Query: <input type="text" name="query" value="<?php echo $query;?>">
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php 
echo $_POST["query"] . "<br>";


$queryText = "SELECT * FROM bqc353_4.Books;";	  //Note the 2 semicolons
$queryTest = $_POST["query"];
$result2 = $mysqli->query($queryTest);
if ($result2->num_rows > 0) {    // output data of each row    
	while($row = $result->fetch_assoc())
	{    
	echo "ISBN: " . $row["ISBN"]. "<br>";    
	echo "title: " . $row["title"]. "<br>";    
	
	}
} 
$result = $mysqli->query($queryText);
if ($result->num_rows > 0) {    // output data of each row    
	while($row = $result->fetch_assoc())
	{    
	echo "ISBN: " . $row["ISBN"]. "<br>";    
	echo "title: " . $row["title"]. "<br>";    
	
	}
} 
$mysqli->close();
?>
</body>
</html>
