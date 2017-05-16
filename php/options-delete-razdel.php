<?php 
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$razdel = $_GET['razdel'];
?>
<?php

include ("db.php");
$select = "SELECT * FROM products WHERE razdel='$razdel' and login='$logins' ";
$select1 = mysql_query($select);

$sql = "DELETE FROM products WHERE razdel='$razdel' and login='$logins' ";
$result = mysql_query($sql);
$sql2 = "DELETE FROM razdel WHERE razdel='$razdel' and login='$logins' ";
$result1 = mysql_query($sql2); 
    while ($row = mysql_fetch_object($select1)) { 
         
        $file = $row->filename; 
     
        unlink("../$file"); 
    } 

header('Location: ../page.php?cond=2');

?>