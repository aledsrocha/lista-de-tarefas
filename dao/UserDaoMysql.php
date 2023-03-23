<?php 

	require_once 'models/User.php';


	class UserDaoMysql implements UserDao {

		private $pdo;

		public function __construct(PDO $driver){
			$this->pdo = $driver;

		}

		private function generateUser($array){
			$u = new User();
			$u->id = $array['id'] ?? 0;
			$u->email = $array['email'] ?? '';
			$u->password = $array['password'] ?? '';
			$u->name = $array['name'] ?? '';
			$u->birthdate = $array['birthdate'] ?? '';
			$u->avatar = $array['avatar'] ?? '';
			$u->token = $array['token'] ?? '';

			return $u;
			
		}

		public function findByToken($token){
			if (!empty($token)) {
				$sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
				$sql->bindValue(':token', $token);
				$sql->execute();

				if ($sql->rowCount() > 0) {
					$data = $sql->fetch(PDO::FETCH_ASSOC);
					$user = $this->generateUser($data);
					return $user;
				}
			}

			return false;
		}


		public function findByEmail($email){
			if (!empty($email)) {
				$sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
				$sql->bindValue(':email', $email);
				$sql->execute();

				if ($sql->rowCount() > 0) {
					$data = $sql->fetch(PDO::FETCH_ASSOC);
					$user = $this->generateUser($data);
					return $user;
				}
			}

			return false;
		}

		public function update(User $u){
			$sql = $this->pdo->prepare("UPDATE users SET 
				email = :email,
				password = :password,
				name = :name,
				birthdate = :birthdate,
				avatar = :avatar,
				token = :token
				WHERE id = :id");


			$sql->bindValue(':email', $u->email);
			$sql->bindValue(':password', $u->password);
			$sql->bindValue(':name', $u->name);
			$sql->bindValue(':birthdate', $u->birthdate);
			$sql->bindValue(':avatar', $u->avatar);
			$sql->bindValue(':token', $u->token);
			$sql->bindValue(':id', $u->id);
			$sql->execute();

			return true;
		}

		public function insert(User $u){
			$sql = $this->pdo->prepare("INSERT INTO users(
				email, name, password, birthdate, token
		) VALUES (:email, :name, :password, :birthdate, :token)");
			$sql->bindValue(':email', $u->email);
			$sql->bindValue(':password', $u->password);
			$sql->bindValue(':name', $u->name);
			$sql->bindValue(':birthdate', $u->birthdate);
			$sql->bindValue(':token', $u->token);
			$sql->execute();
			
			return true;
		}



	}//class

 ?>