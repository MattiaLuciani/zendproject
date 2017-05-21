<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

  protected $_view;
protected function _initViewSettings()
    {
        $this->bootstrap('view');
        $this->_view = $this->getResource('view'); //assegna ad una vaiabile protetta l'oggetto vista appena creato per poterlo manipolare
        $this->_view->headMeta()->setCharset('UTF-8');
        $this->_view->headMeta()->appendHttpEquiv('Content-Language', 'it-IT');
	       $this->_view->headLink();

    }



}
