<?php
    require_once '../db/db.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $raw_post_topic = $_POST['post-top'] ?? '';
        $raw_post_content = $_POST['text'] ?? '';
        $sender_id = $_COOKIE['user_id'] ?? '';

        if ($raw_post_topic !== '' && $raw_post_content !== '' && $sender_id !== '') {
            $contentStmt = mysqli_prepare($connection, "INSERT INTO posts(post_topic, post_content, sender_id) VALUES(?, ?, ?)");
            mysqli_stmt_bind_param($contentStmt, "sss", $raw_post_topic, $raw_post_content, $sender_id);

            if (mysqli_stmt_execute($contentStmt)) {
                header("Location: http://localhost/pyha/index.php");
                exit;
            } else {
                echo "Ошибка";
            }
            mysqli_stmt_close($contentStmt);
        } 

        mysqli_close($connection);
    }
?>
