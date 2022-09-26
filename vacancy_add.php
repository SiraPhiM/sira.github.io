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
          
    <?php
    $conn = mysqli_connect('localhost','root','root','rabota');
    $idUser = $_SESSION['user'];
    $userprofile = mysqli_query($conn,'SELECT * FROM users WHERE idUser = "$idUser"');
    echo $idUser;
    ?>

    <div class="container">
        <div class="lk_form">

                    <h1 class="auth_title">Добавление вакансии</h1>
                <form class="auth_form" method="post" action="core/vacancy_add.php">

                    <label class="form_item" for="vacancy_title">Название должности</label>
                    <input class="form_item" name="vacancy_title" type="text" value="">

                    <label class="form_item" for="salary">Заработная плата</label>
                    <input class="form_item" name="salary" type="number">

                    <label class="form_item" for="vac_desc">Описание вакансии</label>
                    <input class="form_item" name="vac_desc" type="text">
                    
                    <button class="form_item btn" type="submit">Добавить вакансию</button>

                </form>
            
        </div>
    </div>
</body>
</html>