<?php
session_start();

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	// Cria um novo usuário no array de usuários
	$usuario = array(
		'nome' => $nome,
		'email' => $email,
		'senha' => $senha
	);

	if(!isset($_SESSION['usuarios'])){
		$_SESSION['usuarios'] = array();
	}

	$_SESSION['usuarios'][] = $usuario;

	echo "<br>"."Cadastro realizado com sucesso!";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>
	<h1>Cadastro</h1>
	<form action="index.php" method="post">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome"><br>

		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email"><br>

		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha"><br>

		<input type="submit" value="Cadastrar">
		<button>
		<a href="login.php">Entrar</a>
		</button>
	</form>
</body>
</html>
