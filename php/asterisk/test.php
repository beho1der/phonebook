<?php
include '../mysql.php';
GetDB();
$res = mysql_query(" UPDATE phone SET organization = 'Речелстрой' WHERE organization = 'Рейчелстрой' ");
mysql_close();
