<?php 
class Zend_View_Helper_TableRowGenerator extends Zend_View_Helper_HtmlElement{
	public function tableRowGenerator($row){
		if($row instanceof Zend_Db_Table_Row){
			$string ="";
			$array = $row->toArray();
			foreach ($row as $key => $value) {
				$temp = "<td class = 'text-left'>" . $value . "</td>";
				$string = $string . $temp;		
			}
			
		return $string;
	}
}
}