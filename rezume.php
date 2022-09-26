<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <title>Rabota.ru</title>
</head>
<body>
    <div class="container">
        <header class="header">
        
            <div>
                <nav class="nav">
                    <a><img class="logo" src="img/logo.png"></a>
                    <a href="index.php" class="nav-item">Главная</a>
                    <a href="vacancy.php" class="nav-item">Вакансии</a>
                    <a href="rezume.php" class="nav-item">Резюме</a>
                    <?php
                    if(empty($_SESSION['username'])){
                        echo ('<a href="auth.php" class="nav-item">Вход/регистрация</a>');
                    }else {
                        
                        if($_SESSION['categ'] > 0){
                            echo ('<a href="lk_r.php" class="nav-item">'. $_SESSION['username'] .'</a>');
                        } else {
                            echo ('<a href="lk.php" class="nav-item">'. $_SESSION['username'] .'</a>');
                         }
                    }
                    ?>
                </nav>
            </div>
        </header>
    </div>

    <div class="container">        
        <h1 class="block_title">Резюме</h1>
        <div class="rezume">
            <?php 
        $conn = mysqli_connect('localhost','root','root','rabota');
        $rezume_list = mysqli_query($conn,'SELECT * FROM rezume');
        $count = mysqli_num_rows($rezume_list);
        $idUser = $_SESSION['user'];
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `idUser` = '$idUser'"));
        if ($count > 0) {
        while ($rezume= mysqli_fetch_array($rezume_list)) {
            echo ('<ul class="vac_card">
                <li class="vac_item  name">'. $rezume["rezume_title"].'</li>
                <li class="vac_item  money" >'. $rezume["specialization"].'</li>
                <li class="vac_item  comp">'. $user["username"].'</li>
                <li class="vac_item  desc"> '. $rezume["description"].'</li>
            </ul>');
        }
                        }else {
                            echo '<div class="rezume">
                            <img src="img/error.png" class="monkey">
                            <div class="text-block">
                                <h1>Что-то пошло не так</h1>
                                <h3>Резюме не обнаружено</h3>
                            </div>
                        </div>';
                        }
            ?>

        </div>
    </div>
</body>
</html>