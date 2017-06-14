<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getUser($username)
    {
        $row = $this->fetchRow('username = ' . $username);

        if (!$row) {

            throw new Exception("Could not find row $username");
        }
        return $row->toArray();
    }

    public function getPaginatedUsers($paged = null){
        $select = $this->select();

        if(null!== $paged){
            $adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
            $paginator = new Zend_Paginator($adapter);
            $paginator->setItemCountPerPage(1)
                      ->setCurrentPageNumber((int) $paged);
            return $paginator;    
        }

        
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


    public function updateUser($usernam,$password,$name,$surname,$email){
      $data = array(
          'password' => $password,
          'name' => $name,
          'surname' =>$surname,
          'email' => $email);

        $this->update($data, 'username = '. $usernam);
    }


    public function deleteUser($username)
    {
        $this->delete($username);
    }


    public function getUserByName($usrName)
    {

      $row =$this->fetchRow($this->select()->where('username = ?', $usrName));
      
        return $row;
    }

}
