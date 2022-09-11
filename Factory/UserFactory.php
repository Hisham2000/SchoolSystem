<?php

namespace UserFactory;

use App\Model\Admin;
use App\Model\Student;


class UserFactory
{

	public static function getUser($user)
	{
		if(!strcmp("Student",$user))
		{
			include "../Model/Student.php";
			return new Student();
		} 
		elseif(!strcmp("Admin",$user))
		{
			include "../Model/Admin.php";
			return new Admin();
		} 
	}

}