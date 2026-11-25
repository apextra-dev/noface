<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
        <?php
        
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $connection = mysqli_connect("localhost", "s0net", "12345", "test");

            if(!$connection) {
                die("Ошибка подключения");
            }

            mysqli_set_charset($connection, 'utf8mb4');

            $sql = "SELECT content, `created_at` FROM posts ORDER BY `created_at` DESC";
            $result = mysqli_query($connection, $sql);
        ?>
    <title>Noface - Полностью анонимный форум</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="index.php"><h1>Noface</h1></a>
            <a class="create-back-btn" href="create-post.php">Создать пост</a>
        </header>
        <main class="home-main">
            <section class="post-list">
                <?php if($result && mysqli_num_rows($result) != 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <article class="post-container">
                            <p><?= nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'))?></p>
                        </article>
                    <?php endwhile; ?>     
                <?php else: ?>
                    <center><p>Постов ещё нет... Станьте первым</p></center>
                <?php endif; ?>
            </section>
        </main>
    </div>
</body>
</html>