<?php 

class Application_Form_Search extends Zend_Form{
		
	public function init(){

		$category = new Zend_Form_Element_Select('category');
	    $category_model = new Application_Model_DbTable_Category;

	    $categories = $category_model->getAllCatArray();
	    $categories['Tutte le categorie'] = 'Tutte le categorie';

		$category->addMultiOptions($categories);		 	

		$category->setAttrib("name","category");
		$input = new Zend_Form_Element_Text('input');
		$input->setAttrib("name","search");

		$input->clearDecorators();
		$button = new Zend_Form_Element_Button('button');

		$this->addElements(array($category,$input,$button));

		$this->setDecorators(array(array('ViewScript',array('viewScript'=>'public/formscripts/searchForm.phtml'))));

		$this->setAction("/public/search")->setMethod('get');
	}

}