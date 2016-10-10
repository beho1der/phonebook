<?
//Начинаем сессию
session_start();
//Подключаем конфигурационный файл
require_once ("config.php");
require_once ("core.php");

if (isset($_SESSION['user_id']))
{
	$ad			   = ldap_con();
	$search_letter = $_GET["search"];
	$filter_s  	   = "(&(objectclass=user)(objectcategory=Person)(cn=$search_letter*))"; 
	$result 	   = ldap_search($ad, $dn, $filter_s);
	$entries 	   = ldap_get_entries($ad, $result);
	
	echo '
		<div id="utbl">
		<table class="tableusers" id="tableusers" cellspacing="1">
		<thead>
		<tr>
		<th class="first-th">#</th>
		<th>ФИО пользователя</th>
		<th>Логин</th>
		<th>Должность</th>
		<th>Локация</th>
		<th>E-Mail</th>
		<th>Телефон</th>
		<th>Домашняя папка</th>
		<th>Создан</th>
		<th>Последний вход</th>
		<th>Кол-во входов</th>
		<th class="end-th">Группы</th>
		</tr></thead>
		<tbody>';
	
	
	for ($i=0; $i < $entries["count"]; $i++)
	{
		echo '<tr>';
		$ldapusersearch = ldap_search($ad, $dn, 'cn=' . $entries[$i]["name"][0]);
		$entryid        = ldap_first_entry($ad, $ldapusersearch);
		$ldapdnread     = ldap_get_dn($ad, $entryid);
		$acctDisabled   = (bool)($entries[$i]["useraccountcontrol"][0] & 0x2);   
		if ($acctDisabled == "1"){
			echo "<td class='lock'>"; 
			echo '<img src="images/lock.png" width="12" height="12" alt="Пользователь отключен" title="Пользователь отключен">'; 
			echo "</td>"; 
		} else {
			echo "<td class='unlock'>"; 
			echo '<img src="images/ok.png" width="12" height="12" alt="Пользователь активен" title="Пользователь активен">';
			echo "</td>"; 
		}
		echo '<td><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">';
        echo $entries[$i]["name"][0]; 
		echo '<b class="caret"></b></a> 
		 <ul id="menu1" class="dropdown-menu">
                <li><a href="#" data-id="'.$ldapdnread.'" id="user_chng_pwd" onclick="ChangePwd()">Сменить пароль...</a></li>
                <li class="divider"></li>
                <li><a href="#">Удалить...</a></li>
              </ul></li>';
		echo '</td>';
		echo '<td>';
	
		echo $entries[$i]["samaccountname"][0]."<br />";
		echo '</td>';
		echo '<td> ';
		echo $entries[$i]["title"][0] . "<br />"; 
		echo '</td>';
		echo '<td> ';
		echo $entries[$i]["streetaddress"][0]."<br />";
		echo '</td>';
		echo '<td> ';
		echo '<a class="mail" href="mailto:'.$entries[$i]["mail"][0].'">'.$entries[$i]["mail"][0]."</a><br />";
		echo '</td>';
		echo '<td> ';
		echo $entries[$i]["telephonenumber"][0]."<br />";
		echo '</td>';
		echo '<td> ';
		echo $entries[$i]["homedirectory"][0]."<br />";
		echo '</td>';
		echo '<td> ';
		$whenCreated = ldap_get_values($ad, $entryid, "whenCreated");
		echo ldapTimeToUnixTime($whenCreated[0])."<br />";
		echo '</td>';
		echo '<td> ';
		$lastLogon = ldap_get_values($ad, $entryid, "lastLogon");
		echo convert_AD_date($lastLogon[0])."<br />";
		echo '</td>';
		echo '<td> ';
		$logonCount = ldap_get_values($ad, $entryid, "logonCount");
		echo $logonCount[0]."<br />";
		echo '</td>';
		echo '<td>';
		$memberOf = ldap_get_values($ad, $entryid, "memberOf");
		foreach($memberOf as $group) {
			$temp_memberOf = substr($group, 0, stripos($group, ","));
			$temp_memberOf = strtoupper(str_replace("CN=", "", $temp_memberOf));
			if ($temp_memberOf !== '') echo $temp_memberOf . '<br \>';
		}
		echo '</td>';
    }
	echo '</tr><tr>
	<div id="pager" class="footer">  
		<form> 
			<div class="user_count">Всего пользователей: <b>'.$entries["count"].'</b></div>
			<a href="#" class="navbtn" title="В начало"><img src="images/first.png" class="first"/></a>
			<a href="#" class="navbtn" title="Назад"><img src="images/prev.png" class="prev"/></a>
			<input type="text" class="pagedisplay"/> 
			<a href="#" class="navbtn" title="Вперед"><img src="images/next.png" class="next"/></a>
			<a href="#" class="navbtn" title="В конец"><img src="images/last.png" class="last"/></a>
			<label class="countpages"> Выводить по: </label>
			<select class="pagesize"> 
				<option value="10">10</option>
				<option selected="selected" value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
				<option value="50">50</option>
				<option value="80">80</option>
				<option value="100">100</option>
			</select> 
		</form> 
	</div></tr></tbody></table>
	</div>';
	}
	