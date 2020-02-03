<?php
    $header_files = [
        'title' => 'Каталог',
        'styles' =>['style.css','catalog.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    session_destroy();
?>
        <div class="road">главная / мужчинам</div>
        <main>
            <section class="head">
                <h1>МУЖЧИНАМ</h1>
                <p>Все товары</p>
            </section>
            <section class="search">
                <div class="search-category">Категория</div>
                <div class="search-size">Размер</div>
                <div class="search-cost">Стоимость</div>
            </section>
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