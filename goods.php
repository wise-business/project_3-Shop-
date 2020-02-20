<?php
    $header_files = [
        'title' => 'Страница товара',
        'styles' => ['style.css','goods.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');

    if( !empty($_GET['id']) ) {

        $query = "SELECT * FROM `goods` WHERE `id` = {$_GET['id']}";
        $result = $link -> query($query);
        $result = $result -> fetch_assoc();
        //путь к картинке
        $queryRoad = "SELECT * FROM `categories` WHERE `id` = {$result['categories_id']}";
        $resultRoad = $link -> query($queryRoad);
        $resultRoad = $resultRoad -> fetch_assoc();
        if($resultRoad['parent_id'] == 1) {
            $parent = 'Мужчинам';
        } elseif ($resultRoad['parent_id'] == 2) {
            $parent = 'Женщинам';
        } elseif ($resultRoad['parent_id'] == 3) {
            $parent = 'Детям';
        }
    }
    // session_destroy();
?>
    <main class="main">
        <div class="road">
            <span>Главная /</span>
            <span><?=$parent?> /</span>
            <span><?=$result['title']?></span>
        </div>
        <img class="goods-photo" src="/images/catalog-img/<?=$result['pic']?>" alt="<?=$result['alt']?>">
        <h1 class="goods-title"><?=$result['title']?></h1>
        <div class="goods-article">Артикул тут</div>
        <div class="goods-price"><?=$result['price']?></div>
        <div class="goods-description">описание товара</div>
        <div class="add-to-basket" data-id="<?=$result['id']?>">Добавить в корзину</div>
    </main>
    

<?php
    $footer_config = [
        'js' => ['goods.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>