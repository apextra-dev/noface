<?php require_once './posts/load_posts.php' ?>
<?php require_once './db/cookies.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/adaptive.css">
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
                <center><h2>Главная</h2></center>
                <?php if($result && mysqli_num_rows($result) != 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <article class="post-container">
                            <div class="post-header">
                                <div>
                                    <p><?= date("d.m.y", strtotime($row['created_at'])) ?></p>
                                    <a href="post.php?id=<?= $row['id'] ?>" class="post-main-link"><h3><?= nl2br(htmlspecialchars($row['post_topic'], ENT_QUOTES, 'UTF-8')) ?></h3></a>
                                </div>
                                <div class="share-post-block">
                                    <button type="button" class="share-post" data-post-id="<?= $row['id'] ?>" data-post-title="<?= htmlspecialchars($row['post_topic'], ENT_QUOTES, 'UTF-8') ?>">
                                        <img src="./assets/images/home/post/share_img.svg" alt="Поделиться">
                                    </button>
                                    <span class="share-text">Поделиться</span>
                                </div>
                            </div>
                                <h4 class="post-content-text"><?= nl2br(htmlspecialchars($row['post_content'], ENT_QUOTES, 'UTF-8'))?></h4>
                            <button class="read-more-btn" style="display: none;">Читать дальше...</button>
                        </article>
                    <?php endwhile; ?>     
                <?php else: ?>
                    <center><p>Постов ещё нет... Станьте первым</p></center>
                <?php endif; ?>
            </section>
        </main>
    </div>
    <footer>
        <h5>© Noface 2026 | Полностью анонимный форум</h5>
    </footer>
    <script src="./js/index.js"></script>
    <script src="./js/share_script.js"></script>
</body>
</html>