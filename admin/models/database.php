<?php
require_once("config.php");
class database
{
    protected $pdo = NULL;
    protected $sql = '';
    protected $sta = NULL;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PWD);
            $this->pdo->query('set names "utf8"');
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function setQuery($sql)
    {
        $this->sql = $sql;
    }

    public function execute($options = array())
    {
        $this->sta = $this->pdo->prepare($this->sql);
        if ($options) {  
            for ($i = 0; $i < count($options); $i++) {
                $this->sta->bindParam($i + 1, $options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }
    public function loadAllRows($options = array())
    {
        if (!$options) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function loadRow($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }

    
     public function loadRecord($option = array())
     {
         if (!$option) {
             if (!$result = $this->execute())
                 return false;
         } else {
             if (!$result = $this->execute($option))
                 return false;
         }
         return $result->fetch(PDO::FETCH_COLUMN);
     }
 
     public function getLastId()
     {
         return $this->pdo->lastInsertId();
     }
 
     public function disconnect()
     {
         $this->sta = NULL;
         $this->pdo = NULL;
     }
 }
