<?php 

namespace App\Model\ConnectToDB;

use PDO;

class ConnectToDB{
    static private $_instance = NULL;

    private $dbHost = 'localhost';
    private $dbName = 'student';
    private $user = 'root';
    private $password = '';
    private $conn;

    private function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->user, $this->password);
    }
    
    static function getInstance() {
        if (self::$_instance == NULL) {
        self::$_instance = new ConnectToDB();
        }
        return self::$_instance;
    }


    public function getConnection(){
        return $this->conn;
    }
}