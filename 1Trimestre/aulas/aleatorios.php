<!DOCTYPE html>
<?php
	$num = isset($_POST['num']) ? $_POST['num'] : 0;
?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Título</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="post">
	Aleatório: <input type="text" name="num" id="num"><br><br>
	<input type="submit" value="Calcular"><br><br>
</form>
<?php
  srand(time());
  for($x=0;$x<$num;$x++){
    echo mt_rand(0,1000)."<br>";
  }
?>
</body>
</html>
