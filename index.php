<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Art galleries</title>

    <link rel="stylesheet" href="style3.css">
 <!--   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
    
    <header>
        <div class="logo">
            <a href="#logo">
                <img src="images/logo.png" alt="Logo" width="15%" height="15%"/>
            </a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#logo">Main</a></li>
                <li><a href="#list">Galleries of the world</a></li>
                <li><a href="#leavefeedback">Feedback</a></li>
            </ul>
        </div>
    </header>

    <main>
        <section class="main">
            <img src="images/main.jpg"/>
            <h2 id="main"><span>Art galleries<br></span><a href="#list"><button>See list</button></a></h2>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

        <section class="list">
            <h2 id="list">Galleries of the world</h2>
            <div id="galleryList"></div> 

            <?php
 /*               
                require 'script.php'; //подключение script.php = подключение БД + выгрузка данных
                foreach ($galleries as $gallery) {
                    if (!empty($gallery['data'])) {
                        echo "<div class='{$gallery['class']}'>";
                        echo "<img src='{$gallery['file']}' height='250px' width='250px'/>";
                        echo "<h5><a href='{$gallery['link']}'>{$gallery['name']}</a></h5>";
                        echo "</div>";
                    }
                }
 */           ?>
        </section>

        <section class="list">
            <div class="gal10">
            <a href="TretyakovGallery.php"> <img src="images/TretyakovGallery.png" height="350px" width="350px" class="tre1"> </a>
            
            <h5><a href="TretyakovGallery.php">"Tretyakov Gallery"</a></h5>
            <?php // подгрузка из базы данных
                require 'script.php';
                foreach($tretyakovGallery as $row1)  { 
                echo '<h3> Location: ' . $row1['city'] . '</h3>';
                echo '<h3> The founder of the museum: ' . $row1['founder'] . '</h3>';
                echo '<h3> Date of foundation: ' . $row1['year'] . '</h3>';
                echo '<h3> ' . $row1['inform'] . '</h3>';
                echo "</div>";
             }
            ?>
        </section>

        <section class="list">
            <div class="gal10">
            <a href="GalleriadegliUffizi.php"> <img src="images/GalleriadegliUffizi.png" height="350px" width="350px" class="tre1"> </a>
            
            <h5><a href="GalleriadegliUffizi.php">"Galleria degli Uffizi"</a></h5>
            <?php // подгрузка из базы данных
                require 'script.php';
                foreach($uffiziGallery as $row2)  { 
                echo '<h3> Location: ' . $row2['city'] . '</h3>';
                echo '<h3> The founder of the museum: ' . $row2['founder'] . '</h3>';
                echo '<h3> Date of foundation: ' . $row2['year'] . '</h3>';
                echo '<h3> ' . $row2['inform'] . '</h3>';
                echo "</div>";
             }
            ?>
        </section>

        <section class="list">
            <div class="gal10">
            <a href="TheHermitageMuseuminStPetersburg.php"> <img src="images/TheHermitageMuseuminStPetersburg.png" height="350px" width="350px" class="tre1"> </a>
            
            <h5><a href="TheHermitageMuseuminStPetersburg.php">"The Hermitage Museum"</a></h5>
            <?php // подгрузка из базы данных
                require 'script.php';
                foreach($hermitageMuseum as $row3)  { 
                echo '<h3> Location: ' . $row3['city'] . '</h3>';
                echo '<h3> The founder of the museum: ' . $row3['founder'] . '</h3>';
                echo '<h3> Date of foundation: ' . $row3['year'] . '</h3>';
                echo '<h3> ' . $row3['inform'] . '</h3>';
                echo "</div>";
             }
            ?>
        </section>

        <section class="list">
            <div class="gal10">
            <a href="OldMastersGallery.php"> <img src="images/OldMastersGallery.png" height="350px" width="350px" class="tre1"> </a>
            
            <h5><a href="OldMastersGallery.php">"Old Masters Gallery"</a></h5>
            <?php // подгрузка из базы данных
                require 'script.php';
                foreach($oldMastersGallery as $row4)  { 
                echo '<h3> Location: ' . $row4['city'] . '</h3>';
                echo '<h3> The founder of the museum: ' . $row4['founder'] . '</h3>';
                echo '<h3> Date of foundation: ' . $row4['year'] . '</h3>';
                echo '<h3> ' . $row4['inform'] . '</h3>';
                echo "</div>";
             }
            ?>
        </section>
        
        <section class="list">
            <h2 id="lis">Feedbacks</h2>
            <div id="feedbackList"></div> 
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

        <script> // считать ОТЗЫВЫ из БД и разместить на странице в Feedbacks
            function getData(){
                $.ajax({
                type: 'GET',
                    url: 'ajax.php',
                    cache: false,
                    data: {func: 'getFeedbacks'},
                    success: function (response){
                        $('#feedbackList').html(response);
                    }
                })
            }
            setInterval(()=>getData(), 10000); // интервал вызовв функции 10 секунд
            $(document).ready(function () {
                getData();
            });
        </script>

        <section class="feedback"> <br> <br>            
            <h2 id="leavefeedback">Leave Feedback</h2>
            <form action="" method="POST" id="feeedback_to_write">
                <form id="feedbackForm">
                    <fieldset class="account-info">
                        <label><input name="name" type="text" id="name" placeholder="Name" required autocomplete="off"></label>
                        <label><input name="phone" type="tel" id="phone" placeholder="+7 (999) 99 99 999" required></label>
                        <label><textarea name="comment" type="text" id="comment" placeholder="Type your message" required autocomplete="off"></textarea></label>
                    </fieldset>
                    <fieldset class="account-action">
                        <input class="btn" type="submit" value="Send">
                    </fieldset>
                </form>
            </form>    
            <div id="feedbackList1"></div>
        </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  
    <script>
        $(document).ready(function() {
        $("#phone").mask("+7 (999) 99-99-999");
        });
    </script>


    <script> // отправка отзыва в БД
        $("#feeedback_to_write").on("submit", function (){
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'html',
                data: $(this).serialize(),
                success: function (response){
                    alert(response);
                }
            }) ;
        });
    </script>


    <footer class="footer">
        <p>&copy;Art galleries, 2024</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>