<?php
    $header_files = [
        'title' => 'Страница товара',
        'styles' => ['style.css','goods.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
d($_GET['id']);
    if( !empty($_GET['id']) ) {

        $query = "SELECT * FROM `goods` WHERE `id` = {$_GET['id']}";
        $result = $link -> query($query);
        
        $result = $result -> fetch_assoc();
        // d($result);
    }
    // session_destroy();
?>
    <main class="main">
        <div class="road">Путь к товару пока не знаю как ....????????</div>
        <div class="goods-photo" style="background-image: url(/images/catalog-img/<?=$result['pic']?>)"></div>
        <h1 class="goods-title"><?=$result['title']?></h1>
        <div class="goods-article">пока бла бла бла</div>
        <div class="add-to-basket" data-id="<?=$result['id']?>">Добавить в корзину</div>
    </main>
    

<?php
    $footer_config = [
        'js' => ['goods.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>