<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "root", "rabota");
	$title = $_POST['vacancy_title'];
	$salary = $_POST['salary'];
	$description = $_POST['vac_desc'];
	$idUser = $_SESSION['user'];

	$userInfo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE `idUser` =". $idUser.""));

	$company = $userInfo['username'];
	$date = date('Y-m-d H:i:s');

	// echo ("INSERT INTO vacancy (`idVacancy`, `title`, `salary`, `company`, `description`, `createDate`, `idUser`) VALUES (NULL, " . $title . $salary . $company . $description . $date . $idUser."");
	if (empty($title) and empty($salary) and empty($description)){
		$_SESSION['msg'] = 'Заполните все поля';
		header("Location: ../vacancy_add.php");
	
	} else{
		$result = mysqli_query(
            $conn,
            "INSERT INTO vacancy (`idVacancy`, `title`, `salary`, `company`, `description`, `createDate`, `idUser`) VALUES (NULL, '$title','$salary', '$company', '$description', '$date', '$idUser')");
			header('Location: ../index.php');
	}


 ?>