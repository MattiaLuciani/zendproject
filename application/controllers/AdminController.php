<?php 
class AdminController extends Zend_Controller_Action{
	
	public function init(){
		$this->_helper->layout->setLayout('main');
		$this->view->searchForm = new Application_Form_Search();
		$item_offset = 0;
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
			//$this->view->model = $model->getPaginatedUsers(1);
		}
		if($request = $this->getRequest()->getParam('param') == 'company'){
			$model = new Application_Model_DbTable_Company;
			$this->view->type = 'company';
			$this->view->model = $model->fetchAll($model->select('*')->limit(8));

		}
		if($request = $this->getRequest()->getParam('param') == 'category'){
			$model = new Application_Model_DbTable_Category;
			$this->view->type = 'category';
			$this->view->model = $model->getAllCategories();
		}
		if($request = $this->getRequest()->getParam('param') == 'stats'){

		}
	}

	public function edituserAction(){

		$username = $this->getRequest()->getParam('param');
		//Zend_Debug::dump($username);
		$model = new Application_Model_DbTable_User();
		$user = $model->getUserByName($username);
		//Zend_Debug::dump($model);
		$form = new Application_Form_Registra;
		$form->populate($user->toArray());
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $username = $form->getValue('username');
          $password = $form->getValue('password');
          $name = $form->getValue('name');
          $surname = $form->getValue('surname');
          $email = $form->getValue('email');

          //$model = new Application_Model_DbTable_User();
            //$company->updateCompany($id,$name,$email,$website,$phone,$address,$description);
            $model->updateUser($username,$password,$name,$surname,$email);

            //$this->_helper->redirector('panel');
          
        }
	  }
	}

	public function deleteuserAction(){
		$id = $this->getRequest();


	}
	public function addstaffAction(){

		$form = new Application_Form_Registra;
		$model = new Application_Model_DbTable_User();
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

        	$formData = $this->getRequest()->getPost();

	        if ($form->isValid($formData)) {

	          $username= $form->getValue('username');
	          $password= $form->getValue('password');
	          $role="staff"; //$form->getValue('level');
	          $name=$form->getValue('name');
	          $surname=$form->getValue('surname');
	          $email=$form->getValue('email');
	          $user = new Application_Model_DbTable_User();

	            $user->addUser($username,$password,$role,$name,$surname,$email);

	            $this->_helper->redirector('panel');
	          
	        }
	    }
	}
	
	public function editcompanyAction(){

		$id = $this->getRequest()->getParam('param');
		$model = new Application_Model_DbTable_Company;
		
		$model = $model->getCompany($id);
		//Zend_Debug::dump($model->toArray());
		$form = new Application_Form_Admin_Company_Edit;
		//$form->setAction('admin/editcompany');

		$form->populate($model->toArray());

		$this->view->form = $form;

        if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $name = $form->getValue('name');
          $email = $form->getValue('email');
          $website = $form->getValue('website');
          $phone = $form->getValue('phone');
          $address = $form->getValue('address');
          $category = $form->getValue('category');
          $description = $form->getValue('description');
          $company = new Application_Model_DbTable_Company();
          	
            //$company->updateCompany($id,$name,$email,$website,$phone,$address,$description);
            $company->updateCompany($id,$name,$email,$website,$phone,$address,$category,$description,"null");

            $this->_helper->redirector('panel');
          
        } else {
          $form->populate($formData);
            }
        }
    }

	public function deletecompanyAction(){
		$id = $this->getRequest();
	}
	public function addcompanyAction(){

		$form = new Application_Form_Admin_Company_Edit;
		$model = new Application_Model_DbTable_Company;

		$this->view->form = $form;

        if ($this->getRequest()->isPost()){

        	$formData = $this->getRequest()->getPost();

	        if ($form->isValid($formData)) {

	          $name = $form->getValue('name');
	          $email = $form->getValue('email');
	          $website = $form->getValue('website');
	          $phone = $form->getValue('phone');
	          $address = $form->getValue('address');
	          $category = $form->getValue('category');
	          $description = $form->getValue('description');
	          	
	            //$company->updateCompany($id,$name,$email,$website,$phone,$address,$description);
	            $model->addCompany($name,$email,$website,$phone,$address,$category,$description,"null");

	            $this->_helper->redirector('panel');
	          
	        }
	    }

	}
	public function editcategoryAction(){

	}

	public function addcategoryAction(){
		$form = new Zend_Form;
		$form->setMethod('post');

		$form->addElement('text' , 'name', array(
			'label' => 'nome',
			'filters' => array('StripTags','StringTrim'),
			'required' => false 
		));
		$form->addElement('text' , 'id', array(
			'label' => 'identificativo',
			'filters' => array('StripTags'),
			'required' => false 
		));
		$form->addElement('submit' , 'submit', array(
			'label' => 'inviare' 
		));
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){

			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData)) {
				$model = new Application_Model_DbTable_Category;

				$name = $form->getValue('name');
				$id = $form->getValue('id');

				$model->addCategory($id,$name);
				$this->_helper->redirector('panel');
			}
		}


	}
}