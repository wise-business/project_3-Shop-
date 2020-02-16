<?php

    $header_files = [
        'title' => 'Каталог',
        'styles' =>['style.css','catalog.css'] 
    ];

    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    // session_destroy();
    
?>
        <div class="road">главная / мужчинам</div>
        <main>
            <section class="head">
                <h1>МУЖЧИНАМ</h1>
                <p>Все товары</p>
            </section>
            <form id="search" method="GET">
                <select name="categories">
                    <!-- <option value="all">Все</option> -->
                    <option value="1">Мужчинам</option>
                    <option value="2">Женщинам</option>
                    <option value="3">Детям</option>
                </select>
                <select name="sub-categories">
                    <option value="all">Все</option>
                    <option value="4">Обувь</option>
                    <option value="5">Куртки</option>
                    <option value="6">Костюмы</option>
                    <option value="7">Рюкзаки</option>
                </select>
                <!-- <select name="sub-categories">
                    <option value="all">Все цены</option>
                    <option value="8">О - 1000руб</option>
                    <option value="9">100О - 3000руб</option>
                    <option value="10">300О - 6000руб</option>
                    <option value="11">600О - 20 000руб</option>
                </select> -->
            </form>
            <section class="goods"></section>
            <section class="pages">
                <div class="pages-now">1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
            </section>
        </main>
<?php
    $footer_config = [
        'js' => ['catalog.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>