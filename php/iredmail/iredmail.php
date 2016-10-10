<?php
require_once '../../jsonRPCClient.php';
include '../mysql.php';
GetDB();
$arr = array();
$arr1 = array();
// Функция загржужает в массив ФИО и email и id
function sql() {
 $query = "SELECT name,id,email  FROM  phone  WHERE 1 ";
 $arr = array();
 $sql = mysql_query($query);
 while ($sql_data = mysql_fetch_array($sql)) {
 $arr[] = $sql_data;	
	  }
	return $arr ;
 } 
$arr1 = sql() ;
$mail = new 
// Загружаем массив из email и ФИО в переменную через jsonRPC
jsonRPCClient('http://31.186.103.115/book/sql.php');
$arr = $mail -> email() ;
// Сравниваем массив полученный из iredmail и массив в нашей записной книжке
for ($i = 0; $i <= count($arr); $i++)  {
for ($g = 0; $g <= count($arr1); $g++)
 {
// Вырезаем пробелы из ФИО
   $n_str = str_replace(" ","",$arr[$i][1]); 
   $n_str1 = str_replace(" ","",$arr1[$g][0]);
// Если совпадают ФИО,то записываем email в базы справочника по id,также проверяет что значение  ФИО !=NULL и поле email пустое
if (($n_str == $n_str1) and ( !empty($n_str)) and ( empty($arr1[$g][2])) ) { $res = mysql_query(" UPDATE phone SET email = '".$arr[$i][0]."' where id = '".$arr1[$g][1]."' "); }
 }
}
mysql_close();
?>


