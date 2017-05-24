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

    public function aziendeAction()
    {
        $this->view->name="aziende";
    /*        $aziende = new Application_Model_DbTable_Azienda();
$this->view->aziende = $aziende->fetchAll();*/
    }

    public function couponAction()
    {
        $this->view->name="coupon";
			/*$coupon = new Application_Model_DbTable_Coupon();
$this->view->coupon = $coupon->fetchAll();*/
    }


}
