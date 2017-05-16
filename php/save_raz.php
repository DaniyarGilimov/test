<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
?>  
<?php
            include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); 
?>
<?php 
	$namecomp = $row['namecomp'];
    if (isset($_POST['razdel'])) { $razdel = $_POST['razdel']; if ($razdel == '') { unset($razdel);} }
    if (empty($razdel)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $razdel = stripslashes($razdel);
    $razdel = htmlspecialchars($razdel);
    //удаляем лишние пробелы
    $razdel = trim($razdel);

	include ("db.php");// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    // проверка на существование пользователя с таким же логином
    $result1 = mysql_query("SELECT razdel FROM razdel WHERE razdel='$razdel' and login='$logins' ",$db);
    $myrow = mysql_fetch_array($result1);
    
    if (!empty($myrow['razdel'])) {
    exit ("Извините, введённый вами товар уже зарегистрирован.");
    }
    // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO razdel (razdel,login,namecomp) VALUES('$razdel','$logins','$namecomp')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        //echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href=inpex.php?login=",$login," >Главная страница</a>";
        echo  "<p>Вы успешно</p>" ; 
        echo "$login";
        header('Location: ../dobraz.php');
    }
 else {
    echo "<p>ганнам стайл)</p>";
    echo "$login";
    }
    
?>