<?php

    $header_files = [
        'title' => 'Каталог',
        'styles' =>['style.css','catalog.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    // session_destroy();
?>
        <div class="road">
            <span>Главная /</span>
            <span> Все </span>
            <span></span>
        </div>
        <main>
            <section class="head">
                <h1 class="h1">Общий каталог</h1>
                <p>Все товары</p>
            </section>
            <form class="search" method="GET">
                <select name="categories">
                    <option value="all">Все</option> 
                    <option value="1" class="man">Мужчинам</option>
                    <option value="2" class="woman">Женщинам</option>
                    <option value="3" class="children">Детям</option>
                </select>
                <select name="sub-categories" class="sub-categories"></select>
                <select name="sub-categories" class="sub-price">
                    <option value="all_prices">Все цены</option>
                    <option value="from_0_to_1000">О - 1000руб</option>
                    <option value="from_1000_to_3000">100О - 3000руб</option>
                    <option value="from_3000_to_6000">300О - 6000руб</option>
                    <option value="from_6000_to_20000">600О - 20 000руб</option>
                </select>
            </form>
            <section class="goods"></section>
            <section class="pagination"></section>
        </main>
<?php
    $footer_config = [
        'js' => ['catalog.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>