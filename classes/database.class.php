<?php
class Database {
    
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "joblister";

    private $stmt;
    protected function connect(){
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $e->getMessage();
        }

        
        
        return $pdo;
    }

 
}