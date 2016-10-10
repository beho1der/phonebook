<?php
require_once '../../jsonRPCClient.php';
include '../mysql.php';
GetDB();
$arr = array();
$arr1 = array();
$diff = array();
$test1 = array();
$test2 = array();
function sql() {
 $query = " SELECT number,name,id  FROM  phone  WHERE 1 ";
 $arr = array();
 $sql = mysql_query($query);
 while ($sql_data = mysql_fetch_array($sql)) {
 $arr[] = $sql_data;	
	  }
	return $arr ;
 } 
$arr1 = sql() ;
$asterisk = new 
// Загружаем массив из email и ФИО в переменную через jsonRPC
jsonRPCClient('http://192.168.10.62/book/asterisk.php');
$arr = $asterisk -> asterisk() ;
for ($i = 0; $i <= count($arr); $i++)  {
for ($g = 0; $g <= count($arr1); $g++)
 {
// Вырезаем пробелы из ФИО
   $n_str = str_replace(" ","",$arr[$i][1].$arr[$i][2]); 
   $n_str1 = str_replace(" ","",$arr1[$g][1]);
if (($arr[$i][0] == $arr1[$g][0]) && ($n_str != $n_str1)) { $res = mysql_query(" UPDATE phone SET name = '".$arr[$i][1]." ".$arr[$i][2]."' where id = '".$arr1[$g][2]."' "); }
 }
}

//находим уникальные элементы в двух многомерных массивах и заносим в базу их
for ($i = 0; $i <= count($arr); $i++) {
	$test1[] = $arr[$i][0]; }
for ($g = 0; $g <= count($arr1); $g++) {
	$test2[] = $arr1[$g][0]; }
$diff = array_diff($test1,$test2);
foreach($diff as $value ) {
for ($i = 0; $i <= count($arr); $i++) {
if (($value == $arr[$i][0]) and (!empty($arr[$i][2])) ) { $res = mysql_query(" INSERT INTO phone  (name, number)  VALUES ('".$arr[$i][1]." ".$arr[$i][2]."', '$value') "); }   
 } 
} 
mysql_close();
?>

