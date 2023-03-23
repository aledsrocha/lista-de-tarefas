<?php 


	class User{
		public $id;
		public $email;
		public $password;
		public $name;
		public $birthdate;
		public $avatar;
		public $token;
	}


		interface UserDao{
		public function findByToken($token);
		public function findByEmail($email);
		public function insert(User $u);
	
	}

 ?>