<?php
session_start();
include ("database.php");

$user_name = $_POST['login'];
$user_password = $_POST['password'];
$sql = "SELECT `id`, `login`, `password` FROM `user` WHERE `login` = :login LIMIT 1";
$sth = $pdo->prepare($sql); 
$sth->bindParam(':login', $user_name, PDO::PARAM_STR);
$sth->execute();

$user = $sth->fetch(PDO::FETCH_ASSOC);

// If login and password matches witch login and password in DB, write login and ID in session (Если логин и пароль совпадают с логином и паролем в БД, записываем логин и ID в сессию)
if ($user && password_verify($user_password, $user['password'])) {;
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['user_login'] = $user['login'];
    }  else {
    die ("Неверный логин или пароль");
}

header('Location: dashboard.php');
?>

