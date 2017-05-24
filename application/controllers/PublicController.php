<?php

class PublicController extends Zend_Controller_Action
{

    public function init()
    {
       $this->_helper->layout->setLayout('main');
       //$this->_logger = Zend_Registry::get('log');
	   /* Initialize action controller here */
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

    public function couponAction()
    {
			$coupon = new Application_Model_DbTable_Coupon();
$this->view->coupon = $coupon->fetchAll();
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

    public function companyAction()
    {
      $company = new Application_Model_DbTable_Company();
$this->view->company = $company->fetchAll();
    }

    public function registraAction()
    {
        // action body
    }


}
