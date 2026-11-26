<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.svg" type="image/x-icon">
    <title>Noface - Создать пост</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="index.php"><h1>Noface</h1></a>
            <a class="create-back-btn" href="index.php">Назад</a>
        </header>
        <main class="create-post-main">
            <form class="post-create-container" method="POST" action="./db/send_post.php">
                <h2>Создайте пост</h2>

                <label for="post-top">Заголовок поста</label>
                <textarea class="post-top" name="post-top" id="post-top" placeholder="Тема поста..."></textarea>

                <label for="text">Текст поста</label>
                <textarea class="post-text" id="text" name="text" placeholder="Содержимое поста..."></textarea>

                <button type="submit" id="publishButton" disabled>Опубликовать</button>
            </form>
        </main>
    </div>
    <script src="./js/create-post.js"></script>
</body>
</html>