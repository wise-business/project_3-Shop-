<?php  
    sleep(1);
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
    $category = $_GET['category'];
    $itemsOnPage = 2;      //-------------------------------------------кол-во элементов на странице
    $sendData = [
        'products' => [],
        'pagination' => [
            'allPages' => 1,
            'currentPage' => 1
        ]
    ];
    $currentPage = $_GET['page'];
    if($currentPage == 1) {
        $newPage = 0;
    } elseif($currentPage > 2) {
        $newPage = ($currentPage+$currentPage) - 1;
    } else {
        $newPage = $currentPage;
    }
    
 
    function pagination ($goodsQuantity,$itemsOnPage) {
        $pages = $goodsQuantity / $itemsOnPage; 
        return $pages;
    }
    function getItems($link, $query, $itemsOnPage, $queryPagination) {
          
        $goodsQuantity = $link -> query($queryPagination);
        $goodsQuantity = $goodsQuantity -> fetch_assoc(); 
        $pages = pagination( $goodsQuantity['result'], $itemsOnPage); // посчитали кол-во товаров и передали в pagination

        $result = $link -> query($query);
        while( $row = $result -> fetch_assoc() ) {

            $sendData['products'][] = $row;
        }   
        return [$sendData['products'],$pages];
    }

    if($category == 'all') {
        $queryPagination = ("SELECT COUNT(`id`) AS `result` FROM `goods`");
        $query = ("SELECT * FROM `goods` LIMIT  $newPage,$itemsOnPage");
        $products = getItems($link, $query, $itemsOnPage, $queryPagination);
    } else {

        $result = $link 
                        ->query("SELECT * FROM `categories` WHERE `id` = '$category'");                  
        $res = $result -> fetch_assoc();
        if($res['parent_id']) {

            $queryPagination = "SELECT COUNT(`id`) AS `result` FROM `goods` WHERE `categories_id` = $category";
            $query = "SELECT * FROM `goods` WHERE `categories_id` = $category LIMIT $newPage,$itemsOnPage";
            $products = getItems($link, $query, $itemsOnPage, $queryPagination);
        } else {

            $queryPagination = "SELECT COUNT(`goods`.`id`) AS `result`
                                FROM `categories` 
                                RIGHT JOIN `goods` 
                                ON `goods`.`categories_id` = `categories`.`id` 
                                WHERE `categories`.`parent_id` = $category";
            $query = "SELECT `goods`.* 
                        FROM `categories` 
                        RIGHT JOIN `goods` 
                        ON `goods`.`categories_id` = `categories`.`id` 
                        WHERE `categories`.`parent_id` = $category
                        LIMIT $newPage,$itemsOnPage";
            $products = getItems($link, $query, $itemsOnPage, $queryPagination);
        }
    }
    $sendData['products'] = $products[0];
    $sendData['pagination']['allPages'] = $products[1];
    $sendData['pagination']['currentPage'] = $currentPage;
    echo json_encode($sendData);
?>