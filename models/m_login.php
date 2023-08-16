

<?php

include_once 'database.php';

class m_login extends database
{
    public function read_check_login($email, $password)
    {
        $sql = "select * from customer 
            where email = ? and passWord = ?;";
        $this->setQuery($sql);
        return $this->loadRow(array($email, $password));
    }

  
    public function forget_password($email)
    {
        $sql = "select * from customer where email = ? and role = 3";
        $this->setQuery($sql);
        return $this->loadRow(array($email));
    }


    public function update_password($email, $password)
    {
        $sql = "update customer 
                set passWord = ? 
                where email = ? and role = 3";
        $this->setQuery($sql);
        return $this->execute(array($password, $email));
    }
}