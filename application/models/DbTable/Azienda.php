<?php

class Application_Model_DbTable_Azienda extends Zend_Db_Table_Abstract
{

    protected $_name = 'azienda';


    public function getAzienda($Aziendaid)
    {
    $id = (int)$Aziendaid;
    $row = $this->fetchRow('Aziendaid = ' . $Aziendaid);
    if (!$row) {
    throw new Exception("Could not find row $Aziendaid");
    }
    return $row->toArray();
    }


    public function addAzienda($Nome,$Emal,$SitoWeb,$Telefono,$Indirizzo,$Categoria,$Descrizione,$Immagine)
    {
    $data = array(
    'Nome' => $Nome,
    'Emal' => $Emal,
    'SitoWeb' => $SitoWeb,
    'Telefono'=> $Telefono,
    'Indirizzo' => $Indirizzo,
    'Categoria'=> $Categoria,
    'Descrizione'=> $Descrizione,
    'Immagine' =>$Immagine,
    );
    $this->insert($data);
    }


    public function updateAzienda($Aziendaid, $Nome,$Emal,$SitoWeb,$Telefono,$Indirizzo,$Categoria,$Descrizione,$Immagine){
    $data = array(
      'Nome' => $Nome,
      'Emal' => $Emal,
      'SitoWeb' => $SitoWeb,
      'Telefono'=> $Telefono,
      'Indirizzo' => $Indirizzo,
      'Categoria'=> $Categoria,
      'Descrizione'=> $Descrizione,
      'Immagine' =>$Immagine,
      );
    $this->update($data, 'Aziendaid = '. (int)$Aziendaid);
    }


    public function deleteAlbum($Aziendaid)
    {
    $this->delete('Aziendaid =' . (int)$Aziendaid);
    }

}
