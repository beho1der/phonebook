<script>
<?= $rendered_grid ?>
$(document).ready( function(){
$('.ui-state-default').hover(function() {
	$(this).toggleClass('backlight');
	}, function() {
	$(this).toggleClass('backlight');
	});
// проверка разрешения и смена растояния

$(function(){
if(screen.width<1281) {
      $('.ui-widget').removeClass('fon');  
      $('.ui-widget').addClass('resize');  
  }
 });
});
/*
// синхронизация почты и asterisk
$grid.jqGrid("navButtonAdd", pager, 
{
    caption : "Синхронизация", 
    title   : "Синхронизация", 
    icon    : "ui-icon-flag",
    onClickButton: function()
    {
$.get("./php/gmail/gmail.php");
$.get("./php/iredmail/iredmail.php");
//$.get("./php/asterisk/asterisk_ufa.php");
//$.get("./php/asterisk/asterisk_churilovo.php");
//$.get("./php/asterisk/asterisk_zavod.php");
$grid.trigger('reloadGrid');
 }
});
*/
</script>
	<script>
    $(function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
    </script>
    <style>
    .ui-tabs-vertical { width: 500px; }
    .ui-tabs-vertical .ui-tabs-nav {float: left; width: 15em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: left; width:auto;margin-top:-20px;}
	.ui-tabs-vertical .ui-tabs-panel p {color:red;font-size:16px;}
	.ui-state-default .ui-corner-left .ui-tabs-selected .ui-state-active {margin-top:-10px;}
    </style>
    <p style="text-align:left; font:16pt/10pt sans-serif bold;color:#A52A2A;margin-top:20px;margin-bottom:5px"> Внешние телефоны организаций</p>
<br>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Дивизион</a></li>
        <li><a href="#tabs-2">Сити-недвижимость</a></li>
        <li><a href="#tabs-3">СпецПодрядСтрой</a></li>
		<li><a href="#tabs-4">Павелецкая 36а</a></li>
		<li><a href="#tabs-6">Инструмент-Груп</a></li>
		<li><a href="#tabs-7">УК ДомСтройСервис</a></li>
		<li><a href="#tabs-8">Металлсервис — Центр</a></li>
		<li><a href="#tabs-9">Речелстрой</a></li>
		<li><a href="#tabs-10">ЧЭЗ\ЧЗСМ</a></li>
		<li><a href="#tabs-11">Москва</a></li>
    </ul>
    <div id="tabs-1">
        <h2>Дивизион</h2>
        <p>
			211-58-24<br>
			211-58-73<br>
			211-64-53<br>
			211-64-55<br>
			211-58-74
		</p>
    </div>
    <div id="tabs-2">
        <h2>Сити-недвижимость</h2>
        <p>240-10-40</p>
    </div>
    <div id="tabs-3">
        <h2>СпецПодрядСтрой</h2>
        <p>
			211-64-52<br>
			211-35-62
		</p>
    </div>
    <div id="tabs-4">
        <h2>Павелецкая 36а</h2>
        <p>
			211-67-61<br>
			211-67-62
		</p>
    </div>
    <div id="tabs-6">
        <h2>Инструмент-Груп</h2>
        <p>
			211-35-28
		</p>
    </div>
    <div id="tabs-7">
        <h2>УК ДомСтройСервис</h2>
        <p>
			277-76-11
		</p>
    </div>
    <div id="tabs-8">
        <h2>Металлсервис — Центр</h2>
        <p>
			211-35-03<br>
			211-35-63
		</p>
		<h3>Уфа</h3>
        <p>
			(347)-293-50-64
		</p>
		<h3>Екатеринбург</h3>
		<p>
			(343)-236-64-21
		</p>
		
    </div>
    <div id="tabs-9">
        <h2>Речелстрой</h2>
        <p>
			755-57-25
		</p>
    </div>
    <div id="tabs-10">
        <h2>ЧЭЗ\ЧЗСМ</h2>
        <p>
			264-23-24<br>
			264-23-22<br>
			264-23-21<br>
			260-65-35
		</p>
    </div>
    <div id="tabs-11">
        <h2>Москва</h2>
        <p>(495)363-45-62</p>
    </div>	
</div>
