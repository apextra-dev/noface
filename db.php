<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = mysqli_connect("localhost", "s0net", "12345", "test");
    if(!$connection) {
        die("Подключение не удалось " . mysqli_connect_error());
    }

    $raw_text = $_POST['text'] ?? '';
    if($raw_text !== '') {
        $stmt = mysqli_prepare($connection, "INSERT INTO posts(content) VALUES(?)");
        mysqli_stmt_bind_param($stmt, "s", $raw_text);

        if(mysqli_stmt_execute($stmt)) {
            header("Location: http://localhost/pyha/index.php");
            exit;
        }
        else {
            echo "Ошибка";
        }
        mysqli_stmt_close($stmt);
    } 

    mysqli_close($connection);
}
?>