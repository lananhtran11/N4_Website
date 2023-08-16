<?php 
require_once ("database.php");
class m_category extends database{
   public function getCategoryType() {
      $sql = "select * FROM category_type"; 
      $this ->setQuery($sql);
      
      return $this -> loadAllRows();
   }
   public function getCategory(){  
      $sql = "select * FROM category"; 
      $this ->setQuery($sql);
     
      return $this -> loadAllRows();
   }
}