<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/function.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    
    session_start();
    $userCheck = checkLoginUser($link); 
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
        <header>
            <div class="header-left">
                <a href="#"></a>
                <div>Женщинам</div>
                <div>Мужчинам</div>
                <div>Детям</div>
                <div>Новинки</div>
                <div>О нас</div>
            </div>
            <div class="header-right">
                <div class="user">
                    <img src="/images/icons/account.png" alt="img">
                    <div class="user-name">

                        <?php if( isset($userCheck) ): ?>
                            Привет, <?=$userCheck['name']?> ( <a href="/account.php">Выйти</a> )
                        <?php else: ?>
                            <a href="/login.php">Войти</a>
                        <?php endif;?>

                    </div>
                </div>
                <div class="basket">
                    <img src="/images/icons/bascet.png" alt="img">
                    <div class="basket-count">Корзина(5)</div>
                </div>
            </div>
        </header>