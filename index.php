<?php
    $header_files = [
        'title' => 'Главная страница',
        'styles' => ['style.css','index.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>

<?php
    $footer_config = [
        'js' => ['index.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>

