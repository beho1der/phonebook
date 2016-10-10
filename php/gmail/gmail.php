<?php
include '../mysql.php';
GetDB();
// Функция загружает в массив ФИО и email и id
function sql() {
 $query = "SELECT  name,email,id FROM  `phone`  WHERE 1 ";
 $arr = array();
 $sql = mysql_query($query);
 while ($sql_data = mysql_fetch_array($sql)) {
 $arr[] = $sql_data;	
	  }
	return $arr ;
 }
// Потрошим массив и загружаем из csv в массив
$handle = fopen("gmail.csv", "r");
$arr = sql() ;
$write_sql = "тут должен быть запрос на запись в БД" ;
//Запускаем два цикла для сравнения совпадающих элементов по фамилии из двух массивов
while (($data1 = fgetcsv($handle, 1000, ",")) !== FALSE) {
for ($i = 0; $i <= count($arr); $i++) {
$data = explode(" ",$arr[$i][0]); // Обрезаем только до Фамилии
//Cраниваем фамилии если совпадают  записываем email($data1[0]) в базу в поле email,находя значение по id. 
if ($data[0] == $data1[2] && !empty($data[0]) && empty($arr[$i][1]) ) { $res = mysql_query("UPDATE phone SET email = '".$data1[0]."' where id = '".$arr[$i][2]."' ");  } ; 
  }  
}
fclose($handle);
mysql_close();
?>
