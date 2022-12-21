<?php
if (isset($_FILES['photo'])) {
    try {
        move_uploaded_file($_FILES['photo']['tmp_name'], './img/' . $_FILES['photo']['name']);
?>  

    <img src="<?= './img/'.$_FILES['photo']['name']; ?>">

<?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <button type="submit">
            Отправить
        </button>
    </form>
</body>

</html>
