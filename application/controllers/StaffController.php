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
		$model = new Application_Model_DbTable_Promotion;
		$this->view->model = $model->getAllPromotions();
	}
	public function editpromotionAction(){
		$id = $this->getRequest()->getParam('param');
		$model = new Application_Model_DbTable_Promotion;
		$promotion = $model->getPromotion($id);
		//Zend_Debug::dump($model);
		$form = new Application_Form_Staff_Promotion;

		$form->populate($promotion->toArray());
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $company = $form->getValue('company');
          $datebegin = $form->getValue('datebegin');
          $datefine = $form->getValue('datefine');
          $category = $form->getValue('category');
          $description = $form->getValue('description');

          $model->updatePromotion($company,$datebegin,$datefine,$category,$description);

          $this->_helper->redirector('panel');
          
        }
	 }
	}
	public function addpromotionAction(){

	}
	public function deletepromotionAction(){

	}
}