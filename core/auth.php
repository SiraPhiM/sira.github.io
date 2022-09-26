<?php
session_start();

    $conn = mysqli_connect('localhost', 'root', 'root', 'rabota');
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    $check_user = mysqli_query($conn, "SELECT * FROM  users WHERE `username` = '$name' AND `password` = '$password'");

    $count = mysqli_num_rows($check_user);
    
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = $user['idUser'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['categ'] = $user['UserCategory'];
        // $_SESSION['role'] = $user['user_role'];
        header('Location: ../index.php');
    } else {
        $_SESSION['msg'] = 'Неверные данные';
        header('Location: ../auth.php');
    }