<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
if (isset($_SESSION['count']) && $_SESSION['count'] >= 1) {
    echo 'Ошибка!<br>Кол-во файлов больше 1';
} else { ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="./send_photo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo">
            <button type="submit">
                Отправить
            </button>
        </form>
    </body>

    </html>
<?php }

if (isset($_FILES['photo'])) {
    try {

        $path_info = pathinfo($_FILES['photo']['name']);


        if (($path_info['extension'] == 'jpg') || $path_info['extension']  == 'png') {
            if ($_FILES['photo']["size"] <= 2097152) {
                move_uploaded_file($_FILES['photo']['tmp_name'], './img/' . $_FILES['photo']['name']);
                $_SESSION['count']++;
                header('Location: ./img/' . $_FILES['photo']['name'] . '');
            } else {
                echo 'Максимальный размер файла должен быть не более 2 мб!';
            }
        } else {
            echo 'Поддерживаемые расширения файла: jpg, png';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
