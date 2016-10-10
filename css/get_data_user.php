<?php
//Начинаем сессию
session_start();
//Подключаем конфигурационный файл
require_once ("config.php");
require_once ("core.php");

if (isset($_SESSION['user_id']))
{	 	
		
		connect_to_mantis_db();
		$fio = $_POST["cn"];
		echo $fio;
		$fio = iconv("UTF-8", "Windows-1251", $fio);
		$result = mysql_query("SELECT bug_id FROM bugt.mantis_custom_field_string_table AS T1 INNER JOIN bugt.mantis_bug_table AS T2 ON T1.bug_id=T2.id WHERE T1.value=\"$fio\" AND (T2.status=10 OR T2.status=20 OR T2.status=50);");
		$row = mysql_fetch_assoc($result);
		$bug_id_val = $row['bug_id'];
		mysql_free_result($result);
		 
		//Get User Data
		if ($bug_id_val != '') {
		$arr = array(); 
		$result = mysql_query("SELECT value FROM bugt.mantis_custom_field_string_table WHERE bug_id=$bug_id_val ORDER BY field_id;");
		while ($row = mysql_fetch_array($result)) {
		$arr[] = $row['value']; 
		}
		$user_pwd = $arr[1];
		$user_location = $arr[2];
		$post = $arr[3];
		$org = $arr[4];
		
		mysql_free_result($result);

		$json_data_user = iconv("Windows-1251", "UTF-8",'{"Post":"'.$post.'","Org":"'.$org.'","Loc":"'.$user_location.'","Pwd":"'.$user_pwd.'"}');
		echo $json_data_user;
		}
}
?>