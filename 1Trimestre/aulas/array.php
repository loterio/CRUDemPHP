<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>vetor, uma brincada</title>
	</head>
	<body>
		<form class="" method="post">
			<textarea rows="6" cols="40" name="num"><?php  ?></textarea><br>
			<input type="submit" name="" value="send">
		</form>
		<?php

		define('tam', 3);
		define('min',1);
		define('max',10);

		// for ($i=0; $i < tam; $i++)
		// 	array_push($vet,rand(min,max));

		$vet=isset($_POST['num'])?$_POST['num']:array();
		$valores=explode(";",$vet);
		// var_dump($valores);

		if (count($valores)>0) {
			$json=json_encode($valores);
			$arq=fopen('vetorzin.json','w');
			fwrite($arq, $json);
			fclose($arq);
		}

		echo "Original<br>";
		foreach($valores as $val){
			echo "$val - ";
		}
		echo "<br><br>";

		echo "Ordenado<br>";
		sort($valores);
		foreach($valores as $val){
			echo "$val - ";
		}
		echo "<br><br>";

		echo "Soma<br>";
		$soma=array_sum($valores);
		echo "$soma";
		echo "<br><br>";

		echo "Média<br>";
		$media=$soma/count($valores);
		echo "$media";
		echo "<br><br>";

		// echo "<select class='' name=''>";
			// foreach($vet as $valor)
			// 	echo "<option value='$valor'>$valor</option><br>";
		// echo "</select>";
		?>
	</body>
</html>
