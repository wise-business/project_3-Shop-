<?php
    $link = new mysqli('localhost','root','','project_2');
    $link -> set_charset('utf-8');
    if(!$link) {
        echo 'Не удалось подключиться к БД';
    }
?>