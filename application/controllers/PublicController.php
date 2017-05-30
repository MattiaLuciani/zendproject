<?php

class PublicController extends Zend_Controller_Action
{

    protected $_authService = null;

    protected $_form = null;

    public function init()
    {
       $this->_helper->layout->setLayout('main');
       $this->_authService = new Application_Service_Auth();
       $this->view->loginForm = $this->getLoginForm();
    }

    public function indexAction()
    {
		// action body
    }

    public function faqAction()
    {
        // action body
    }

    public function whoAction()
    {
        // action body
    }

    public function viewstaticAction()
    {
        $page = $this->_getParam('staticPage');
        $this->render($page);
    }

    public function promotionAction()
    {
        $this->view->page_name = "promotion";
    	$promotion = new Application_Model_DbTable_Promotion();
        $this->view->promotion = $promotion->fetchAll();
    }

    public function companyAction()
    {
        $this->view->page_name = "company";
        $company = new Application_Model_DbTable_Company();
        $this->view->company = $company->fetchAll();
    }

    public function loginAction()
    {
        // action body
    }

    public function authenticateAction()
    {
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
            $form->setDescription('Autenticazione fallita. Riprova');
            return $this->render('login');
        }
        return $this->_helper->redirector('index', $this->_authService->getIdentity()->role);
    }

    public function validateloginAction()
    {
        $this->_helper->getHelper('layout')->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();

        $loginform = new Application_Form_Public_Auth_Login();
        $response = $loginform->processAjax($_POST);
        if ($response !== null) {
        	$this->getResponse()->setHeader('Content-type','application/json')->setBody($response);
        }
    }

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
          $level=1; //$form->getValue('level');
          $name=$form->getValue('name');
          $surname=$form->getValue('surname');
          $email=$form->getValue('email');
          $user = new Application_Model_DbTable_User();

            $user->addUser($username,$password,$level,$name,$surname,$email);

            $this->_helper->redirector('index');
          
        } else {
          $form->populate($formData);
            }
        }
    }


}
