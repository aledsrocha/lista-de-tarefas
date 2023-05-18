<?php 
	require_once 'config.php';
	require_once 'models/Lista.php';
	require_once 'dao/ListaDaoMysql.php';

	$tarefas = filter_input(INPUT_POST, 'tarefas');
	$name = filter_input(INPUT_POST, 'name');
	$selecionar = filter_input(INPUT_POST, 'selecionar');

	if ($tarefas && $name && $selecionar) {
		
		$listaDao = new ListaDaoMysql($pdo);
		$lista = new Lista();

		$lista->tarefas = $tarefas;
		$lista->name = $name;
		$lista->selecionar = $selecionar;

		$listaDao->insert($lista);
	}

	header("Location: " . $base);
			exit;

 ?>