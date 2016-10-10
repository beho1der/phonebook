<?
function add_header() { 
$str = '
<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Список почтовых адресов сотрудников</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
		<link type="text/css" rel="stylesheet" media="all" href="css/table.css" />
		<link type="text/css" rel="stylesheet" media="all" href="css/work.css" />
		<link type="text/css" rel="stylesheet" media="all" href="css/form.css" />	
		<link type="text/css" rel="stylesheet" media="all" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" media="all" href="css/jquery-ui-1.8.24.custom.css" />	
		
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script src="js/work.js"></script>
		
		<script type="text/javascript" src="js/throbber.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
		<script type="text/javascript"> 
			$(document).ready(function() { 
			 $.tablesorter.defaults.widgets = ["zebra"]; 
			 $.tablesorter.defaults.sortList = [[1,0]]; 
			 $("table").tablesorter(); 
		     $("table").tablesorterPager({container: $("#pager")}); 
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#loader").bind("ajaxSend", function() {
				$(this).show();
			}).bind("ajaxStop", function() {
				$(this).hide();
			}).bind("ajaxError", function() {
				$(this).hide();
			});
			});
		</script>	
	</head>';
	return $str;
}

function ldap_con_sync() {
	$ldaphost = "ldap://server-dc1";
	$pwd_adm = "Yfcnjqrf35";
	
	$ad = ldap_connect($ldaphost);
	//ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7); 
	ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ad, LDAP_OPT_REFERRALS, 0); 
	
	//Bind to the ldap directory
	ldap_bind($ad, 'spec@entuziastov-28a.ru', $pwd_adm )
		or die("Couldn't bind to AD!");
	return $ad;
}


$ad1		   = ldap_con_sync();
$dn   		   = "OU=ОФИСЫ,DC=entuziastov-28a,DC=ru";
$filter_s  	   = "(&(objectclass=user)(objectcategory=Person)(mail=*@*))"; 
$result 	   = ldap_search($ad1, $dn, $filter_s);
$entries 	   = ldap_get_entries($ad1, $result);

$salt		   = '123';
$password 	   = '2715';

//connect_to_irm_db();
//connect_to_rc_db();
echo add_header();
echo '<div id="utbl" style = "padding:10px;">
		<h3>Список почтовых адресов сотрудников</h3>
		<table class="tableusers" id="tableusers" cellspacing="1">
		<thead>
		<tr>
		<th>#</th>
		<th>ФИО пользователя</th>
		<th>Организация</th>
		<th>E-Mail</th>
		</tr></thead>
		<tbody>';
	
for ($i=0; $i < $entries["count"]; $i++) {
	$org = $entries[$i]["company"][0];
	
		echo '<tr>';
		echo "<td class='unlock'>"; 
		echo '<img src="images/ok.png" width="12" height="12" alt="Пользователь активен" title="Пользователь активен">';
		echo "</td>"; 
		echo '<td>';
		echo $entries[$i]["name"][0] ."<br />";
		echo '</td>';
		echo '<td> ';
		echo $org."<br />";
		echo '</td>';
		echo '<td> ';
		echo '<a class="mail" href="mailto:'.$entries[$i]["mail"][0].'">'.$entries[$i]["mail"][0]."</a><br />";
		echo '</td>';
	} 
	
	echo '</tr></tbody></table>
	<div id="pager" class="footer">  
		<form> 
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
	</div></div>';
ldap_close($ad1);