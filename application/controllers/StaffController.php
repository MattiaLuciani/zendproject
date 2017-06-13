<?php 
class StaffController extends Zend_Controller_Action{
	public function init(){
		$this->_helper->layout->setLayout('main');
		$this->view->searchForm = new Application_Form_Search();
	}
	public function indexAction(){
		$this->_helper->redirector('index','public');	
	}
	public function panelAction(){
		
	}
}