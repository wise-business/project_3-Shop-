<?php
    // function для отображения массивов в структурированном виде
    function d ($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    //  ф-ция которя ищет данные о пользователе
    function getUserData ($link,$id) {
        $query = "SELECT * FROM `users` WHERE `id`= $id";
        $result = $link -> query($query);
        $result = $result -> fetch_assoc();
        return $result;
    }
    // ф-ция по проверке пользователя на наличие сессии
    function checkLoginUser($link) {
        if(isset($_SESSION['id_user'])) {
            $userData = getUserData($link, $_SESSION['id_user']);
            return $userData;
        }
        // } else {
        //     header('location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/login.php');
        // }
    }
?>