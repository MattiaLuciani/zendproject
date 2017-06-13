<?php 
class Zend_View_Helper_TableHeaderGenerator extends Zend_View_Helper_HtmlElement{
	public function tableHeaderGenerator($row){
		if($row instanceof Zend_Db_Table_Row){
			$string ="";

			$keys = array_keys($row->toArray());

			foreach ($keys as $key) {
				$temp = "<th class = 'text-left'>" . $key . "</th>";
				$string = $string . $temp;		
			}
			
		return $string;
	}
}
}