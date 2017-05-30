<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
      $this->_authService = new Application_Service_Auth();
      $this->_helper->layout->setLayout('main');
    }

    public function indexAction()
    {
        // action body
    }

    public function editAction()
    {
      $form = new Application_Form_Registra();
      $form->submit->setLabel('Salva');
      $this->view->form = $form;
      $this->view->userx = $this->_authService->getIdentity()->username;

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
              $user->updateUser($username,$password,$level,$name,$surname,$email);
              $this->_helper->redirector('index');
            } else {
            $form->populate($formData);
            }
      }
      else {
      $userx= $this->_authService->getIdentity()->username;

          $users = new Application_Model_DbTable_User();
          $form->populate($users->getUserByName('mario'));



      }
    }

    public function logoutAction()
    {
      $this->_authService->clear();
  		return $this->_helper->redirector('index','public');
    }


}
