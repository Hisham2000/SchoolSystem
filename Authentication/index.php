<?php


include "Auth.php";


use Authentication\Auth;


$pageRef = explode("/",$_SERVER['HTTP_REFERER']);

if( strpos(end($pageRef),"LoginAdmin")){
    try{
        $Auth = new Auth("Admin"); 
        $Auth->Validate($_POST);
        header("location: https://localhost/SchoolSystem/Admin/Home.php");
        exit;
    }
    catch(Exception $exception){
        header("location: ".$_SERVER['HTTP_REFERER']."?msg=You Entered Invalid Data");
    }
    
    
}
elseif( strpos(end($pageRef),"LoginStudent")){
    try{
        $Auth = new Auth("Student"); 
        $Auth->Validate($_POST);
        header("location: https://localhost/SchoolSystem/Student/Home.php");
        exit;
    }
    catch(Exception $exception){
        header("location: ".$_SERVER['HTTP_REFERER']."?msg=You Entered Invalid Data");
    }
    
    
}
