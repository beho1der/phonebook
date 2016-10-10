<?php
    $db_server = "localhost";
    $db_login = "phone";
    $db_pas = "137137";
    $db_name = "phone_book";

    function GetDB() {
        global $db_server, $db_login, $db_pas, $db_name;

        $p = mysql_pconnect($db_server, $db_login, $db_pas) or die('Невозможно подключиться к серверу MySQL');
        $s = mysql_select_db($db_name) or die('Невозможно подключиться к БД "'. $db_name."\" ");

        mysql_query ("set names 'utf8'");
        mysql_query ("set character_set_client='utf8'");
        mysql_query ("set character_set_results='utf8'");
        mysql_query ("set collation_connection='utf8_bin'");

        return $s;
    };

?>
