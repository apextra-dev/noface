<?php
    require_once './db/db.php';

    mysqli_set_charset($connection, 'utf8mb4');

    $sql = "SELECT id, post_topic, post_content, created_at FROM posts ORDER BY created_at DESC";
    $result = mysqli_query($connection, $sql);
?>