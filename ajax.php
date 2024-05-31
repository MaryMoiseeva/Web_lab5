<?php
// Параметры для подключения
    $db_host = "localhost"; 
    $db_base = 'art_galleries'; // имя БД
    $db_user = "root"; // логин БД
    $db_password = ""; // пароль БД

// Подключение БД
    try {
        $connection = new PDO("mysql:host=$db_host; dbname=$db_base", $db_user, $db_password);
    } 
    catch (PDOException $e) {
        echo "Отсутствует подключение к базе данных!";
    }
    $connection->exec("set names utf8");

// Обработка запросов
    switch ($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['func']) && $_GET['func'] == 'getFeedbacks')
                getFeedbacks();
            break;
        case 'POST':{
            addFeedback($_POST['name'], $_POST['phone'], $_POST['comment']);
            break;
        }
    }

// Считывание и вывод всех отзывов
    function getFeedbacks()
    {
        global $connection;
        $result = $connection->query('SELECT * FROM feedbacknew');
        if($result->rowCount() == 0)
            echo '<div class="list-title second-line">Пока нет ни одного отзыва</div>';
        else{
            foreach($result as $row) {
                echo '<div class="txt-feedlist">';
                echo '<label class="txt-feedname">' . $row['name'] . '</label><br>';
                echo '<label class="txt-message">' . $row['message'] . '</label><br>';
                echo '</div>';
            }
        }
    }

// Добавление нового отзыва
    function addFeedback($name, $phone, $comment)
    {
        global $connection;
        try {
            $sql = "INSERT INTO feedbacknew (name, phone, message) VALUES ('$name', '$phone', '$comment')";
            $affectedRowsNumber = $connection->exec($sql);
//            header("Location: index.php#feedbackList");
            if($affectedRowsNumber > 0 ){ // если добавлена как минимум одна строка
                echo "The feedback is successfully added";
//                echo "Отзыв успешно добавлен";
            }
//            header("Location: index.php#feedbackList");
        }
        catch (PDOException $e) {
            echo "<script>alert('Data entry error');</scripThe>";
//            echo "Ошибка базы данных: " . $e->getMessage();
        }
    }

?>