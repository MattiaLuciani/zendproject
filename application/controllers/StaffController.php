<?php 
class StaffController extends Zend_Controller_Action{
	public function init(){
		$this->_helper->layout->setLayout('main');
	}
	public function indexAction(){
		$this->_helper->redirector('index','public');	
	}
}