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
        <h1 class="block_title">Новые вакансии</h1>
        <div class="last_vac">
        <?php 
        $conn = mysqli_connect('localhost','root','root','rabota');
        $vacancy_list = mysqli_query($conn,'SELECT * FROM vacancy order by createDate desc limit 3');
        $count = mysqli_num_rows($vacancy_list);
        if ($count > 0) {
        while ($vacancy= mysqli_fetch_array($vacancy_list)) {
            echo ('<ul class="vac_card">
                <li class="vac_item  name">'. $vacancy["title"].'</li>
                <li class="vac_item  money" >'. $vacancy["salary"].' руб.</li>
                <li class="vac_item  comp">'. $vacancy["company"].'</li>
                <li class="vac_item  desc"> '. $vacancy["description"].'</li>
            </ul>');
        }
                        }else {
                            echo '<div class="rezume">
                            <img src="img/error.png" class="monkey">
                            <div class="text-block">
                                <h1>Что-то пошло не так</h1>
                                <h3>Вакансий не обнаружено</h3>
                            </div>
                        </div>';
                        }
                    
            ?>
        </div>
    </div>
</body>
</html>