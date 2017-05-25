<?php

class Application_Model_DbTable_Promotion extends Zend_Db_Table_Abstract
{

    protected $_name = 'promotion';


        public function getPromotion($promoid)
        {
        $promoid = (int)$promoid;
        $row = $this->fetchRow('promoid = ' . $promoid);
        if (!$row) {
        throw new Exception("Could not find row $promoid");
        }
        return $row->toArray();
        }


        public function addPromo($company,$datebegin,$datefine,$category,$description,$price)
        {
        $data = array(
        'company' => $company,
        'datebegin' => $datebegin,
        'datefine'=> $datefine,
        'category' => $category,
        'description' =>$description,
        'price' => $price,
        );
        $this->insert($data);
        }


        public function updatePromo($company,$datebegin,$datefine,$category,$description,$price)
         {
        $data = array(
        'company' => $company,
        'datebegin' => $datebegin,
        'datefine'=> $datefine,
        'category' => $category,
        'description' =>$description,
        'price' => $price,
        );
        $this->update($data, 'id = '. (int)$promoid);
        }


        public function deletePromo($promoid)
        {
        $this->delete('id =' . (int)$promoid);
        }
}



