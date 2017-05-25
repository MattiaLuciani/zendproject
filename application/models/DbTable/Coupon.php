<?php

class Application_Model_DbTable_Coupon extends Zend_Db_Table_Abstract
{

    protected $_name = 'coupon';

        public function getCoupon($id)
        {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray();
        }


        public function addCoupon($Nome,$Azienda,$DataInizio,$DataFine,$Quantità,$Tipologia,$Sconto,$PrezzoIniziale,$PrezzoFinale)
        {
        $data = array(
        'Nome' => $Nome,
        'Azienda' => $Azienda,
        'DataInizio'=> $DataInizio,
        'DataFine' => $DataFine,
        'Quantità' =>$Quantità,
        'Tipologia' => $Tipologia,
        'Sconto' => $Sconto,
        'PrezzoIniziale'=> $PrezzoIniziale,
        'PrezzoFinale' => $PrezzoFinale,
        );
        $this->insert($data);
        }


        public function updateCoupon($Nome,$Azienda,$DataInizio,$DataFine,$Quantità,$Tipologia,$Sconto,$PrezzoIniziale,$PrezzoFinale){
        $data = array(
          'Nome' => $Nome,
          'Azienda' => $Azienda,
          'DataInizio'=> $DataInizio,
          'DataFine' => $DataFine,
          'Quantità' =>$Quantità,
          'Tipologia' => $Tipologia,
          'Sconto' => $Sconto,
          'PrezzoIniziale'=> $PrezzoIniziale,
          'PrezzoFinale' => $PrezzoFinale,
          );
        $this->update($data, 'id = '. (int)$id);
        }


        public function deleteCoupon($id)
        {
        $this->delete('id =' . (int)$id);
        }


}
