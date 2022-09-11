<?php

namespace Authentication;

include "../Factory/UserFactory.php";

use Exception;
use UserFactory\UserFactory;

class Auth{
    

    private $user;
    private $name;
    private $id;
    private $email;
    private $password;


    public function __construct($user)
    {
        $this->user = UserFactory::getUser($user);
        echo$user."<br>";
        var_dump($this->user);
    }


    public function Validate($request){
        $user = $this->user->find($request['email']);
        $this->setUserData($user);
        if( $this->email === $request['email'] && $this->password === $request['password'] )
        {
            // echo "session created";
            // $this->createSession($user);
        }
        else throw new Exception("You Entered Wrong Data");
    }

    private function setUserData($user){
        $this->name = $user['name'];
        $this->password = $user['password'];
        $this->email = $user['email'];
        $this->id = $user['id'];
    }

    // private function createSession($user){
    //     foreach($user as $key=>$value){
    //         $_SESSION[$key] = $value;
    //     }
    //     var_dump($_SESSION);
    // }

}