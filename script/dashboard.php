<?php
session_start();
// Index page authorized user (Главная страница авторизованного пользователя)
include ("database.php");
$username = $_SESSION['user_login'];
$sql = "SELECT `id`, `postname`, `postdata`, `username`, `likes` FROM `posts`";
$sql2 = "SELECT `postid` FROM `like` WHERE `userlogin` = '$username'";

$sth = $pdo->query($sql);
$posts = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth2 = $pdo->query($sql2);
$like = $sth2->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>Лента | FeedMe</title>
    </head>
    <body>
         <header>
            <h1>FeedMe</h1>
            <nav>
                <!-- Navigation (Навигация) -->
                <form method="post" action="logout.php" onsubmit="return confirm('Вы действительно хотите выйти из аккаунта?')">
                    <!-- Log Out (Выход из аккаунта) -->
                    <input type="submit" value="Выйти из аккаунта">
                </form>
                <a href="start.php"> | Панель управления постами</a>
                <a href="../rules-portal.html"> Правила портала</a>
            </nav>
        </header>
        <h3>Лента</h3>
        <div class="post">
            <?php if (empty($posts)): ?>
                <p>Лента пуста. Возможно, произошёл сбой.</p>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <h3><?= htmlspecialchars($post['postname']) ?></h3>
                    <p><?= nl2br (htmlspecialchars($post['postdata'])) ?></p>
                    <small>
                        Опубликовал(-а): <?= htmlspecialchars($post['username']) ?>,
                        Оценили: <?= htmlspecialchars($post['likes']) ?> раз(-а)
                    </small>
                    <?php if ($post['username'] == $username): ?>
                        <small>Это ваш пост. </small>
                    <?php else: ?>
                        <!-- Rating post (Оценивание поста) -->
                        <?php if ($post['id'] == $like['postid']): ?>
                            <!-- If user rating this post (Если пользователь оценил этот пост) -->
                            <small>Вы не можете оценить этот пост, т.к. уже оценивали его</small>
                            <form method="post" action="unlike.php">
                                <input type="hidden" name="postid" value="<?php echo($post['id']) ?>">
                                <input type="submit" value="Удалить оценку">
                            </form>
                        <?php else: ?>
                            <form method="post" action="like.php">    
                                <input type="hidden" name="postid" value="<?php echo($post['id']) ?>">
                                <input type="submit" value="Оценить этот пост">
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
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