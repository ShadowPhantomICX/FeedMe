<?php
// Loading session (Загрузка сессии)
session_start();
include('database.php');

$username = $_SESSION['user_login'];
$postid = $_POST['postid'];

$sth = $pdo->query("SELECT `likes` FROM `posts`");
// Get assotiative array (Получение ассоцативного массива)
$numLikes = $sth->fetch(PDO::FETCH_ASSOC);

$minuslike = $numLikes['likes'] - 1; 

$pdo->exec("UPDATE `posts` SET `likes` = $minuslike WHERE `id` = '$postid'");

$pdo->exec("DELETE FROM `like` WHERE `userlogin` = '$username'");

header('Location: dashboard.php');
?>