<!DOCTYPE html>
<?php

?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Título</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php $n1=3.45; ?>
<p>Valor Absoluto (abs) - Usando o Valor
<?php echo "3.45 --> ".abs(-3.45);?></p>
<p>Arredondamento (para cima) (ceil) - Usando a variável $n1
<?php echo $n1." --> ".ceil($n1); ?></p>
<p>Arredondamento (para baixo) (floor)
<?php echo $n1." --> ".floor($n1); ?></p>
<p>Arredondamento (inteiro mais próximo) (round)
<?php echo $n1." --> ".round($n1); ?></p>
<p>Maior número de uma lista (max) (1,2,3,4,5)
<?php echo " --> ".max(1, 2, 3, 4, 5); ?></p>
<p>Menor número de uma lista (min) (1,2,3,4,5)
<?php echo " --> ".min(1, 2, 3, 4, 5); ?></p>
<br><hr><br>
<p>Constante PI (pi)
<?php echo " --> ".pi(); ?></p>
<p>Potência (pow) (2 elevado a 3)
<?php echo " --> ".pow(2, 3); ?></p>
<p>Raiz quadrada (sqrt) (raiz de 81)
<?php echo " --> ".sqrt(81); ?></p>
<p>Casas decimais e trocar . por , - 3.141623
<?php echo " --> ".number_format(3.141623, 2, ',', '.'); ?></p>
<!--                     num; Casas após vírgula Separador decimal; e o de Milhar-->
</body>
</html>
