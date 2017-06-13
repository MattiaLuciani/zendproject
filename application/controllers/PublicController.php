<?php

class PublicController extends Zend_Controller_Action {

    protected $_authService;
    protected $_form;
    //protected $_user;
    //protected $_role;
    public function init() {
        $this->_helper->layout->setLayout('main');
        $this->view->searchForm = new Application_Form_Search();
        $this->_authService = new Application_Service_Auth();
        $this->view->role = $this->getUserRole();

        //$adapter = $this->_authService->getAuthAdapter(array("username" => "admin0","password" =>"admin0"));
        //$this->_authService->authenticate($adapter);
        //Zend_Debug::dump($this->getUserRole(),"PublicController [userRole] : ");
        $this->view->loginForm = $this->getLoginForm();//??
        //$_user = Zend_Auth::getInstance()->getIdentity();
        //Zend_Layout::getMvcInstance()->assign("user",$_user['role']);
       // Zend_Debug::dump($_user);
    }
    public function getUserRole(){
        if(!$this->_authService->getIdentity()){
            return 'unregistered';
        }
        else{
            return $this->_authService->getIdentity()->role;
        }
    }
    public function indexAction() {
        $promotion = new Application_Model_DbTable_Promotion();
        $this->view->promotion = $promotion->fetchAll($promotion->select('*')->limit(8));
        
    }

    public function faqAction() {
        // action body
    }

    public function whoAction() {
        // action body
    }
    public function onscrollAction(){
        //Zend_Debug::dump("aa");
        $offset = $this->getRequest()->getParam('offset');
        $promotion = new Application_Model_DbTable_Promotion();

        $count = $promotion->select('count(*)');
        {
        $promotion = $promotion->fetchAll($promotion->select()->limit(8,$offset));
        
        //$text = "aaaaaa";
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        //$data = array("text"=>$text);
        $json = Zend_Json::encode($promotion);
        echo $json;
        }

    }
    public function viewstaticAction() {
        $page = $this->_getParam('staticPage');
        $this->render($page);
    }
    public function searchAction(){

        $category = $this->getRequest()->getParam('category'); 
        $keyword = $this->getRequest()->getParam('search');

        $promotion = new Application_Model_DbTable_Promotion();

        if($category!="Tutte le categorie"){
            $this->view->promotion = $promotion->fetchAll($promotion->select('*')->where("category= ? ",$category));
            $this->view->companies = $promotion->fetchAll($promotion->select()->distinct()->from(array('c' => 'promotion'),'company')->where("category = ?",$category));
            $this->categories = null;
        }
        else{
            $this->view->promotion = $promotion->fetchAll($promotion->select('*'));
            $this->view->companies = $promotion->fetchAll($promotion->select()->distinct()->from(array('c' => 'promotion'),'company'));
            $this->view->categories = $promotion->fetchAll($promotion->select()->distinct()->from(array('c' => 'promotion'),'category'));
        }
        

    }
    public function promotionAction() {
        $this->view->page_name = "promotion";
        $promotion = new Application_Model_DbTable_Promotion();
        $this->view->promotion = $promotion->fetchAll();
    }

    public function companyAction() {
        $this->view->page_name = "company";
        $company = new Application_Model_DbTable_Company();
        $this->view->company = $company->fetchAll();
    }
    public function loginAction() {
        // action body
        
    }

    /*private function getFilterForm(){
        
    }*/
    public function authenticateAction() {

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->_helper->redirector('login');
        }
        $form = $this->_form;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('login');
        }

        if (false === $this->_authService->authenticate($form->getValues())) {
            $form->setDescription('Autenticazione falita. Riprova');
            return $this->render('login');
        }
        
            return  $this->_helper->redirector('index',$this->_authService->getIdentity()->role);     
        //Zend_Debug::dump($this->_authService->getIdentity() , "Class Name PublicController role :");
       
    }

    /*public function validateloginAction()
    {
        $this->_helper->getHelper('layout')->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();

        $loginform = new Application_Form_Public_Auth_Login();
        $response = $loginform->processAjax($_POST);
        if ($response !== null) {
        	$this->getResponse()->setHeader('Content-type','application/json')->setBody($response);
        }
    }*/

    private function getLoginForm()
    {
    	$urlHelper = $this->_helper->getHelper('url');
		$this->_form = new Application_Form_Public_Auth_Login();
    	$this->_form->setAction($urlHelper->url(array(
			'controller' => 'public',
			'action' => 'authenticate'),
			'default'
		));

		return $this->_form;
    }

    public function signupAction()
    {

      $form = new Application_Form_Registra();

      $form->submit->setLabel('aggiungi');

      $this->view->form=$form;

      if ($this->getRequest()->isPost()){

        $formData = $this->getRequest()->getPost();

        if ($form->isValid($formData)) {

          $username= $form->getValue('username');
          $password= $form->getValue('password');
          $role="user"; //$form->getValue('level');
          $name=$form->getValue('name');
          $surname=$form->getValue('surname');
          $email=$form->getValue('email');
          $user = new Application_Model_DbTable_User();

            $user->addUser($username,$password,$role,$name,$surname,$email);

            $this->_helper->redirector('index');
          
        } else {
          $form->populate($formData);
            }
        }
    }


}
