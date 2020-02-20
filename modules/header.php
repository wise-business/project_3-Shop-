<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/function.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    
    session_start();
    if( isset($_SESSION['id_user']) ){
        $userCheck = getUserData($link,$_SESSION['id_user']); 
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
        <header class="header">
            <div class="header-left">
                <a href="/" class="header-left__logo"></a>
                <nav class="menu menu_margin-left">
                    <a href="/catalog.php?id=2" class="menu__link">Женщинам</a>
                    <a href="/catalog.php?id=1" class="menu__link">Мужчинам</a>
                    <a href="/catalog.php?id=3" class="menu__link">Детям</a>
                    <a href="#" class="menu__link">Новинки</a>
                    <a href="#" class="menu__link">О нас</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="block-and-icon">
                    <img src="/images/icons/account.png" alt="img" class="block-and-icon__icon">
                    <div class="block-and-icon__block">

                        <?php if( isset($userCheck) ): ?>
                            Привет, <?=$userCheck['name']?> ( <a href="/account.php" class="block-and-icon__block-link">Выйти</a> )
                        <?php else: ?>
                            <a href="/login.php" class="block-and-icon__block-link">Войти</a>
                        <?php endif;?>

                    </div>
                </div>
                <div class="block-and-icon">
                    <img src="/images/icons/bascet.png" alt="img" class="block-and-icon__icon">
                    <a href="/basket.php"class="block-and-icon__block-link">Корзина&nbsp;</a>
                    <span class="block-and-icon__quantity"></span>
                </div>
            </div>
        </header>