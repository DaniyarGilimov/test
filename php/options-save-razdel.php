<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$razdel1 = $_GET['razdel'];  
            include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); 
            $namecomp = $row['namecomp'];
    if (isset($_POST['razdel'])) { $razdel = $_POST['razdel']; if ($razdel == '') { unset($razdel);} } 
    if (empty($razdel)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $razdel = htmlspecialchars($razdel);
    $razdel = stripslashes($razdel);
include ("db.php");

$sql = "UPDATE razdel SET razdel='$razdel' WHERE razdel='$razdel1' and login='$logins'";
$result = mysql_query($sql);
$sql1 = "UPDATE products SET razdel='$razdel' WHERE login='$logins' and razdel='$razdel1'";
$result1 = mysql_query($sql1);
header('Location: ../page.php?cond=1');
?>