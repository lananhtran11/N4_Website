<?php

    require_once ("database.php");
    class m_product extends database{
        public function getProduct(){
            $sql = "select * FROM product where id_category is not null"; 
            $this ->setQuery($sql);
          
            return $this -> loadAllRows();
        }
        public function getProductById($id){
            $sql = "select * FROM product where id = ? and id_category is not null"; 
            $this ->setQuery($sql);
            return $this -> loadRow(array($id));
        }
        public function getProductBySearch($search,$number_in_on_page, $clear, $order_by, $action){
            $sql = "select * FROM product where name like '%$search%' and id_category is not null $order_by $action limit $number_in_on_page
            offset $clear;"; 
            $this ->setQuery($sql);
            
            return $this -> loadAllRows();
        } 
        public function getfeaturedProducts(){
            $sql = "select * from product where view_number >= 10 and id_category is not null limit 0, 8";
            $this->setQuery($sql);
            return $this->loadAllRows();
        } 
        public function getNewProduct() {
            $sql = "SELECT * FROM `product` where id_category is not null ORDER BY id DESC LIMIT 0, 4;";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function getProductByCateory($id_category, $search, $number_in_on_page, $clear, $order_by, $action) {
            $string = 'id_category is not null';
            if($id_category != "") {
                $string = 'id_category  = '.$id_category;
            }
            $sql = "SELECT * FROM `product` where $string And name like '%$search%' $order_by $action limit $number_in_on_page
            offset $clear;";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function get_count_search($search) {
            $sql = "select count(*) from product where name like '%$search%' and id_category is not null";
            $this -> setQuery($sql);
            return $this->loadRecord();
        }
    }