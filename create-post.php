<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
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

                <label>Текст поста</label>
                <textarea id="text" name="text" placeholder="Введите текст..."></textarea>
                <button type="submit" id="publishButton" disabled>Опубликовать</button>
            </form>
        </main>
    </div>
    <script src="./js/create-post.js"></script>
</body>
</html>