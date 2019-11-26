<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Título</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="post">
	<input type="submit" value="Calcular"><br><br>
</form>

<?php
  #faz o primeiro vetor, o original
  $max=20;
  $n1= array();
  for ($i=0; $i < 6; $i++) {
    $n1[$i]=mt_rand(0,$max);
  }
  #faz o vetor a ser comparado com o original $n2= array(), array();
	$n2= array();
    for ($x=0; $x < 60; $x++) {
      $n2[$x]=mt_rand(0,$max);
    }
  echo "Sorteio ";
  for ($i=0;$i<6;$i++) {
    echo "  /  ".$n1[$i];
  }
  /*
  o erro é que o programa na comparação if está comparando apenas um único valor de n1 com um único valor de n2
  pra funcionar ele teria que comparar todos os valores de n1 com o valor n2[i][x] para ver se há a congruência dos valores
	*/
  echo "<br><br>Cartelas:<br>";
  for($i=0;$i<10;$i++){
    echo ($i+1)."° / ";
    for ($x=0; $x <6 ; $x++) {
				if ($n1[$x]==$n2[$x]) {
          echo $n2[$x]."*- ";
        }else {
          echo $n2[$x]." - ";
        }
    } # for com x
    echo "<br>";
  } #for com i
?>
</body>
</html>
