<?php 

	class Lista{

		public $id;
		public $tarefas;
		public $name;
		public $selecionar;
	}

	interface ListaDao{
		public function insert(Lista $l);
		public function delete($id);
	}
 ?>