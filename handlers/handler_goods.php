<?php
    session_start();
    
    if( !empty($_GET['id']) ) {

        if( empty($_SESSION['basket']) ) {
            $_SESSION['basket'] = [];
        }
        $not_find_id = true; //--------------флаг для отслеживания id товара, что бы не повторять добавления в $_SESSION['basket]
        foreach($_SESSION['basket'] as $key => $value) {
            
            if($value['id'] == $_GET['id']) {
                $_SESSION['basket'][$key]['quantity']++;
                $not_find_id = false;
            } 
        }
        if($not_find_id) {
            $_SESSION['basket'][] = [
                'id' => $_GET['id'],
                'quantity' => 1
            ]; 
        }
    }
    $all_goods = 0;      //--------------общее количество товара в карзине, что бы видно было сверху около лого карзины
    if( !empty($_SESSION['basket']) ) {
        foreach($_SESSION['basket'] as $value) {
            $all_goods = $all_goods + $value['quantity'];
        }
    }
    echo $all_goods;
?>