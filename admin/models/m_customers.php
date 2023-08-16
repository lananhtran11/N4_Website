<?php

include('database.php');

class m_customer extends database
{
 
    public function read_customer($search)
    {
        $sql = "select customer.*, customer.id as 'id_customer' from customer 
                where (role = 3 and name_customer like '%$search%') or (role = 3)";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function get_count_search($search)
    {
        $sql = "select count(*) as 'count' from customer where customer.name_customer like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
     
 
     public function read_one_customer()
     {
         if (isset($_GET['id'])) {
             $id = $_GET['id'];
         }
         $sql = "select * from customer where id = '$id'";
         $this->setQuery($sql);
         return $this->loadRow();
     }
     public function getCustomerById(){
         $sql = "select * FROM customer where id = 1"; 
         $this ->setQuery($sql);

        return $this->loadRow();
    }
   
    public function create_customer($name_customer, $email, $passWord, $picture_name, $role, $address, $phone_number)
    {
        $sql = "insert into customer(name_customer, email, passWord, picture, role, address, phone_number) 
        values(?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($name_customer, $email, $passWord, $picture_name, $role, $address, $phone_number));
    }

   
    public function edit_customer($id, $name_customer, $email, $passWord, $new_picture, $role, $address, $phone_number)
    {
        $sql = "update customer 
        set 
        name_customer = ?,
        email = ?,
        passWord = ?,
        picture = ?,
        role = ?, 
        address = ?, 
        phone_number = ? 
        where 
        id = ? ";
        $this->setQuery($sql);
        return $this->execute(array($name_customer, $email, $passWord, $new_picture, $role, $address, $phone_number, $id));
    }

    
    public function delete_customer($id)
    {
        $sql = "delete from customer where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
    public function save_change_info($name, $email, $phone_number,$address, $id)
    {
        $sql = "update customer set name_customer=?, email=?, phone_number=?, address=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name, $email, $phone_number, $address, $id));
    }
    public function save_change_pass($new_pass, $id)
    {
        $sql = "update customer set passWord=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($new_pass, $id));
    }
}
