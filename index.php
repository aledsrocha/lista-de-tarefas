<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';


	$auth = new Auth($pdo, $base);

	//armazenando a info do user
	$userInfo = $auth->checktoken();





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/style.css">
	<title>LISTA DE TAREFAS</title>
</head>
<body>
	<h1>MINHA LISTA DE TAREFAS</h1><br><br><br>
	<form method="post" action="cadastrar_action.php" class="formulario">
		<label>Tarefa</label>
		<input type="text" name="tarefas" class="barra" placeholder="digite sua tarefa">
		<label>Autor</label>
		<input type="text" name="name" class="barra" placeholder="nome do proprietario">
		<label>status</label>
		<select name="select">
			<option></option>
			<option>Pendente</option>
			<option>Concluído</option>
			
		</select><br><br>

		<input type="submit" name="" value="Cadastrar Tarefas" class="enviar">
	</form>

</body>
</html>


