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
$.get("./php/asterisk/asterisk_ufa.php");
$.get("./php/asterisk/asterisk_churilovo.php");
$.get("./php/asterisk/asterisk_zavod.php");
$grid.trigger('reloadGrid');
 }
});
</script>
    <p style="text-align:center; font:12pt/10pt sans-serif;color:#A52A2A;margin-top:10px;margin-bottom:10px"> Внешние телефоны организаций</p>
<br>
<div class="ui-widget-content ui-corner-all" style="margin-top:1px;height:270px";>

<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">СМУ №14</p>
<ul class="list">
   <li>2115824</li><br>
   <li>2115873</li><br>
   <li>2116453</li><br>
   <li>2116455</li><br>
   <li>2115874</li>
  </ul>
  </div>
</div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Сити-недвижимость</p>
<ul class="list">
   <li>2115823</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">СпецПодрядСтрой</p>
<ul class="list">
   <li>2116452</li><br>
   <li>2113562</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Павелецкая 36а</p>
<ul class="list">
   <li>2116761</li><br>
   <li>2116762</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon"  >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Экономик-Групп</p>
<ul class="list">
   <li>2115876</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Инструмент-Груп</p>
<ul class="list">
   <li>2113528</li>
  </ul>
<p style="color:#A52A2A">УК ДомСтройСервис</p>
<ul class="list">
<li>2777611</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Металлсервис — Центр</p>
<ul class="list">
   <li>2113503</li><br>
   <li>2113563</li>
  </ul>
<p style="color:#A52A2A">Уфа</p>
<ul class="list">
   <li>(347)2935064</li>
  </ul>
<p style="color:#A52A2A">Екатеринбург</p>
<ul class="list">
   <li>(343)2366421</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">Речелстрой</p>
<ul class="list">
   <li>2116455</li>
  </ul>
  </div>
 </div>
<div class="ui-widget fon" >
  <div class="ui-corner-all ui-state-default " style="padding-left:5px;padding-right:5px;" >
    <p style="color:#A52A2A">ЧЭЗ\ЧЗСМ</p>
<ul class="list">
   <li>2642324</li><br>
   <li>2642322</li><br>
   <li>2642321</li><br>
   <li>2606535</li>
  </ul>
<p style="color:#A52A2A">Москва</p>
<ul class="list">
<li>(495)3634562</li>
  </ul>
  </div>
 </div>
</div>
