<?php

include('database.php');

class m_product_category extends database
{
  
    public function get_category_type()
    {
        $sql = "select * from category_type";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

   
    public function get_category($search, $number_in_on_page, $clear)
    {
        $sql = "select 
                category.*,
                category_type.id as category_type_id,
                category_type.type as category_type_name
                from category
                join category_type on category.id_category_type = category_type.id
                where title_category like '%$search%'
                limit $number_in_on_page
                offset $clear;";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    
    public function get_count_search($search)
    {
        $sql = "select count(*) as 'count' from category where category.title_category like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord();
    }


    public function get_category_by_id($id)
    {
        $sql = "select * from category where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function add_product_category($title_category, $description, $id_category_type)
    {
        $sql = "insert into category(title_category, description, id_category_type)
                values(?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($title_category, $description, $id_category_type));
    }

  
    public function update_product_category($id, $title_category, $description, $id_category_type)
    {
        $sql = "update category 
                set 
                title_category = ?, 
                description = ?, 
                id_category_type = ? 
                where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($title_category, $description, $id_category_type, $id));
    }

    public function delete_product_category($id)
    {
        $sql = "delete from category where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}