<?php 
class AdminController extends Zend_Controller_Action{
	public function init(){
		$this->_helper->layout->setLayout('main');
		$this->view->searchForm = new Application_Form_Search();
	}
	public function indexAction(){
		$this->_helper->redirector('index','public');
	}
	public function panelAction(){
		$request = $this->getRequest();
		$model;
		//Zend_Debug::dump($this->getRequest()->getParam('param'),"Param");
		if($request = $this->getRequest()->getParam('param') == 'user'){
			$model = new Application_Model_DbTable_User();
			$this->view->type = 'user';
			$this->view->model = $model->fetchAll($model->select('*')->limit(8));

		}
		if($request = $this->getRequest()->getParam('param') == 'company'){
			$model = new Application_Model_DbTable_Company;
			$this->view->type = 'company';
			$this->view->model = $model->fetchAll($model->select('*')->limit(8));
		}
		if($request = $this->getRequest()->getParam('param') == 'category'){
			//$model = new Application_Model_DbTable_();
		}
		if($request = $this->getRequest()->getParam('param') == 'stats'){

		}
	}
}