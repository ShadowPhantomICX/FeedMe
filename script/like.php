<?php
session_start();
include ('database.php');

$username = $_SESSION['user_login'];
$postid = $_POST['postid'];

$sth = $pdo->query("SELECT `likes` FROM `posts`");
// Get quantity likes (Получаем количество оценок)
$numLikes = $sth->fetch(PDO::FETCH_ASSOC);

// Add to quantity likes (Добавляем к количеству оценок 1)
$pluslike = $numLikes['likes'] + 1;

$pdo->exec("UPDATE `posts` SET `likes` = $pluslike WHERE `id` = '$postid'");

$pdo->exec("INSERT INTO `like` (`postid`, `userlogin`) VALUES ('$postid', '$username')");

header('Location: dashboard.php');
?>