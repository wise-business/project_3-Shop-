<!-- файл личной страницы -->
<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/function.php');

    $header_files = [
        'title' => 'Страница пользователя',
        'styles' => ['style.css','account.css'] 
    ];
    $mime = ['image/gif','image/jpeg','image/png'];
    $max_size_mb = 3145728;
    $error = [];     

    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    $userData = checkLoginUser($link);
    if( !empty($_POST) ) {
        
        d($_POST);
        d($_FILES);
        d(umask());
        //------------------------------------- Проверка и добавление файла ---------------------------
        function check_file($mime, $max_size_mb) {

            $error = [];
            $size = $max_size_mb / (1024*2);
            if( in_array($_FILES['pic']['type'],$mime) ) {
            
                if($_FILES['pic']['size'] < $max_size_mb) {
    
                    // ------------------ Создаем и добавляем дириктории для файлов -----------
                    if(!is_dir('images/add')) {
                        $dir = 'images/add';
                        mkdir($dir);
                    }
                    // -------------------------- Переименовываем файл ------------------------
                    $file_name = date('Y-m-d-h-i-s').'.jpg';
                    $dir_and_file = $dir.'/'.$file_name;
                    if(!file_exists($dir_and_file)) {

                        move_uploaded_file($_FILES['pic']['tmp_name'], $dir_and_file);
                        $error[] = 'Файл успешно добавлен';
                    } else {
                        $error[] = 'Такой файл уже существует';
                    }
                } else {
                    $error[] = "Размер файла не может больше {$size}MB";
                }
            } else {
                $error[] = 'Не правильный тип файла';
            }
            return $error;
        }
        $error = check_file($mime, $max_size_mb);
        d($error);
        
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php foreach($header_files['styles'] as $value): ?>
        <link rel="stylesheet" href="/styles/<?= $value?>">
    <?php endforeach;?>
    <title><?=$header_files['title']?></title>
</head>
<body>
    <div class="wrapper">
        <h1>Личный кабинет</h1>
        <h2>Привет <?=$userData['surname'].' '.$userData['name']?></h2>
        <?php if($userData['role'] == 'admin'):?><!--------------------- Если администратор то мы можем добавлять товар-->

            <div class="add">

                <h2 class="h2">Добавить товар в Базу Данных</h2>
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="form__block-flex">
                        <input type="text" name="name" placeholder="Введите название товара" class="form__input">
                        <input type="number" name="price" placeholder="Введите стоимость" class="form__input">
                        <input type="file" name="pic" class="form__input form__file">
                        <textarea name="description" placeholder="Описание товара" class="form__input"></textarea>
                        <input type="submit" value="загрузить" class="form__input form__submit">
                    </div>
                    <?php if(!empty($error)):?>
                        <div>
                            <?php foreach($error as $value):?>
                            <h3><?=$value?></h3>
                            <?php endforeach;?>                      
                        </div>
                    <?php endif;?>
                </form>
            </div>
        <?php endif;?>
        
<?php
    $footer_config = [
        'js' => ['account.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>