<?php 
class Zend_View_Helper_TableHeader extends Zend_View_Helper_HtmlElement{
	public function table($header,$row){
		if($row instanceof Zend_Db_Table_Row){
			$string = "<div class='table-title'>
	<h3>Tabella di Utenti</h3>
</div><table class='table-fill'>
	<thead>
	<tr>";
			$keys = array_keys($row->toArray());
			foreach ($keys as $key) {
				$temp = "<th class = 'text-left'>" . $key . "</th>";
				$string = $string . $temp;		
			}
			$string = $string . "</tr></thead><tbody class = 'table-hover'>"
			foreach($row as $key => $value){
				$temp = "<tr>"
			}
			$string = $string . "</tbody></table>"
		}
		return 0;
	}
}