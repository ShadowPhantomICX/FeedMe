<?php
session_start();
include ("database.php");

$postName = $_POST['post_name'];
$postData = $_POST['post_data'];
$user = $_SESSION['user_login'];
$sql = "INSERT INTO `posts` (`username`, `postname`, `postdata`) VALUES ('$user', :postname, :postdata)";

$sth = $pdo->prepare($sql);
$sth->bindParam(':postname', $postName, PDO::PARAM_STR);
$sth->bindParam(':postdata', $postData, PDO::PARAM_STR);
$sth->execute();

header('Location: start.php');
?>