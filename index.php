<?php 
    if(!isset($_COOKIE['user_id'])) {
        $uniqId = bin2hex(random_bytes(16));

        setcookie('user_id', $uniqId, [
            'expires' => time() + 86400 * 365,
            'path' => '/',
            'secure' => false, // ВРЕМЕННО FALSE!!!! ПОТОМ ПОМЕНЯТЬ НА TRUE
            'httponly' => true, 
            'samesite' => 'Lax',
        ]);

        $currentUserId = $uniqId;
    } else {
        $currentUserId = $_COOKIE['user_id'];
    }
?>

<?php
    require_once 'db.php';

    mysqli_set_charset($connection, 'utf8mb4');

    $sql = "SELECT content, `created_at` FROM posts ORDER BY `created_at` DESC";
    $result = mysqli_query($connection, $sql);
?>

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