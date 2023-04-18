
<!DOCTYPE html>
<html>
<head>
	<title>Votação</title>
</head>
<body>
	<h2>Qual é a sua opção de voto?</h2>
	<form method="post" action="">
		<input type="radio" name="voto" value="opcao1" required> Opção 1<br>
		<input type="radio" name="voto" value="opcao2"> Opção 2<br>
		<input type="submit" name="votar" value="Votar">
	</form>
</body>
</html>
<?php
		if(isset($_POST['votar'])){
			$voto = $_POST['voto'];

			$arquivo = fopen("votos.txt", "a+");
			fwrite($arquivo, $voto."\n");
			fclose($arquivo);
		}

		$arquivo = fopen("votos.txt", "r");
		$votos = array();
		while(!feof($arquivo)){
			$voto = trim(fgets($arquivo));
			if(!empty($voto)){
				if(isset($votos[$voto])){
					$votos[$voto]++;
				}else{
					$votos[$voto] = 1;
				}
			}
		}
		fclose($arquivo);
		$mais_votado = "";
		$num_votos = 0;
		foreach($votos as $opcao => $qtd_votos){
			if($qtd_votos > $num_votos){
				$mais_votado = $opcao;
				$num_votos = $qtd_votos;
			}
		}

		if(!empty($mais_votado)){
			echo "<h2>Resultado</h2>";
			echo "O mais votado foi: ".$mais_votado;
			echo "<br>";
			echo "Com ".$num_votos." votos";
		}
	?>
