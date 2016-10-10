<?php
class phonebook_user extends jqGrid
{
    protected function init()
    {

    $Organization_types = $this->getOrganization_types();
    $Adress_types = $this->getAdress_types();

$this->options = array('autowidth'=> true,'sortname'  => 'name', 'sortorder' => 'asc');


     		$this->table = 'phone';
		$this->nav = array(
				'add'       => false,
				'edit'      => false,
				'del'       => false,
				'excel'     => true,
				'exceltext' => 'Экспорт в Excel',
				'addtext'   => 'Добавить',
				'edittext'  => 'Редактировать',
								); 
        $this->cols = array(
            'id'          => array('label' => 'ID',
                                   'width' => 2,
                                   'align' => 'center',
				   'hidden' => true,
                                   ),
 
            'number'  => array('label' => '№',
                                   'width' => 10,
				   'align' => 'center',
                                   'editable' => true,
				   'search_op' => 'equal',
				   'formatter' => 'integer',
                                   ),
 
            'name'   => array('label' => 'ФИО',
                                   'width' => 50,
				   'align' => 'center',
                                   'editable' => true,
                                   ),
 
            'organization'    => array('label' => 'Организация',
                                   'width' => 30,
                                   'align' => 'center',
                                   'editable' => true,
				   'replace' => $Organization_types,
				   'stype' => 'select',
				   'editoptions' =>  array('value'=> new jqGrid_Data_Value(array("ЧЗСМ" => "ЧЗСМ", "Инструмент-Груп" => "Инструмент-Груп", "Сити-Недвижимость" => "Сити-Недвижимость", "МСЦ" => "МСЦ","СПС" => "СПС", "Речелстрой" => "Речелстрой", "УК ДСС" => "УК ДСС", "Дивизион" => "Дивизион", "ЧЭЗ" => "ЧЭЗ","СМК" => "СМК","Интегро М" => "Интегро М","УПТК" => "УПТК","ИП Емец Д. С" => "ИП Емец Д. С","УСП" => "УСП","СЭУ-9" => "СЭУ-9"))),
				   'edittype'  => 'select',	
				   'searchoptions' => array(
				   'value' => new jqGrid_Data_Value($Organization_types, 'ВСЕ'),
				   ),
                                   'search_op' => 'equal',					
                                   ),
            'adress'    => array('label' => 'Адрес',
                                   'width' => 50,
                                   'align' => 'center',
                                   'editable' => true,
				   'replace' => $Adress_types,
				   'editoptions' =>  array('value'=> new jqGrid_Data_Value(array("Энтузиастов 19" => "Энтузиастов 19" , "Энтузиастов 30" => "Энтузиастов 30", "Энгельса 99" => "Энгельса 99", "Энгельса 95" => "Энгельса 95", "Энгельса 97" => "Энгельса 97", "Ростов" => "Ростов", "Екатеринбург" => "Екатеринбург", "Уфа" => "Уфа", "Павелецкая 36а" => "Павелецкая 36а", "Хлебозаводская 5" => "Хлебозаводская 5","Чурилово" => "Чурилово","Кирова 159" => "Кирова 159","Новосинеглазово, Челябинская, 52" => "Новосинеглазово, Челябинская, 52"))),
				   'edittype'  => 'select',	
				   'stype' => 'select',
				   'searchoptions' => array(
				   'value' => new jqGrid_Data_Value($Adress_types, 'ВСЕ'),
				   ),
                                   'search_op' => 'equal',
                                   ),
	     'gsm'   => array('label' => '№ сотовый',
                                   'width' => 20,
				   'align' => 'center',
                                   'editable' => true,
                                   ),
	    'email'   => array('label' => '@email',
                                   'width' => 20,
				   'align' => 'center',
                                   'editable' => true,
				   'encode' => false
                                   ),
        							   
        );
 $this->render_filter_toolbar = true;
   }
protected function getOrganization_types()
    {
        $result = $this->DB->query("SELECT * FROM phone");

        $rows = array();
        while($r = $this->DB->fetch($result))
        {
            $rows[$r['organization']] = $r['organization'];
        }

        return $rows;
    }
protected function getAdress_types()
    {
        $result = $this->DB->query("SELECT * FROM phone");

        $rows = array();
        while($r = $this->DB->fetch($result))
        {
            $rows[$r['adress']] = $r['adress'];
        }

        return $rows;
    }
protected function parseRow($r) {
if (($r['gsm'] == "0") || ($r['gsm'] == "")) $r['gsm'] = 'Нет';
if (($r['email'] == "0") || ($r['email'] == "")) $r['email'] = 'Нет';
else $r['email'] = '<a href=mailto:'.$r['email'].'>'.$r['email'].'</a>';
return $r;
 }
}

?>
