<?php
    $header_files = [
        'title' => 'Карзина покупок',
        'styles' => ['style.css','basket.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>

<?php
    $footer_config = [
        'js' => ['basket.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>