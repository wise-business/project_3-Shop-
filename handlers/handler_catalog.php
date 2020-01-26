<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    $result = $link 
                    -> query('SELECT * FROM `goods`');
    $products = [];
    while( $row = $result -> fetch_assoc() ) {
        $products[] = $row;
    }
    echo json_encode($products);
?>