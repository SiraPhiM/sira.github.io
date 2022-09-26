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
    ?>

    <div class="container">
        <div class="lk_form">

                    <h1 class="auth_title">Личный кабинет</h1>
                <form class="auth_form" method="post" action="core/lk.php">

                    <label class="form_item" for="log">Изменить логин</label>
                    <input class="form_item" name="log" type="text" value="">

                    <label class="form_item" for="pass">Изменить пароль</label>
                    <input class="form_item" name="password" type="password">

                    <label class="form_item" for="another_password">Подтверждение пароля:</label>
                    <input class="form_item" name="another_password" type="password">
                    
                    <button class="form_item btn" type="submit">Изменить</button>

                </form>
                
                <a class="form_item btn" href="rezume_add.php">Моё резюме</a>
                <a class="form_item btn" href="core/logout.php">Выйти</a>

            
        </div>
    </div>
</body>
</html>