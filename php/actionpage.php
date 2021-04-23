<?php
	
	//CAPTURE PARAMETER
	$fname = $_POST['fname'];  //first_name
	$flname = $_POST['flname'];  //last_name
    $nim = $_POST['nim'];  //nim
	$address = $_POST['address'];  //address
    $phonenumber = $_POST['phonenumber'];  //phone_number

	//CONNECTION PARAMETER
	$dbhost = 'db';
	$dbuser = 'root';
	$dbpass = 'root';
	$database = '1318011_form_data';
	
	//CONNECTION STRING
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
	
	//MAKE CONNECTION
	if(! $conn ) {
		die('Could not connect: ' . mysqli_error());
	}
	

	//CREATE TABLE
	$sql = "CREATE TABLE IF NOT EXISTS form_data (
		id INT(20) AUTO_INCREMENT PRIMARY KEY,
		first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
		nim VARCHAR(100) NOT NULL,
		address VARCHAR(100) NOT NULL,
		phone_number VARCHAR(100) NOT NULL
		)";

	//EXECUTE CREATE TABLE
	$sql = mysqli_query($conn, $sql);
	
	//DEFINE QUERY INSERT
	//$sql = 'INSERT INTO tbl_sample (first_name, last_name) VALUES("x","x")';
	$sql = 'INSERT INTO form_data (first_name, last_name, nim, address, phone_number) VALUES("'.$fname.'","'.$flname.'","'.$nim.'","'.$address.'","'.$phonenumber.'")';
	echo "<br>";
	echo $sql;
	
	//EXECUTE QUERY INSERT
	$sql = mysqli_query($conn, $sql);			
	
	//WHEN ERROR DISPLAY MESSAGE
	if(! $sql ) {
		die('Could not get data: ' . mysqli_error());
	}
	
	//LAST MESSAGE
	echo "Fetched data successfully\n";
	
	//CLOSE CONNECTION
	mysqli_close($conn);
?>