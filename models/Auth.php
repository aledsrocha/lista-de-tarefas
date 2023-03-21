<?php 
	
	require_once 'dao/UserDaoMysql.php';

	class Auth{
		private $pdo;
		private $base;
		private $dao;
		//construct para salvar os dados
		public function __construct(PDO $pdo, $base){
			$this->pdo = $pdo;
			$this->base = $base;
			$this->dao = new UserDaoMysql($this->pdo);

		}

		public function checkToken(){
			//verificando se existe a sessão
			if (!empty($_SESSION['token'])) {
				//armazenando o token
				$token = $_SESSION['token'];

				
				$user = $this->dao->findByToken($token);

				//verificando se existe o usuario se existir retorna ele msm
				if ($user) {
					return $user;
				}


			}//empty

			header("Location: " . $this->base . "/login.php");
			exit;

		}//checktoken
	}
 ?>