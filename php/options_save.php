<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$idg = $_GET['id'];  
            include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); 
            $namecomp = $row['namecomp'];

    //dobavleniye producta

       

    if (isset($_POST['opis'])) { $opis = $_POST['opis']; if ($opis == '') { unset($opis);} } 
    if (isset($_POST['opisfull'])) { $opisfull = $_POST['opisfull']; if ($opisfull == '') { unset($opisfull);} }
    if (isset($_POST['nameprod'])) { $nameprod = $_POST['nameprod']; if ($nameprod == '') { unset($nameprod);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['razdel'])) { $razdel=$_POST['razdel']; if ($razdel =='') { unset($razdel);} }
    if (isset($_POST['price'])) { $price=$_POST['price']; if ($price =='') { unset($price);} }

    if (empty($nameprod) or empty($price) or empty($opis)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    
    $nameprod = stripslashes($nameprod);
    $nameprod = htmlspecialchars($nameprod);
    $price = stripslashes($price);
    $price = htmlspecialchars($price);
    $razdel = stripslashes($razdel);
    $razdel = htmlspecialchars($razdel);
    $opis = htmlspecialchars($opis); 
    $opis = stripslashes($opis);
    $opisfull = htmlspecialchars($opisfull); 
    $opisfull = stripslashes($opisfull);
    //удаляем лишние пробелы
    $opis = trim($opis);
    $opisfull = trim($opisfull);
    $nameprod = trim($nameprod);
    $price = trim($price);
    $razdel = trim($razdel);

    include ("db.php");
    
    // файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    // проверка на существование пользователя с таким же логином
    //$result1 = mysql_query("SELECT id FROM products WHERE nameprod='$nameprod' and namecomp='$namecomp'",$db);
    //$myrow = mysql_fetch_array($result1);
    
    //if (!empty($myrow['id'])) {
    //exit ("Извините, введённый вами товар уже зарегистрирован.");
    //}

    $image_fildname = "user_pic";
    
    if (empty($_FILES[$image_fildname]['name'])) {

    //Без фоты
    include ("db.php");
    // если такого нет, то сохраняем данные
    $sql = "UPDATE products SET nameprod='$nameprod' , opis='$opis' , opisfull='$opisfull' , price='$price' WHERE id='$idg' ";
    // смотрим как выглядит наш запрос и убеждаемся, что айдишник именно тот, который нужен.
    
    // выполняем
    $result2 = mysql_query($sql);
    // смотрим, что вернул запрос и ошибки
    echo $_FILES[$image_fildname]['name'];
    echo '' . mysql_error();
    // header('Location: ../page.php?cond=1');
        //Без фото битти 

    }
    else {


        //Фотомен жумыс
     //Проверка на ошибки при отправке
    function handle_error($user_error_message, $system_error_message)
     {die ($user_error_message ." " . $system_error_message); };

    $upload_dir = "img/";
    $upload_pir = "../img/";

     $php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
     2 => 'Превышенм мах. размер файла, указанный в форме html',
     3 => 'Была отправлена только часть файла',
     4 => 'Файл для отправки не был выбран');
    $_FILES[$image_fildname]['error'] == 0
    or handle_error ("Серверу не удается получить Ваше изображение<br>" , $php_errors[$_FILES[$image_fildname]['error']]);
    
    //Действительно ли отправляемый файл изображение. Проверка
    @getimagesize($_FILES[$image_fildname]['tmp_name'])
    or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] ." не является изображением");

    $now = time();
    while(file_exists($upload_filename = $upload_pir . $now . '-' . $_FILES[$image_fildname]['name'])){
        $now++;
    }


    $upload_filename_db = $upload_dir . $now . '-' . $_FILES[$image_fildname]['name'];



    @move_uploaded_file($_FILES[$image_fildname]['tmp_name'], $upload_filename)
    or handle_error("возникла проблема при сохранении Вашего изображения в его постоянном месте <br>",
    "ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}");

    $sql = "UPDATE products SET nameprod='$nameprod' , opis='$opis', opisfull='$opisfull' , price='$price' , filename='$upload_filename_db' WHERE id='$idg' ";
    // смотрим как выглядит наш запрос и убеждаемся, что айдишник именно тот, который нужен.
    
    // выполняем
    $result2 = mysql_query($sql);
    if ($result2 == TRUE) {
        header('Location: ../page.php?cond=1');
    }else{
        echo "Blya(((";
    }
    // смотрим, что вернул запрос и ошибки

    }

?>