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
                    <a href="auth.php" class="nav-item">Вход/регистрация</a>
                </nav>
            </div>
        </header>
    </div>

    <div class="container">
        <div class="auth_block">
            <div class="auth_input">
                    <h1 class="auth_title">Вход</h1>
                <form class="auth_form" method="post" action="core/auth.php">
                    <label class="form_item" for="username">Логин:</label>
                    <input class="form_item" name="username" type="text">
                    <label class="form_item" for="password">Пароль:</label>
                    <input class="form_item" name="password" type="password">
                    <?php 
								 if ($_SESSION['msg']){
									echo '<p class="msg">' . $_SESSION['msg'] . '</p>';
								 }
								unset($_SESSION['msg']);
								?>
                    <button class="form_item btn" type="submit">Войти</button>

                    <a class="link" href="reg.php">Регистрация</a>
                </form>



            </div>
            
        </div>
    </div>
</body>
</html>