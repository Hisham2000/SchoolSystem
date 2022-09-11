<?php

namespace Tests\AdminTest;

include 'Model/Admin.php';
include 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Model\Admin;


class AdminTest extends TestCase{

    private $instance;

    public function testgetAll(){
        $this->instance = new Admin\Admin();
        $admins = $this->instance->getAll();
        $this->assertIsArray($admins);
    }

    public function testfindwithTrueData(){
        $this->instance = new Admin\Admin();
        $admin = $this->instance->find(16);
        $this->assertIsArray($admin);
    }

    public function testfindwithStringVlaue(){
        $this->instance = new Admin\Admin();
        $this->expectException(\PDOException::class);
        $admin = $this->instance->find('ahmed');
    }

    public function testwithNotFoundValue(){
        $this->instance = new Admin\Admin();
        $this->expectException(\InvalidArgumentException::class);
        $admin = $this->instance->find('1');
    }
    
    public function testStoringWithTrueData(){
        $this->instance = new Admin\Admin();
        $user = array(
            "Name"=> 'admin',
            "Email"=> 'admin@gmail.com',
            'Password' => '123456789',
        );
        $this->assertTrue($this->instance->store($user));
    }
    
    public function testStoreWithDataWithUserInDB(){
        $this->instance = new Admin\Admin();
        $user = array(
            "Name"=> 'Farouk',
            "Email"=> 'hishmaanwar72@gmail.com',
            'Password' => '123456789',
        );
        $this->expectException(\PDOException::class);
        $admin = $this->instance->store($user);
    }
}