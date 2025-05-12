<?php
session_start();
// Page CRUD (Create, Read, Update, Delete) posts (Страница Создания, Чтения, Обновления, Удаления постов)
include ("database.php");

$user = $_SESSION['user_login'];
$sql = "SELECT `id`, `postname`, `postdata` FROM `posts` WHERE `username` = '$user'";

$sth = $pdo->query($sql);
$posts = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Работа с постами | FeedMe</title>
    </head>
    <body>
        <header>
            <h1>FeedMe</h1>
            <p>Работа с постами</p>
        </header>
        <p>Здравствуйте, <?php echo($user); ?>! Что будем делать сегодня?</p>
        <p><button type="button" onclick="window.Creator.showModal()">Создать пост</button></p>
            <dialog id="Creator">
                <!-- Create posts (Создание постов) -->
                <form method="post" action="create.php">
                    <p>Создание поста</p>
                    <p><input type="text" placeholder="Введите лаконичное название поста" name="post_name" required></p>
                    <textarea name="post_data" placeholder="Введите текст поста. Размер не должен превышать 767 символов" maxlength="767" cols="100" rows="15" required></textarea>
                    <p><input type="submit" value="Создать"></p>
                </form>
                <form>
                    <input type="submit" value="Закрыть это окно">
                </form>
            </dialog>
            <div class="my_posts">
                <!-- Read posts (Чтение постов) -->
                <p>Ваши посты:</p>
                    <?php if (empty($posts)): ?>
                        <p>Вы ещё не создали ни одного поста. Создайте его с помощью кнопки "Создать пост"!</p>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                            <h3><?= htmlspecialchars($post['postname']) ?></h3>
                            <p><?= nl2br (htmlspecialchars($post['postdata'])) ?></p>
                            <form method="get" action="update.php">
                                <!-- Update/edit posts (Обновление/редактирование постов) -->
                                <input type="hidden" name="postname" value="<?php echo($post['postname']); ?>">
                                <input type="hidden" name="postdata" value="<?php echo($post['postdata']); ?>">
                                <input type="hidden" name="id" value="<?php echo($post['id']); ?>">
                                <input type="submit" value="Редактировать">
                            </form>
                            <form method="get" action="delete.php" onsubmit="return confirm('Вы действительно хотите удалить этот пост? Он будет утерян НАВСЕГДА')">
                                <!-- Delete posts (Удаление постов) -->
                                 <input type="hidden" name="id" value="<?php echo($post['id']); ?>">
                                 <input type="submit" value="Удалить пост">
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
            <p><pre>





            </pre></p>
        <footer>
            <h4>FeedMe</h4>
            <p><i>Тестовый сайт. Для реальный проектов лучше пользоваться фреймворками, а не "изобретать велосипед".</i></p>
            <p class="year"><small>2025</small></p>
        </footer>
    </body>
</html>