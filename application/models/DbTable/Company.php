<?php

class Application_Model_DbTable_Company extends Zend_Db_Table_Abstract
{


      protected $_name = 'company';


      public function getcompany($companyid)
      {
      $id = (int)$companyid;
      $row = $this->fetchRow('companyid = ' . $id);
      if (!$row) {
      throw new Exception("Could not find row $id");
      }
      return $row->toArray();
      }


      public function addCompany($companyid,$name,$email,$website,$phone,$address,$category,$description,$img )
      {
      $data = array(
      'name' => $name,
      'email' => $email,
      'website' => $website,
      'phone'=> $phone,
      'address' => $address,
      'category'=> $category,
      'description'=> $description,
      'img' =>$img,
      );
      $this->insert($data);
      }


      public function updateCompany($companyid,$name,$email,$website,$phone,$address,$category,$description,$img ){
        $data = array(
        'name' => $name,
        'email' => $email,
        'website' => $website,
        'phone'=> $phone,
        'address' => $address,
        'category'=> $category,
        'description'=> $description,
        'img' =>$img,
        );
        $this->insert($data);
        }


      public function deleteCompany($companyid)
      {
      $this->delete('companyid =' . (int)$companyid);
      }

  }
