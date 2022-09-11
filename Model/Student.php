<?php
namespace App\Model;

include 'ConnectToDB.php';
include '../Factory/ShapeFactory.php';

use App\Model\ConnectToDB;
use ArgumentCountError;
use InvalidArgumentException;
use PDO;

use ShapeFactory\ShapeFactory;


class Student extends ShapeFactory{
    
    private $conn;

    public function __construct()
    {
        $instance = ConnectToDB\ConnectToDB::getInstance();
        $this->conn = $instance->getConnection();
    }


    public function getAll(){
        $query = "SELECT * FROM `student`";
        $statement = $this->conn->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $admins=array();
        foreach($result as $arr) 
        {
            array_push($admins, $arr);
        }
        return $admins;
    }


    public function find($search){
        try{
            
        $query = "SELECT * FROM `student` WHERE `email` LIKE '%".$search."%' OR `id` LIKE '%".$search."%';" ;
        $statement = $this->conn->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        array_push($result,array('type'=>'student'));
        return $result;

        if(!empty($result)) return $result;
        else throw new InvalidArgumentException("You Entered Invalid ID");
        }
        catch(ArgumentCountError $exception){
            throw $exception->getMessage();
        }
    }

    public function store($user)
    {
        try{
            $mark = array_fill(0,count($user),'?');
            $query = "INSERT INTO `admin`(".implode(",",array_keys($user)).") VALUES(".implode(',',$mark).")";
            $statement = $this->conn->prepare($query);
            $result = $statement->execute(array_values($user));
            return $result;
        }
        catch(\PDOException $exception){
            throw $exception;
        }
    }
}