<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="index.php"><h1>POSTS</h1></a>
            <a href="index.php">Назад</a>
        </header>
        <main class="create-post-main">
            <form class="post-create-container" method="POST" action="db.php">
                <h2>Создайте пост</h2>

                <label>Текст поста</label>
                <textarea name="text" placeholder="Введите текст..."></textarea>
                <button type="submit">Опубликовать</button>
            </form>
        </main>
    </div>
</body>
</html>