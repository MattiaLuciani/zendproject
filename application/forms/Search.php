<?php 

class Application_Form_Search extends Zend_Form{
		
	public function init(){
		$category = new Zend_Form_Element_Select('category');

		$category->addMultiOptions(array(
				 	"1"=> "Auto",
				 	"2"=> "Informatica",
				 	"3"=> "Elettronica",
				 	"4"=> "Abbigliamento",
				 	"5"=> "Alimentari"));

		$input = new Zend_Form_Element_Text('input');
		$input->setAttrib("name","Search");

		$input->clearDecorators();
		$button = new Zend_Form_Element_Button('button');

		$this->addElements(array($category,$input,$button));

		$this->setDecorators(array(array('ViewScript',array('viewScript'=>'searchForm.phtml'))));
	}

}