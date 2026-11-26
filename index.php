<?php require_once './db/load_posts.php' ?>
<?php require_once './db/cookies.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
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
                            <p><?= date("d.m.y", strtotime($row['created_at'])) ?></p>
                            <h3><?= nl2br(htmlspecialchars($row['post_topic'], ENT_QUOTES, 'UTF-8')) ?></h3>
                            <h4 class="post-content-text"><?= nl2br(htmlspecialchars($row['post_content'], ENT_QUOTES, 'UTF-8'))?></h4>
                            <button class="read-more-btn" style="display: none;">Читать дальше...</button>

                            <!-- <section class="post-like-section">
                                <button id="post-like" class="post-like">
                                    <svg class="like-icon" width="22" height="21" viewBox="0 0 22 21" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.1343 10.0054C18.4357 13.2502 14.1722 16.7513 10.9923 19C10.9923 19 3.60076 13.6072 1.85028 10.0054C0.260681 6.73455 1.19747 4.03954 2.24776 2.85048C3.29813 1.66142 4.46677 1.13251 6.0242 1.0107C8.34716 0.829011 10.9923 4.07702 10.9923 4.07702C10.9923 4.07702 13.6016 0.789293 15.9612 1.0107C17.5527 1.16004 18.7146 1.58687 19.7369 2.85048C21.128 4.57017 21.5255 7.34785 20.1343 10.0054Z"/>
                                    </svg>
                                </button>
                                <p>0</p>
                            </section> -->

                        </article>
                    <?php endwhile; ?>     
                <?php else: ?>
                    <center><p>Постов ещё нет... Станьте первым</p></center>
                <?php endif; ?>
            </section>
        </main>
    </div>
    <footer>
        <h5>© Noface 2026 | Анонимный форум</h5>
    </footer>
    <script src="./js/index.js"></script>
</body>
</html>