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
                    <h1 class="auth_title">Регистрация</h1>
                <form class="auth_form" method="post" action="core/reg.php">
                    <label class="form_item" for="log">Логин:</label>
                    <input class="form_item" name="log" type="text">

                    <label class="form_item" for="pass">Пароль:</label>
                    <input class="form_item" name="password" type="password">

                    <label class="form_item" for="another_password">Подтверждение пароля:</label>
                    <input class="form_item" name="another_password" type="password">
                    
                    
                    <p class="checkbox_title"><input class="checkbox" name="checkbox" type="radio" value="1">Я работодатель</p>
                    <p class="checkbox_title"><input class="checkbox" name="checkbox" type="radio" value="0">Я соискатель</p>
                    <?php
                    if ($_SESSION['msg']){
									echo '<p class="msg">' . $_SESSION['msg'] . '</p>';
								 }
								unset($_SESSION['msg']);
								?>

                    <button class="form_item btn" type="submit">Регистрация</button>
                
                    <a class="link" href="auth.php">Вход</a>

                </form>

            </div>
            
        </div>
    </div>
</body>
</html>