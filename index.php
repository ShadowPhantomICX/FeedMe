<?php
// FeedMe 
// Junior level (Junior уровень)
// Index page (главная страница)

// Connect database file (Подключаем файл датабазы)
include ("script/database.php");

// Making a request to the DB (Формируем запрос к БД)
$sql = "SELECT `id`, `postname`, `postdata`, `username` FROM `posts`";

// Send a request to the database (Отправляем запрос к БД)
$sth = $pdo->query($sql);
// Denoting a variable for storing an array (Обозначаем переменную для хранения массива)
$posts = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>Главная | FeedMe</title>
    </head>
    <body>
        <header>
            <h1>FeedMe</h1>
            <nav>
                <!-- Navigation (навигация) -->
                <a href="singin_signup_form.html">Вход/Регистрация |</a>
                <a href="rules-portal.html"> Правила портала |</a>
            </nav>
        </header>
        <h3>Лента</h3>
        <div class="post">
        <!-- Search posts (ищем посты) -->
            <?php if (empty($posts)): //Post not found (пост (сообщение) не найден(-о)?>
                <p>Лента пуста. Возможно, произошёл сбой.</p>
            <?php else: ?>
        <!-- Posts was founded (Пост (сообщение) был(-о) найден(-о)) -->
                <?php foreach ($posts as $post): ?>
                    <h3><?= htmlspecialchars($post['postname']) //Title post (заголовок поста) ?></h3>
                    <p><?= nl2br (htmlspecialchars($post['postdata'])) //"Body" post ("Тело" поста) ?></p>
                    <small>
                        Опубликовал(-а): <?= htmlspecialchars($post['username']) //Author (Автор) ?>
                    </small>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
            <p><pre>




                        <!-- Empty space (interval) (Пустое пространство (интервал)) -->




            </pre></p>
        <footer>
            <h4>FeedMe</h4>
            <p><i>Тестовый сайт. Для реальный проектов лучше пользоваться фреймворками, а не "изобретать велосипед".</i></p>
            <p class="year"><small>2025</small></p>
        </footer>
    </body>
</html>
