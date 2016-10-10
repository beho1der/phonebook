<title>Phonebook</title>

	<!--jQuery-->
	<script src="http://yandex.st/jquery/1.7.2/jquery.min.js"></script>

	<!--jQuery UI-->
	<script src="http://yandex.st/jquery-ui/1.8.11/jquery-ui.min.js"></script>
	<link href="http://yandex.st/jquery-ui/1.8.11/themes/redmond/jquery.ui.all.min.css" rel="stylesheet" type="text/css" />
	

	
	<link rel="icon" href="misc/favicon.png" type="image/png"> 
	<script>
    $(function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
    </script>
    <style>
    .ui-tabs-vertical { width: auto; }
    .ui-tabs-vertical .ui-tabs-nav {float: left; width: 14em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: left; width: 30em;margin-top:-20px;}
	.ui-tabs-vertical .ui-tabs-panel p {color:red;}
    </style>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">СМУ №14</a></li>
        <li><a href="#tabs-2">Сити-недвижимость</a></li>
        <li><a href="#tabs-3">СпецПодрядСтрой</a></li>
		<li><a href="#tabs-4">Павелецкая 36а</a></li>
		<li><a href="#tabs-5">Экономик-Групп</a></li>
		<li><a href="#tabs-6">Инструмент-Груп</a></li>
		<li><a href="#tabs-7">УК ДомСтройСервис</a></li>
		<li><a href="#tabs-8">Металлсервис — Центр</a></li>
		<li><a href="#tabs-9">Речелстрой</a></li>
		<li><a href="#tabs-10">ЧЭЗ\ЧЗСМ</a></li>
		<li><a href="#tabs-11">Москва</a></li>
    </ul>
    <div id="tabs-1">
        <h2>СМУ №14</h2>
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
        <p>211-58-23</p>
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
    <div id="tabs-5">
        <h2>Экономик-Групп</h2>
        <p>
			211-58-76
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
			211-64-55
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