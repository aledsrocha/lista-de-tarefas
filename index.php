<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';
	require_once 'dao/ListaDaoMysql.php';


	$auth = new Auth($pdo, $base);

	//armazenando a info do user
	$userInfo = $auth->checktoken();
	$lista = [];
	$sql = $pdo->query("SELECT * FROM lista");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	?>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/table.css">
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
		<select name="selecionar">
			<option value="0"></option>
			<option value="pendente">Pendente</option>
			<option value="concluido">Concluído</option>
			
		</select><br><br>

		<input type="submit" name="" value="Cadastrar Tarefas" class="enviar">
	</form>

	<table>
				<thead>
					<tr>
						<th>Tarefas</th>
						<th>Autor</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
				</thead>

				<?php 

		foreach ($lista as $usuarios): ?>
			<tr>
				<td><?=$usuarios['tarefas'];?></td>
				<td><?=$usuarios['name'];?></td>
				<td><?=$usuarios['selecionar'];?></td>
				<td>
				<a href="<?=$base;?>/excluir.php?id=<?=$usuarios['id'];?>"> <img src="<?=$base?>/media/img/excluir.png" width="25">[ excluir ]</a>
				</td>
				</tr>



	<?php endforeach; ?>

			</table>

	
</body>
</html>


