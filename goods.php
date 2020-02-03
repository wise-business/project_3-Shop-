<?php
    $header_files = [
        'title' => 'Страница товара',
        'styles' => ['style.css','goods.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>

<?php
    $footer_config = [
        'js' => ['goods.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>