<?php
// In this case, the script is used to transfer the old post to the field. (В данном случае этот скрипт используется для передачи в поле данных старого поста.)
// This is necessary so that the user does not have to copy the text of the old post. (Это необходимо для того, чтобы пользователю не пришлось копировать текст старого поста.)
// It's useful when you just need to fix a typo, rather than rewrite the entire post. (Полезно, когда нужно просто исправить опечатку, а не переписывать весь пост.)

// Naming variables to shorten the lenght (Именуем переменные для сокращения длины)
$postName = $_GET['postname'];
$postData = $_GET['postdata'];
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>Редактирование поста | FeedMe</title>
    </head>
    <body>
        <header>
            <h1>FeedMe</h1>
            <p>Редактирование поста</p>
            <a href="start.php">Назад</a>
        </header>
                <form method="post" action="updater.php">
                    <p><input type="text" placeholder="Новое название поста" name="newname" value="<?php echo($postName); ?>" require></p>
                    <textarea name="newdata" placeholder="Новый текст поста" maxlength="767" cols="100" rows="15" require><?php echo($postData); ?></textarea>
                    <input type="hidden" name="id" value="<?php echo($id); ?>">
                    <p><input type="submit" value="Редактировать"></p>
                </form>
        <p><pre>













        </pre></p>
        <footer>
            <h4>FeedMe</h4>
            <p><i>Тестовый сайт. Для реальный проектов лучше пользоваться фреймворками, а не "изобретать велосипед".</i></p>
            <p class="year"><small>2025</small></p>
        </footer>
    <body>
</html>