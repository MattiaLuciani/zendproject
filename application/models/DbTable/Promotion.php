<?php

class Application_Model_DbTable_Promotion extends Zend_Db_Table_Abstract
{

    protected $_name = 'promotion';
        
        public function getPromotion($id)
        {
          $id = (int)$id;
          $row = $this->fetchRow('id = ' . $id);
          if (!$row) {
          throw new Exception("Could not find row $id");
          }
          return $row->toArray();
        }
        /*public function getCoupon($category,$name){

        }*/


        public function addPromotion($Nome,$Azienda,$DataInizio,$DataFine,$Quantità,$Tipologia,$Sconto,$PrezzoIniziale,$PrezzoFinale)
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


        public function updatePromotion($Nome,$Azienda,$DataInizio,$DataFine,$Quantità,$Tipologia,$Sconto,$PrezzoIniziale,$PrezzoFinale){
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


        public function deletePromotion($id){

          $this->delete('id =' . (int)$id);

        }


}
