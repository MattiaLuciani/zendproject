<?php

class Application_Service_Auth
{
    protected $_userModel;
    protected $_auth;

    public function __construct()
    {
       //Zend_Debug::dump("__construct", "Application_Service_Auth");
       $this->_userModel = new Application_Model_DbTable_User;

    }

    public function authenticate($credentials)
    {
        
        $adapter = $this->getAuthAdapter($credentials);
        $auth    = $this->getAuth();
        $result  = $auth->authenticate($adapter);
        //$username = $credentials['username'];
        Zend_Debug::dump($auth->authenticate($adapter), "result");
        if (!$result->isValid()) {
            return false;
        }
        $user = $this->_userModel->getUserByName($credentials["username"]);
        
        $auth->getStorage()->write($user);  
        return true;
    }

    public function getAuth()
    {
        if (null === $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;
    }

    public function getIdentity()
    {
        $auth = $this->getAuth();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        }
        return false;
    }

    public function clear()
    {
        $this->getAuth()->clearIdentity();
    }

  public function getAuthAdapter($values)
    {
        Zend_Debug::dump($values,"getAuthAdapter");
		$authAdapter = new Zend_Auth_Adapter_DbTable(
			Zend_Db_Table_Abstract::getDefaultAdapter(),
			'user',
			'username',
			'password',
            'role'
		);
		$authAdapter->setIdentity($values["username"]);
		$authAdapter->setCredential($values["password"]);
        return $authAdapter;
    }
}
