<?php

if ($_POST){
global $baglanti;
    include ('../../include/Mislina_DB.php');
    $id=(int)$_POST["id"];
    $tablo=$_POST["tablo"];

    $sorgu=$baglanti->query("UPDATE $tablo SET okundu=1 where id=$id");

    if ($sorgu) echo true;
    else echo false;

}


?>