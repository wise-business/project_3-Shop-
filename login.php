<!-- файл где происходит регистрация пользователя -->
<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/function.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

    if( isset($_POST) ) {

        if( !empty($_POST['login']) ) {
            $error = '';
            $login = $_POST['login'];
            $password = md5(md5($_POST['password'])); // двойное шифрование

            $query = "SELECT * FROM `users`
                                    WHERE `login` = '$login'
                                    AND `password` = '$password'";
            $result = $link -> query($query);
            if($result -> num_rows != 0) {
                $user = $result -> fetch_assoc();
            
                session_start();
                $_SESSION['id_user'] = $user['id'];
                header('location:'.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/account.php');
            } else {
                $error = 'Неверный логин или пароль!Попробуйте еще раз';
            }
        }
    }
    $header_files = [
        'title' => 'Регистрация пользователя',
        'styles' => ['style.css','login.css'] 
    ];
    // include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php foreach($header_files['styles'] as $value): ?>
        <link rel="stylesheet" href="/styles/<?= $value?>">
    <?php endforeach;?>
    <title><?=$header_files['title']?></title>
</head>
<body>
    <div class="wrapper">
        <h1>Вход в личный кабинет</h1>
        <form method="POST">
            <input type="text" name="login" placeholder="Введите логин">
            <input type="password" name="password" placeholder="Введите пароль">
            <input type="submit" value="Вход">
        </form>

        <?php if( isset($error) ):?>
            <?= $error?>
        <?php endif;?>

<?php
    $footer_config = [
        'js' => ['login.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>