<?php require_once './db/load_posts.php' ?>
<?php require_once './db/cookies.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
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
                <center><h2>Посты</h2></center>
                <?php if($result && mysqli_num_rows($result) != 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <article class="post-container">
                            <p><?= date("d.m.y", strtotime($row['created_at'])) ?></p>
                            <h4><?= nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'))?></h4>

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