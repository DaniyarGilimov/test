<?php

function handle_error($user_error_message, $system_error_message)
 {die ($user_error_message ." " . $system_error_message); };

$upload_dir = "img/";
 $image_fildname = "user_pic";

 $php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
 2 => 'Превышенм мах. размер файла, указанный в форме html',
 3 => 'Была отправлена только часть файла',
 4 => 'Файл для отправки не был выбран');

 //Проверка на ошибки при отправке
$_FILES[$image_fildname]['error'] == 0
or handle_error ("Серверу не удается получить Ваше изображение<br>" , $php_errors[$_FILES[$image_fildname]['error']]);

//Действительно ли отправляемый файл изображение. Проверка
@getimagesize($_FILES[$image_fildname]['tmp_name'])
or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] ." не является изображением");

$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fildname]['name'])){
	$now++;
}
echo $upload_filename;

@move_uploaded_file($_FILES[$image_fildname]['tmp_name'], $upload_filename)
or handle_error("возникла проблема при сохранении Вашего изображения в его постоянном месте <br>",
"ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}");

include ("db.php");
$result = mysql_query("SELECT * FROM products WHERE filename='$upload_filename'",$db);
    $myrow = mysql_fetch_array($result);
    
    if (!empty($myrow['razdel'])) {
    exit ("Извините, введённый вами товар уже зарегистрирован.");
    }
$result1 = mysql_query ("INSERT INTO products (filename) VALUES('$upload_filename')");
    // Проверяем, есть ли ошибки
    if ($result1=='TRUE')
    {
        //echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href=inpex.php?login=",$login," >Главная страница</a>";
        echo  "<p>Вы успешно</p>" ; 
    }
?>