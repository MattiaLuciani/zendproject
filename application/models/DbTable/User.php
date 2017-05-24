<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getUser($username)
    {
    $id = $username;
    $row = $this->fetchRow('username = ' . $id);
    if (!$row) {
    throw new Exception("Could not find row $id");
    }
    return $row->toArray();
    }


    public function addUser($username,$password,$level,$name,$surname,$email )
    {
    $data = array(
    'username' => $username,
    'password' => $password,
    'level'=> $level,
    'name' => $name,
    'surname' =>$surname,
    'email' => $email,);
    $this->insert($data);
    }


    public function updateUser($username,$password,$level,$name,$surname,$email){
      $data = array(
      'username' => $username,
      'password' => $password,
      'level'=> $level,
      'name' => $name,
      'surname' =>$surname,
      'email' => $email,);
      $this->insert($data);
      );
    $this->update($data);
    }


    public function deleteUser($username)
    {
    $this->delete($username);
    }

}
