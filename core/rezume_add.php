<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "root", "rabota");
	$title = $_POST['vacancy_title'];
	$spec = $_POST['spec'];
	$graf = $_POST['graf'];
	$exp = $_POST['exp'];
	$date = date('Y-m-d H:i:s');
	$description = $_POST['rez_desc'];
	$idUser = $_SESSION['user'];

	$userInfo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE `idUser` =". $idUser.""));

	echo $title;
	echo $spec;
	echo $graf;
	echo $exp;
	echo $description;

	if (empty($title) and empty($spec) and empty($graf) and empty($exp) and empty($description)) {
		$_SESSION['msg'] = 'Заполните все поля';
		header("Location: ../rezume_add.php");
	} else {
		$result = mysqli_query($conn, "INSERT INTO rezume (`idRezume`, `rezume_title`, `specialization`, `work_schedule`, `experience`, `description`, `createDate`, `idUser`) VALUES (NULL, '$title', '$spec', '$graf', '$exp', '$description', '$date', '$idUser')");
		header("Location: ../rezume.php");
	}
	// $company = $userInfo['username'];


	// if (empty($title) and empty($salary) and empty($description)){
	// 	$_SESSION['msg'] = 'Заполните все поля';
	// 	header("Location: ../vacancy_add.php");
	
	// } else{
	// 	$result = mysqli_query(
    //         $conn,
    //         "INSERT INTO vacancy (`idVacancy`, `title`, `salary`, `company`, `description`, `createDate`, `idUser`) VALUES (NULL, '$title','$salary', '$company', '$description', '$date', '$idUser')");
	// 		header('Location: ../index.php');
	// }


 ?>