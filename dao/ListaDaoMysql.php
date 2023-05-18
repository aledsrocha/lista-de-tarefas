<?php 

	require_once 'models/Lista.php';
	require_once 'dao/UserDaoMysql.php';


	class ListaDaoMysql implements ListaDao{

		private $pdo;

		public function __construct(PDO $driver){
			$this->pdo = $driver;
		}

		public function insert(Lista $l){

			$sql = $this->pdo->prepare("INSERT INTO lista(tarefas, name , selecionar)
				VALUES (:tarefas, :name , :selecionar
				)");

			$sql->bindValue(':tarefas', $l->tarefas);
			$sql->bindValue(':name', $l->name);
			$sql->bindValue(':selecionar', $l->selecionar);
			$sql->execute();
		}

		public function delete($id){
			$sql = $this->pdo->prepare("DELETE FROM lista WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();
		}
	}//class
 ?>