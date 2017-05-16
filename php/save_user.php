<?php
session_start();
?>
<?php
    if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (isset($_POST['surname'])) {$surname = $_POST['surname']; if ($surname == '') { unset($surname);} }
    if (isset($_POST['namecomp'])) {$namecomp = $_POST['namecomp']; if ($namecomp == '') { unset($namecomp);} }
    if (isset($_POST['tele'])) {$tele = $_POST['tele']; if ($tele == '') { unset($tele);} }
    if (isset($_POST['login'])) {$login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '') { unset($email);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($name) or empty($password) or empty($login) or empty($surname) or empty($namecomp) or empty($email) or empty($tele)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    //удаляем лишние пробелы
    $name = trim($name);
    $password = trim($password);
    $login = trim($login);
 // подключаемся к базе
    include ("db.php");// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result1 = mysql_query("SELECT id FROM user WHERE login='$login' or tele='$tele' or email='$email'",$db);
    $myrow = mysql_fetch_array($result1);
    
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO user (name,surname,namecomp,password,login,tele,email,urlcomp) VALUES('$name','$surname','$namecomp','$password','$login','$tele','$email','$login')");
    $result3 = mysql_query ("INSERT INTO pay (login,namecomp,pack) VALUES('$login','$namecomp','1')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE' and $result3=='TRUE')
    {
        
        $_SESSION['name']=$name; 
        $_SESSION['login']=$login; 
        //echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href=inpex.php?login=",$login," >Главная страница</a>";
        header('Location: ../page.php');
        
    } 
 else {
    echo "ганнам стайл)";
    }
     
?>
