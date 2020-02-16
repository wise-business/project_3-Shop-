<?php   
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    $category = $_GET['category'];
    $result = $link 
                    ->query("SELECT * FROM `categories` WHERE `id` = '$category'");                  
    $res = $result -> fetch_assoc();

    function getItems($link,$query) {
        $result = $link 
                        -> query($query);        
        $products = [];
        while( $row = $result -> fetch_assoc() ) {
            $products[] = $row;
           
        }   
        echo json_encode($products);  
    }
    
    if($res['parent_id']) {
        $query = "SELECT * FROM `goods` WHERE `categories_id` = $category";
        getItems($link,$query);
        
    } else {
        $query = "SELECT `goods`.* 
                    FROM `categories` 
                    RIGHT JOIN `goods` 
                    ON `goods`.`categories_id` = `categories`.`id` 
                    WHERE `categories`.`parent_id` = $category";
        getItems($link,$query);
    }
?>