<?php 
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$nameprod = $_GET['nameprod'];
?>
<?php

include ("db.php");

$select = "SELECT * FROM products WHERE nameprod='$nameprod' and login='$logins' ";
$select1 = mysql_query($select);

$sql = "DELETE FROM products WHERE nameprod='$nameprod' and login='$logins' ";
$result = mysql_query($sql);


    while ($row = mysql_fetch_object($select1)) { 
         
        $file = $row->filename; 
     
        unlink("../$file"); 
    } 

header('Location: ../page.php?cond=2');
?>