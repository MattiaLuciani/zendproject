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
        $this->delete("catId = " . (int)$id);
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

    	$this->update($data, 'catId = '. (int)$id);
    }
    public function getAllCatArray(){

        $categories = $this->getAllCategories()->toArray();

        $category = array();

        foreach ($categories as $item) {
            $category[$item['name']] = $item['name'];
            
        }
        
        return $category;

    }
}
