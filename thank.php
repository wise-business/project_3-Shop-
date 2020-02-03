<?php
    $header_files = [
        'title' => 'Спасибо',
        'styles' => ['style.css','thank.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>

<?php
    $footer_config = [
        'js' => ['thank.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>