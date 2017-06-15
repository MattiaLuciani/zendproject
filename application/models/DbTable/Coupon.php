<?php

class Application_Model_DbTable_Coupon extends Zend_Db_Table_Abstract
{

    protected $_name = 'coupon';

        public function getCoupon($couponId)
        {
          $id = (int)$id;
          $row = $this->fetchRow('coupondId = ' . $couponId);
          if (!$row) {
            throw new Exception("Could not find row $id");
          }
          return $row;
        }
        public function getCouponsByPromotion($promoId){
          return  $this->fetchAll($this->select()->where('promoId = ' . $promoId));  
        }
        public function getCouponsByUser($username){
          return  $this->fetchAll($this->select()->where('username = ' . "'" . $username . "'"));  
        }
        public function getAllCoupons(){
          return $this->fetchAll($this->select());
        }
        public function checkCoupon($promoId,$username)
        { 
            $rowset = $this->fetchAll($this->select()->where('promoId = ' . $promoId)->where('username = ' . "'" . $username . "'"));
            if($rowset->count()==0)
              return true;
            else
              return false;
        }

        public function addCoupon($promoId,$username)
        {
            $data = array(
            'promoId' => $promoId,
            'username' => $username,
            );

            $this->insert($data);
          
            
             
        }


        public function updateCoupon($couponId,$promoId,$username){
            $data = array(
              'promoId' => $promoId,
              'username' => $username,
            );
            $this->update($data, 'coupondId = '. (int)$coupondId);
            }


        public function deleteCoupon($id)
        {
        $this->delete('coupondId =' . (int)$coupondId);
        }


}
