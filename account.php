<!-- файл где происходит регистрация пользователя -->
<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/function.php');

    session_start();
    if( isset($_SESSION['id_user']) ) {
        $userData = getUserData($link,$_SESSION['id_user']);
    }
    else {
        header('location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/login.php');
    }
    $header_files = [
        'title' => 'Страница пользователя',
        'styles' => ['style.css','account.css'] 
    ];
    // include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
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


<?php
    $footer_config = [
        'js' => ['account.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>