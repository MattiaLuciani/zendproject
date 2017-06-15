<?php 

class Application_Form_Staff_Promotion extends Zend_Form{
	public function init(){

		$this->setMethod('post');
	    $this->setName('editcompany');
	    $this->setAttrib('enctype', 'multipart/form-data');
	    $category_model = new Application_Model_DbTable_Category;
	    $categories = $category_model->getAllCategories()->toArray();

	    $category = array();

	    foreach ($categories as $item) {
	    	$category[$item['name']] = $item['name'];
	    	
	    }

	    $this->addElement('text', 'company', array(
	    'label' => 'Azienda',
	    'filters' => array('StringTrim'),
	    'required' => true,
	    'validators' => array(array('StringLength',true, array(1,25)))
		));

		$this->addElement('text' , 'address', array(
			'label' => 'indirizzo',
			'filters' => array('StripTags','StringTrim'),
			'required' => false 
		));
		$this->addElement('select', 'category', array(
            'label' => 'Categoria',
            'required' => true,
        	'multiOptions' => $category
        ));
        $this->addElement('text' , 'description', array(
			'label' => 'descrizione',
			'filters' => array('StripTags','StringTrim'),
			'required' => false 
		));

		$this->addElement('submit' , 'submit', array(
			'label' => 'inviare' 
		));
	}
}