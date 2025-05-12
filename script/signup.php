<?php
// Sing Up script (Скрипт регистрации)
include ("database.php");

$user_name = $_POST['login'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Protect password (hashing) (Защита пароля (хеширование))

$sth = $pdo->prepare("INSERT INTO `user` (`password`, `login`) VALUES (:pass, :login)"); 
$sth->bindParam(':login', $user_name, PDO::PARAM_STR);
$sth->bindParam(':pass', $user_password, PDO::PARAM_STR);
$sth->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>Перенаправление... | FeedMe</title>
        <meta http-equiv="refresh" content="7; URL=../singin_signup_form.html">
    </head>
    <body>
        <div class="header">
            <h1>FeedMe</h1>
        </div>
        <p>Вы зарегистрированы! Через 7 секунд вы будете перенаправлены на страницу входа/регистрации</p>
        <p>Теперь вам необходимо войти под своим профилем (ввести логин и пароль в форму входа)</p>
        <p>! Если вы не можете войти - возможно, ваш логин уже зарегистрирован в системе другим пользователем. В таком случае придумайте другой логин</p>
            <p><pre>





            

            </pre></p>
        <footer>
            <h4>FeedMe</h4>
            <p><i>Тестовый сайт. Для реальный проектов лучше пользоваться фреймворками, а не "изобретать велосипед".</i></p>
            <p class="year"><small>2025</small></p>
        </footer>
    </body>
</html>