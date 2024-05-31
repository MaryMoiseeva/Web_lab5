<?php
//require 'script.php'; // подключение script.php = подключение БД 

if (isset($_POST['email']) && isset($_POST['comment'])){
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    
    try {
        $stmt = $connection->prepare("INSERT INTO feedback (email, message) VALUES (:email, :message)"); // Подготавливаем SQL-запрос
        $stmt->execute(['email' => $email, 'message' => $comment]); //Выполняем запрос       
        $result = true;
//        header("Location: index.php?formsubmit");
//            if(isset($_GET['formsubmit'])) echo "<script>alert('Форма отправлена!');</script>";
            header('Location: index.php#feedback');
            echo "<script>alert('Форма отправлена!');</script>";
       
//        echo "Сообщение успешно отправлено";
//        exit();
    } catch (PDOException $e) {
        echo "Не удалось отправить сообщение:" . $e->getMessage();
}
//    $connection = null;

}

