
// Main menu buttons
$(function() {
	$( ".refresh" ).button({
         icons: {
             primary: "ui-icon-refresh"
         },
	})
	$( ".add_user" ).button({
          icons: {
              primary: "ui-icon-plus"
          },	
	})
	$( ".search_user" ).button({
          icons: {
               primary: "ui-icon-search"
          },
	})
});

function CheckUserData() {
	str = '';
	if (document.getElementById("cn").value.length<=0) str = "Заполните поле <b>ФИО</b><br>";
	if (document.getElementById("name").value.length<=0) str = str + "Заполните поле <b>Имя</b><br>";
	if (document.getElementById("sn").value.length<=0) str = str + "Заполните поле <b>Фамилия</b><br>";
	if (document.getElementById("initials").value.length<=0) str = str + "Заполните поле <b>Инициалы</b><br>";
	if (document.getElementById("post").value.length<=0) str = str + "Заполните поле <b>Должность</b><br>";
	if (document.getElementById("org").value.length<=0) str = str + "Заполните поле <b>Организация</b><br>";
	if (document.getElementById("tel").value.length<=0) str = str + "Заполните поле <b>№ телефона</b><br>";
	if (document.getElementById("mail-address").value.length<=0) str = str + "Заполните поле <b>Эл. почта</b><br>";
	if (document.getElementById("login").value.length<=0) str = str + "Заполните поле <b>Логин</b><br>";
	if (document.getElementById("pwd").value.length<=0) str = str + "Заполните поле <b>Пароль</b><br>";
	if (document.getElementById("path").value.length<=0) str = str + "Заполните поле <b>Путь дом. папки</b><br>";
	if (document.getElementById("loginjabber").value.length<=0) str = str + "Заполните поле <b>Jabber логин</b><br>";
	if (document.getElementById("pwdjabber").value.length<=0) str = str + "Заполните поле <b>Jabber пароль</b>";
	
	return str;
}
 
 function CheckInput(f) {
    if (document.getElementById(f).value.length = 0)
		document.getElementById(f).style.border = '1px solid red';
	else 
		document.getElementById(f).style.border = '1px solid #C4C4C4';
	}

 
 function isEmpty(str) {
  for (var i = 0; i < str.length; i++)
     if (" " != str.charAt(i))
         return false;
     return true;
}
 
 function checkform(f) {
 var errMSG = "";          
 for (var i = 0; i<f.elements.length; i++) 
   if (null!=f.elements[i].getAttribute("required")) 
      // проверяем, заполнен ли он в форме
       if (isEmpty(f.elements[i].value)) { // пустой
           errMSG += "  <b>" + f.elements[i].placeholder  + "</b><br>";
		   f.elements[i].style.border = '1px solid red';
		} else {
		   f.elements[i].style.border = '1px solid #C4C4C4';
		}
       if ("" != errMSG) {
			$(function() {
				jQuery("#user_add_btn").append("<div id=\'dialog-err\' title=\'Заведение нового пользователя\'><p>Не заполнены обязательные поля:<br>" + errMSG + "</p></div>"); 
				$( "#dialog-err" ).dialog({
				modal: true,
				buttons: {
					Ok: function() {
                    $( this ).dialog( "close" );
					}
				}
				});
			});
           return false;
       }
}
	
function AddUserForm() {
var dn_ou;
$("#dn-ou").live('click',function(){
dn_ou = $(this).data("id");
});							
								
{ jQuery(document).ready(function() {
			jQuery("#user_add_btn").live("click",function(){
				if(jQuery("#dialog").length<=0) jQuery("#user_add_btn").append("<div id=\'dialog\' title=\'Заведение нового пользователя\'></div>"); 
				jQuery('#dialog').load('add_user_page.php');
				
				  jQuery('#dialog').dialog({resizable:true,modal:true,width:705,height:810,minWidth:770,minHeight:810,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
				  
					buttons:{
                        'Добавить':function(){
					
						$.ajax({
								
							url:'add_user.php'
							, type:'POST'
							, data: 'cn=' + $("#cn").val() + '&name=' + $("#name").val() + '&sn=' + $("#sn").val() + '&initials=' + $("#initials").val() + '&org=' + $("#org").val() + '&post=' + $("#post").val() + '&location=' + $("#location").val() + '&mail=' + $("#mail-address").val() + '&tel=' + $("#tel").val() + '&login=' + $("#login").val() + '&pwd=' + $("#pwd").val() + '&pathhome=' + $("#path_name").val() + $("#path").val() + '&homedrive=' + $("#diskname").val() + '&ou=' + $("#ou").val() + '&jabber_add=' + $("#jabber").attr('checked') + '&jbr_login=' + $("#loginjabber").val() + '&jbr_pwd=' + $("#pwdjabber").val() + '&jbr_group=' + $("#jabgroup").val() + '&mail_add=' + $("#mail").attr('checked') + '&mail_pwd=' + $("#pwdmail").val() 
							, success: function(res) {
								if (!checkform(adduser)) return false;
							$(function() {
								jQuery("#user_add_btn").append("<div id=\'dialog-err\' title=\'Заведение нового пользователя\'><p><br>" + res + "</p></div>"); 
									$( "#dialog-err" ).dialog({
								modal: true,
								buttons: {
									Ok: function() {
									$( this ).dialog( "close" );
									}
							}
        });
    });
					
							}
						});	
						},
                        'Отмена':function(){ jQuery('#dialog').dialog("destroy")}
					}
				});
			}); 
	  });
	}
}


function Refresh()
{
$.ajax({
        type: "GET",
        url: "us_table.php",
        success: function(data){
			$("#utbl").html(data);
			$.tablesorter.defaults.widgets = ["zebra"]; 
			$.tablesorter.defaults.sortList = [[1,0]]; 
			$("table").tablesorter(); 
		    $("table").tablesorterPager({container: $("#pager")}); 
        }
    });
}

function getCheckedRadioValue() {
var radios = document.getElementsByTagName('input');
var value = '';
	for (var i = 0; i < radios.length; i++) {
		if (radios[i].type === 'radio' && radios[i].checked) {
		value = radios[i].value;       
		}
	}
return value;
}

function Add_ou_user() {
jQuery(document).ready(function() {
		if (jQuery("#dialog-add-ou").length<=0) jQuery("#search_user").append("<div id=\'dialog-add-ou\' title=\'Выбор OU пользователя\'></div>"); 
				jQuery('#dialog-add-ou').load('get_ou_tree.php');
				  jQuery('#dialog-add-ou').dialog({resizable:false,modal:true,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
					buttons:{
                      'Ок':function(){ 
						if (getCheckedRadioValue().length != 0) {
							document.getElementById("ou").value = getCheckedRadioValue();
							jQuery('#dialog-add-ou').dialog("destroy");
						} else {alert('Выберите OU для пользователя!')}
					  },
					  'Отмена':function(){ 
						jQuery('#dialog-add-ou').dialog("destroy");
					  }  
					}
				});
		});
}


function Search_user()
{
jQuery(document).ready(function() {
	search = document.getElementById("search_user").value;
	if (search.length != 0) {
		$.ajax({
			url:'work.php'
			, type:'GET'
			, data: 'search=' + search
			, success: function(res) {
				location.replace("work.php?search=" + search);
			}
		});	
	  }
	else
		if (jQuery("#dialog-search").length<=0) jQuery("#search_user").append("<div id=\'dialog-search\' title=\'Поиск пользователя\'><p>Введите значение для поиска</p></div>"); 
				  jQuery('#dialog-search').dialog({resizable:false,modal:true,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
					buttons:{
                        'Ок':function(){ jQuery('#dialog-search').dialog("destroy")}
					}
				});
   });
}; 

function ChangePwd()
{
$("#user_chng_pwd").live('click',function(){
dn = $(this).data("id");
});
{ jQuery(document).ready(function() {
			jQuery("#user_chng_pwd").live("click",function(){
				if(jQuery("#dialog").length<=0) jQuery("#user_chng_pwd").append("<div id=\'dialog\' title=\'Изменения пароля\'></div>"); 
				jQuery('#dialog').load('change_pwd_page.php');
				  jQuery('#dialog').dialog({resizable:true,modal:true,width:280,height:285,minWidth:280,minHeight:285,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
					buttons:{
                        'Изменить':function(){ 
						new_pwd  = document.getElementById("new_pwd").value;
						conf_pwd = document.getElementById("conf_pwd").value;
						k = new_pwd.length;
						b = conf_pwd.length;
						$.ajax({
							url:'change_pwd.php'
							, type:'POST'
							, data: 'dn=' + dn + '&pwd=' + $("#new_pwd").val()
							, success: function(res) {
							if (new_pwd != conf_pwd || k == 0 || b == 0) {
							if (jQuery("#dialog_alert_pwd").length<=0) jQuery("#user_chng_pwd").append("<div id=\'dialog_alert_pwd\' title=\'Изменение пароля\'><p>Пароли не совпадают или пусты</p></div>"); 
							jQuery('#dialog_alert_pwd').dialog({resizable:false,modal:true,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
							buttons:{
								'Ок':function(){ jQuery('#dialog_alert_pwd').dialog("destroy")} 
								}
							}); 
							}
							else  {
							if (jQuery("#dialog-suc-pwd").length<=0) jQuery("#user_chng_pwd").append("<div id=\'dialog-suc-pwd\' title=\'Изменение пароля\'><p>Пароль успешно изменен</p></div>"); 
							jQuery('#dialog-suc-pwd').dialog({resizable:false,modal:true,position:["center"],hide: {effect: "fade"},show:{effect: "fade"},
							buttons:{
								'Ок':function(){ jQuery('#dialog-suc-pwd').dialog("destroy")}
								}
							});
								jQuery('#dialog').dialog("destroy");
								}
							}
						});	
						},
                        'Отмена':function(){ jQuery('#dialog').dialog("destroy")}
					}
				});
			}); 
	  });
}
}

function GetDataNewUser()
{ jQuery(document).ready(function() {
			jQuery("#cn").live("click",function(){
	  });
	});
}

function CheckAddJabber() {
	if (document.getElementById("jabber").checked) {
		document.getElementById("loginjabber").disabled = false;
		document.getElementById("pwdjabber").disabled = false;
		document.getElementById("jabgroup").disabled = false;
		return false;
	} else {
		document.getElementById("loginjabber").disabled = true;
		document.getElementById("pwdjabber").disabled = true;
		document.getElementById("jabgroup").disabled = true;
		return true; 
	}
}

function CheckAddMail() {
	if (document.getElementById("mail").checked) {
		document.getElementById("pwdmail").disabled = false;
		document.getElementById("mail-address").disabled = false;
		return false;
	} else {
		document.getElementById("pwdmail").disabled = true;
		document.getElementById("mail-address").disabled = true;
		return true; 
	}
}

function CheckAddAd() {
	if (document.getElementById("ad").checked) {
		document.getElementById("cn").disabled = false;
		document.getElementById("name").disabled = false;
		document.getElementById("sn").disabled = false;
		document.getElementById("initials").disabled = false;
		document.getElementById("post").disabled = false;
		document.getElementById("org").disabled = false;
		document.getElementById("tel").disabled = false;
		document.getElementById("location").disabled = false;
		document.getElementById("login").disabled = false;
		document.getElementById("pwd").disabled = false;
		document.getElementById("ou").disabled = false;
		document.getElementById("add_ou_btn").hidden = false;
		document.getElementById("diskname").disabled = false;
		document.getElementById("path_name").disabled = false;
		document.getElementById("path").disabled = false;
		return false;
	} else {
		document.getElementById("cn").disabled = true;
		document.getElementById("name").disabled = true;
		document.getElementById("sn").disabled = true;
		document.getElementById("initials").disabled = true;
		document.getElementById("post").disabled = true;
		document.getElementById("org").disabled = true;
		document.getElementById("tel").disabled = true;
		document.getElementById("location").disabled = true;
		document.getElementById("login").disabled = true;
		document.getElementById("pwd").disabled = true;
		document.getElementById("ou").disabled = true;
		document.getElementById("add_ou_btn").hidden = true;
		document.getElementById("diskname").disabled = true;
		document.getElementById("path_name").disabled = true;
		document.getElementById("path").disabled = true;
		return true; 
	}
}

function translite( str ){
var text=str;
var transl=new Array();
    transl['А']='A';     transl['а']='a';
    transl['Б']='B';     transl['б']='b';
    transl['В']='V';     transl['в']='v';
    transl['Г']='G';     transl['г']='g';
    transl['Д']='D';     transl['д']='d';
    transl['Е']='E';     transl['е']='e';
    transl['Ё']='Y';     transl['ё']='yo';
    transl['Ж']='Z';     transl['ж']='zh';
    transl['З']='Z';     transl['з']='z';
    transl['И']='I';     transl['и']='i';
    transl['Й']='J';     transl['й']='j';
    transl['К']='K';     transl['к']='k';
    transl['Л']='L';     transl['л']='l';
    transl['М']='M';     transl['м']='m';
    transl['Н']='N';     transl['н']='n';
    transl['О']='O';     transl['о']='o';
    transl['П']='P';     transl['п']='p';
    transl['Р']='R';     transl['р']='r';
    transl['С']='S';     transl['с']='s';
    transl['Т']='T';     transl['т']='t';
    transl['У']='U';     transl['у']='u';
    transl['Ф']='F';     transl['ф']='f';
    transl['Х']='X';     transl['х']='h';
    transl['Ц']='C';     transl['ц']='c';
    transl['Ч']='C';     transl['ч']='ch';
    transl['Ш']='S';     transl['ш']='sh';
    transl['Щ']='S';     transl['щ']='shh';
    transl['Ъ']='';      transl['ъ']='';
    transl['Ы']='Y';     transl['ы']='y';
    transl['Ь']='';      transl['ь']='';
    transl['Э']='E';     transl['э']='e';
    transl['Ю']='Y';     transl['ю']='yu';
    transl['Я']='Ya';     transl['я']='ya';

    var result='';
    for(i=0;i<text.length;i++) {
        if(transl[text[i]]!=undefined) { result+=transl[text[i]]; }
        else { result+=text[i]; }
    }
    return result;
}

function ShowPwdUser(){
alert(document.getElementById("pwd").value)
}

function ShowPwdJbr(){
alert(document.getElementById("pwdjabber").value)
}

function ShowPwdMail(){
alert(document.getElementById("pwdmail").value)
}

function ParsUserData()
{
var cn = document.getElementById("cn").value;
temp = cn.split(' ');
document.getElementById("mail-address").value =  translite(temp[0].charAt(0) + temp[1].charAt(0) + temp[2].charAt(0)).toLowerCase();
if (cn.length != 0) {
var temp = new Array();
{ jQuery(document).ready(function() {
	$.ajax({
		url:'get_data_user.php'
		, type:'GET' 
		, data: 'username=' + $("#cn").val() + '&mail=' + $("#mail-address").val()
		, success: function(res) {
		var obj = jQuery.parseJSON(res);

		if (obj.Org != '') document.getElementById("org").value = obj.Org; else document.getElementById("org").value = 'n/a';
		if (obj.Loc != '') document.getElementById("location").value = obj.Loc; else document.getElementById("location").value = 'n/a';
		if (obj.Pwd != '') document.getElementById("pwd").value = obj.Pwd; else document.getElementById("pwd").value = 'n/a';
		if (obj.Pwd != '') document.getElementById("pwdmail").value = obj.Pwd; else document.getElementById("pwdmail").value = 'n/a';
		if (obj.Post != '') document.getElementById("post").value = obj.Post; else document.getElementById("post").value = 'n/a';
		if (obj.Mail != '') document.getElementById("mail-address").value = obj.Mail; else document.getElementById("mail-address").value = 'n/a';
		}
	});
  });
  }
}

temp = cn.split(' ');
if (cn.length>0){
document.getElementById("name").value = temp[1];
document.getElementById("sn").value = temp[0];
document.getElementById("initials").value = temp[1].charAt(0) + temp[2].charAt(0);
document.getElementById("login").value = translite(temp[0]) + translite(temp[1].charAt(0) + temp[2].charAt(0));
document.getElementById("loginjabber").value = (translite(temp[0]) + translite(temp[1].charAt(0) + temp[2].charAt(0))).toLowerCase();
document.getElementById("path").value = (translite(temp[0]) + translite(temp[1].charAt(0) + temp[2].charAt(0))).toLowerCase();
} else {
//alert("Заполните поле ФИО\n\rПример: Иванов Иван Иванович")
}
}
