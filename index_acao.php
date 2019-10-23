<?php

    include_once "default.inc.php";
    require_once "conexao.php";

    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "0";

    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("DELETE FROM passagensAereas WHERE cod = $codigo");
    
    header('location:index.php');


?>