<?php
    $db = mysql_connect("localhost", "mixailp7_chat", "6]*xyFDd");
    mysql_select_db("mixailp7_chat", $db) or die("Нет соединения с БД! " . mysql_error());

    ini_set( "date.timezone", "Europe/Samara" );
    mysql_set_charset('utf8'); // добавил кодировку БД

?>
