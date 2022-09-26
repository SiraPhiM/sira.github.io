<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "root", "rabota");
	$name = $_POST['log'];
	$password= $_POST['password'];
	$secpass = $_POST['another_password'];
	$checkbox = $_POST['checkbox'];
	if ($password == $secpass){
		$result = mysqli_query(
            $conn,
            "INSERT INTO users (`idUser`, `username`, `password`, `userCategory`) VALUES (NULL, '$name','$password', '$checkbox')");
		header('Location: ../auth.php');
	} else{
		$_SESSION['msg'] = 'Пароли не совпадают';
		header("Location: ../reg.php");
	}


 ?>