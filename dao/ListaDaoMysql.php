<?php 

	require_once 'models/Lista.php';
	


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

		



	}//class
 ?>