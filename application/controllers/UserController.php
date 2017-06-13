<?php

class UserController extends Zend_Controller_Action
{
    protected $user;
    //protected $searchForm;
    public function init()
    {
      $this->_authService = new Application_Service_Auth();
      $this->_helper->layout->setLayout('main');
      $this->user = $this->_authService->getIdentity();
      $this->view->searchForm = new Application_Form_Search();
      //$this->$user = Zend_Auth::getInstance()->getStorage();
      
      //$user = Zend_Auth::getInstance()->getIdentity();
        //Zend_Layout::getMvcInstance()->assign("user",$user['role']);
    }

    public function indexAction()
    {
        // action body
      $this->_helper->redirector('index','public');
      //Zend_Debug::dump($this->user->username,"indexAction");
    }

    public function editAction()
    {
      Zend_Debug::dump($this->user->role,"user");

      $form = new Application_Form_Registra();
      $form->submit->setLabel('Salva');
      $this->view->form = $form;
      $this->view->myuser = /*$this->_authService->getIdentity()->username*/$this->user;

      if ($this->getRequest()->isPost()){

            $formData = $this->getRequest()->getPost();
            Zend_Debug::dump($formData);
            if ($form->isValid($formData)) {

              $username = $form->getValue('username');
              $password = $form->getValue('password');
              $role = "user";
              $name = $form->getValue('name');
              $surname = $form->getValue('surname');
              $email = $form->getValue('email');
              $user = new Application_Model_DbTable_User();
              $user->updateUser($username,$password,$role,$name,$surname,$email);
              $this->_helper->redirector('index');
            } else {

              $form->populate($formData);

            }
      }
      else {
            $userx= $this->_authService->getIdentity()->username;

            $users = new Application_Model_DbTable_User();
            $form->populate($users->getUserByName('user')->toArray());



      }
    }

    public function logoutAction()
    {
      $this->_authService->clear();
  		return $this->_helper->redirector('index','public');
    }


}
