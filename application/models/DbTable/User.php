<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{
    /*public function __construct(){
        Zend_Debug::dump("_construct" , "Class Name Application_Model_DbTable_User row : ");
    }*/
    protected $_name = 'user';

    public function getUser($username)
    {
    $row = $this->fetchRow('username = ' . $username);
    if (!$row) {
    throw new Exception("Could not find row $username");
    }
    return $row->toArray();
    }


    public function addUser($username,$password,$role,$name,$surname,$email )
    {
        $data = array(
        'username' => $username,
        'password' => $password,
        'role'=> $role,
        'name' => $name,
        'surname' =>$surname,
        'email' => $email);
        $this->insert($data);
    }


    public function updateUser($username,$password,$role,$name,$surname,$email){
      $data = array(
      'password' => $password,
      'role'=> $role,
      'name' => $name,
      'surname' =>$surname,
      'email' => $email);

        $this->update($data, 'username = '. $username);
    }


    public function deleteUser($username)
    {
        $this->delete($username);
    }


    public function getUserByName($usrName)
    {

      $row =$this->fetchRow($this->select()->where('username = ?', $usrName));
      
        return $row/*->toArray()*/;
    }

}
