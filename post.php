<?php 
    require_once './db/db.php';

    $post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $post = null;

    if ($post_id > 0) {
        mysqli_set_charset($connection, 'utf8mb4');

        $stmt = mysqli_prepare($connection, "SELECT post_topic, post_content, sender_id, created_at FROM posts WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $post_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        $post = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Noface - <?= $post ? htmlspecialchars($post['post_topic'], ENT_QUOTES, 'UTF-8') : 'Пост не найден' ?></title>
</head>
<body>
    <div class="container">
        <header>
            <a href="index.php"><h1>Noface</h1></a>
            <a class="create-back-btn" href="create-post.php">Создать пост</a>
        </header>
        <main class="post-window-main">
            <?php if ($post): ?>
                <article class="post-window">
                    <p class="post-window-date"><?= date("d.m.y", strtotime($post['created_at'])) ?></p>
                    <h1 class="post-window-topic">
                        <?= nl2br(htmlspecialchars($post['post_topic'], ENT_QUOTES, 'UTF-8')) ?>
                    </h1>
                    <div class="post-window-content">
                        <?= nl2br(htmlspecialchars($post['post_content'], ENT_QUOTES, 'UTF-8')) ?>
                    </div>
                </article>
            <?php else: ?>
                <center><p>Пост не найден или был удален :P</p></center>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
