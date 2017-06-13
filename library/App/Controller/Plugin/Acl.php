<?php

class App_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
	protected $_acl;
	protected $_role;
	protected $_auth;

	public function __construct()
	{
		
        $this->_auth = Zend_Auth::getInstance();
        //Zend_Debug::dump($this->_auth->getIdentity(), "Class Name : App_Controller_Plugin_Acl identity : ");
		$this->_role = !$this->_auth->hasIdentity() ? 'unregistered' : $this->_auth->getIdentity()->role;
		//Zend_Debug::dump($this->_role,"Class Name : App_Controller_Plugin_Acl role : ");
    	$this->_acl = new Application_Model_Acl();    	
	}

    public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		if (!$this->_acl->isAllowed($this->_role, $request->getControllerName())) {
			$this->_auth->clearIdentity();
			$this->denyAccess();
		}
	}
	
	public function denyAccess()
	{
   		$this->_request->setModuleName('default')
   					   ->setControllerName('public')
					   ->setActionName('login');
	}
}
