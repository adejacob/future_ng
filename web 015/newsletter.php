<?php

$host = 'localhost';
$user = 'root';
$pass = 'ponnysword11';
$db   = 'letters';

$con = mysqli_connect($host,$user,$pass,$db);

if(isset($_POST['submit'])){

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];

	$query =("INSERT INTO data(first,last,email) VALUES('$first','$last','$email')");

	if(mysqli_query($con, $query)){

		header('location: http://localhost:8000/future nigeria f/web 015/thank/index.html');
	}else{
		echo "FORM ERROR";
	}
}

?>