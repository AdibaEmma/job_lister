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
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);

        } catch (PDOException $e) {
            echo "Error!" . $e->getMessage();
            die();
        }

        
        
        return $pdo;
    }

 
}