<?php
include ("database.php");
$id = $_GET['id'];
$sql = "DELETE FROM `posts` WHERE `id`='$id'";

$sth = $pdo->query($sql);

header('Location: start.php')
?>