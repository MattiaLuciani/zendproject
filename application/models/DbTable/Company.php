<?php

class Application_Model_DbTable_Company extends Zend_Db_Table_Abstract
{


      protected $_name = 'company';


      public function getCompany($companyid)
      {
        $id = (int)$companyid;

        $row = $this->fetchRow('companyid = ' . $id);

        if (!$row) {

            throw new Exception("Could not find row $id");

        }
        return $row;
      }


      public function addCompany($name,$email,$website,$phone,$address,$category,$description,$img )
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


      public function getPaginatedCompanies($paged = null){
        $select = $this->select();

        if(null!== $paged){
            $adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
            $paginator = new Zend_Paginator($adapter);
            $paginator->setItemCountPerPage(8)
                      ->setCurrentPageNumber((int) $paged);
            return $paginator;    
        }
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
          'img' => $img,
        );
        $this->update($data,"companyid = " . $companyid);
        }


      public function deleteCompany($companyid)
      {
      $this->delete('companyid =' . (int)$companyid);
      }

  }
