<?php
require "db_detail.php";
class DBconnect 
{
    protected $pdo;
    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host=".DBdetail::$servername.";dbname=".DBdetail::$dbName."",Dbdetail::$dbUsername, Dbdetail::$dbPassword);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
    }
    public function getConnection(){
        return $this->pdo;
    }
    public function closeConnection(){
        $this->pdo=null;
    }

}
// $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false,
// PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC];

?>