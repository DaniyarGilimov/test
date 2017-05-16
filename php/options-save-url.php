<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$url1 = $_GET['url'];  
            include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); 
            $namecomp = $row['namecomp'];
    if (isset($_POST['url'])) { $url = $_POST['url']; if ($url == '') { unset($url);} } 
    if (empty($url)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $url = htmlspecialchars($url);
    $url = stripslashes($url);
include ("db.php");

$sql = "UPDATE user SET urlcomp='$url' WHERE urlcomp='$url1' and login='$logins'";
$result = mysql_query($sql);
header('Location: ../page.php?cond=1');
?>