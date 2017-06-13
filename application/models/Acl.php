<?php 
class Application_Model_Acl extends Zend_Acl{
	public function __construct()
	{
		// ACL for public role

		$this->addRole(new Zend_Acl_Role('unregistered'))
			 ->add(new Zend_Acl_Resource('public'))
			 ->add(new Zend_Acl_Resource('error'))
			 ->add(new Zend_Acl_Resource('index'))
			 ->allow('unregistered', array('public','error'));
			 
		// ACL for user
		$this->addRole(new Zend_Acl_Role('user'), 'unregistered')
			 ->add(new Zend_Acl_Resource('user'))
			 ->allow('user','user');


		$this->addRole(new Zend_Acl_Role('staff'),'user')
			 ->add(new Zend_Acl_Resource('staff'))
			 ->allow('staff','staff');			   
		// ACL for administrator
		$this->addRole(new Zend_Acl_Role('admin'), 'staff')
			 ->add(new Zend_Acl_Resource('admin'))
			 ->allow('admin','admin');
	}	
}