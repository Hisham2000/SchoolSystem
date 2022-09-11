<?php

namespace App\Controller;

use PDO;
use UserFactory\UserFactory;

include "../Factory/UserFactory.php";





class AdminController{

    private $Admin;

    public function __construct()
    {
        $this->Admin = UserFactory::getUser("Admin");
    }

    public function index(){
        $admin = $this->Admin->getAll();
        var_dump($admin);
    }

    public function validate($admin){
        
    }
}