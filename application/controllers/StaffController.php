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
		Zend_Debug::dump($this->getRequest()->getPost());

		$model = new Application_Model_DbTable_Promotion;

		$promotion = $model->getPromotion($id);
		//Zend_Debug::dump($model);
		$form = new Application_Form_Staff_Promotion;

		$form->populate($promotion->toArray());
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $company = $formData['company'];
          $datebegin = $formData['datebegin'];
          $datefine = $formData['datefine'];
          $category = $formData['category'];
          $description = $formData['description'];
          $price = $formData['price'];
          if($datefine == " " || $datebegin == " ")
          	  $model->updatePromotion($id,$company,$promotion->datebegin,$promotion->datefine,$category,$description,$price);
      	  else
          	  $model->updatePromotion($id,$company,$datebegin,$datefine,$category,$description,$price);

          $this->_helper->redirector('panel');
          
        }
	 }
	}
	public function addpromotionAction(){

		$form = new Application_Form_Staff_Promotion;

		
		//Zend_Debug::dump($this->getRequest()->getPost());

		$model = new Application_Model_DbTable_Promotion;

		
		//Zend_Debug::dump($model);
		$form = new Application_Form_Staff_Promotion;

		
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $company = $formData['company'];
          $datebegin = $formData['datebegin'];
          $datefine = $formData['datefine'];
          $category = $formData['category'];
          $description = $formData['description'];
          $price = $formData['price'];
          if($datefine == " " || $datebegin == " ")
          	  $model->addPromotion($company,"00-00-0000","00-00-0000",$category,$description,$price);
      	  else if($price == null){
      	  	  $price = 0;
          	  $model->addPromotion($company,$datebegin,$datefine,$category,$description,$price);
          	}
          $this->_helper->redirector('panel');
          
        }
	 }

	}
	public function deletepromotionAction(){
		$id = $this->getRequest()->getParam('param');
		$model = new Application_Model_DbTable_Promotion;
		$model->deletePromotion($id);

		$this->_helper->redirector('panel');
	}
}