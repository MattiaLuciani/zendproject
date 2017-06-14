<?php

class Application_Model_DbTable_Category extends Zend_Db_Table_Abstract
{

    protected $_name = 'category';

    public function getCategory($id)
    {

      $row =$this->fetchRow($this->select()->where('catId = ?', $id));
      
        return $row;
    }
    public function getAllCategories(){
    	return $row = $this->fetchAll($this->select());
    }
    public function deleteCategory($id)
    {
        $this->delete($id);
    }

    public function addCategory($id,$name)
    {
        $data = array(
            'catId' => $id,
            'name' => $name,
            );

        $this->insert($data);
    }
    public function updateCategory($id,$name)
    {
        $data = array(
            'name' => $name
            );

    	$this->update($data, 'id = '. $id);
    }
}
