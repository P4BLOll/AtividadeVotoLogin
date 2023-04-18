<?php
session_start();

if(isset($_POST['email']) && isset($_POST['senha'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if(isset($_SESSION['usuarios'])){
		foreach($_SESSION['usuarios'] as $usuario){
			if($usuario['email'] == $email && password_verify($senha, $usuario['senha'])){
				
				echo "<br>"."Login realizado com sucesso! Bem-vindo";
				exit();
			}
		}
	}

	echo "<br>"."E-mail ou senha incorretos.";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="post">
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email"><br>

		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha"><br>

		<input type="submit" value="Entrar">
	</form>
</body>
</html>



