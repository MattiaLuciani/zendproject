<?php
//Da cambiare il nome
class Application_Form_Registra extends Zend_Form
{

    public function init()
    {
      $this->setName('Registra');


      /**A cosa serve?*/
      $role = new Zend_Form_Element_Hidden('role'); 
      //$level->addFilter('Int');

      $username = new Zend_Form_Element_Text('username');

      $username->setLabel('Username')
      ->setRequired(true)
      ->addFilter('StripTags')
      ->addFilter('StringTrim')
      ->addValidator('NotEmpty');

      $name = new Zend_Form_Element_Text('name');

      $name->setLabel('name')
      ->setRequired(true)
      ->addFilter('StripTags')
      ->addFilter('StringTrim')
      ->addValidator('NotEmpty');

      $surname = new Zend_Form_Element_Text('surname');

      $surname->setLabel('surname')
      ->setRequired(true)
      ->addFilter('StripTags')
      ->addFilter('StringTrim')
      ->addValidator('NotEmpty');

      $email = new Zend_Form_Element_Text('email');

      $email->setLabel('email')
      ->setRequired(true)
      ->addFilter('StripTags')
      ->addFilter('StringTrim')
      ->addValidator('NotEmpty');

      $password = new Zend_Form_Element_Text('password');

      $password->setLabel('password')
      ->setRequired(true)
      ->addFilter('StripTags')
      ->addFilter('StringTrim')
      ->addValidator('NotEmpty');


      $submit = new Zend_Form_Element_Submit('submit');

      $submit->setAttrib('username', 'submitbutton');
      
      $this->addElements(array($username, $password,$role,$name, $surname, $email, $submit));
    }


}
