<!DOCTYPE html>
<?php 
    include_once "default.inc.php";
    require_once "conexao.php";
    $title = "Exercício Prático";

    function checkIn($val){
      if($val==1)
        return 'sim';
      else
        return '<i>não</i>';  
    }

    function convertDate($date){
      $data = explode('-',$date);
      return "$data[2]/$data[1]/$data[0]";
    }

    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM passagensAereas");

    $origem=isset($_POST['origem'])?$_POST['origem']:null;
    $destino=isset($_POST['destino'])?$_POST['destino']:null;

    $valorInicial=isset($_POST['valorInicial'])?$_POST['valorInicial']:null;
    $valorFinal=isset($_POST['valorFinal'])?$_POST['valorFinal']:null;
    
    $dataInicial=isset($_POST['dataInicial'])?$_POST['dataInicial']:null;
    $dataFinal=isset($_POST['dataFinal'])?$_POST['dataFinal']:null; 

    $checkin=isset($_POST['checkin'])?$_POST['checkin']:null;

    $esc=isset($_POST['tipoBusca'])?$_POST['tipoBusca']:null;

    $pdo = Conexao::getInstance();
    if($esc=='OeD'){  
        $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE origem LIKE'$origem%';");
        // $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE destino LIKE'$destino%';");
    }else if($esc=='VP'){     
      // $pdo = Conexao::getInstance();
      $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE valorPass BETWEEN $valorInicial AND $valorFinal;");
    }else if($esc=='DV'){     
      // $pdo = Conexao::getInstance();
      $dI = "'".$dataInicial."'";
      $dF = "'".$dataFinal."'";
      $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE dataVoo BETWEEN $dI AND $dF;");
    }else if($esc=='CK'){    
      if($checkin=='sim'){
        $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE checkin = 1");
      }else if($checkin=='nao'){
        $consulta = $pdo->query("SELECT * FROM passagensAereas WHERE checkin = 0");
      }else{
        $consulta = $pdo->query("SELECT * FROM passagensAereas");
      }  
    }else{
      $consulta = $pdo->query("SELECT * FROM passagensAereas");
    }   

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="st.css">
    <script>
    function excluir(url) {
        if (confirm("Confirmar Exclusão?"))
            location.href = url;
    }
    </script>
</head>
<body>

  <div name='consulta'>
    <label for="consulta">Consultas</label><br>
    <form method="post">
      <div class='group'>
        <input type="radio" name='tipoBusca' value='OeD' <?php if($esc=='OeD') echo 'checked';?>>
        Origem e destino<br>
        <input type="text" placeholder='Origem' name='origem' value='<?php echo $origem; ?>'>
        <input type="text"  placeholder='Destino' name='destino' value='<?php echo $destino; ?>'>
      </div>
      <div class='group'>
        <input type="radio" name='tipoBusca' value='VP' <?php if($esc=='VP') echo 'checked';?>>
        Valor da passagem<br>
        <input type="text" placeholder='Valor inicial' name='valorInicial' value='<?php echo $valorInicial; ?>'>
        <input type="text" placeholder='Valor final' name='valorFinal' value='<?php echo $valorFinal; ?>'>
      </div>
      <div class='group'>
        <input type="radio" name='tipoBusca' value='DV' <?php if($esc=='DV') echo 'checked';?>>
        Data do vôo / <mark>aaaa-mm-dd</mark><br>
        <input type="date" placeholder='Data inicial' name='dataInicial' value='<?php echo $dataInicial; ?>'>
        <input type="date" placeholder='Data final' name='dataFinal' value='<?php echo $dataFinal; ?>'>
      </div>
      <div class='group'>
        <input type="radio" name='tipoBusca' value='CK' <?php if($esc=='CK') echo 'checked';?>>
        Check-in<br>
        <select name="checkin">
          <option value="all"></option>
          <option value="sim" <?php if($checkin=='sim') echo 'selected';?>>sim</option>
          <option value="nao" <?php if($checkin=='nao') echo 'selected';?>>não</option>
        </select>
      </div>

      <input type="submit">
    </form>
  </div>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Passageiro</th>
        <th>Poltrona</th>
        <th>Data de Voo</th>
        <th>Origem</th>
        <th>Destino</th>
        <th>Valor<br>Passagem</th>
        <th>Check-in</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $a=0;
      $soma=0;
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
           $soma += $linha['valorPass'];  
           
              if($a%2==0) 
                echo "<tr class='a'>"; 
              else 
                echo "<tr class='b'>";
              echo "
                <td>{$linha['cod']}</td>
                <td>{$linha['passageiro']}</td>
                <td>{$linha['poltrona']}</td>
                <td>".convertDate($linha['dataVoo'])."</td>
                <td>{$linha['origem']}</td>
                <td>{$linha['destino']}</td>
                <td>R$ {$linha['valorPass']}</td>
                <td>".checkIn($linha['checkin'])."</td>       
            ";
              ?>
                <td><a href="javascript:excluir('index_acao.php?codigo=<?php echo $linha['cod'];?>')">Excluir</a></td>
              </tr>
       <?php $a++; }   
    ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>R$<?php echo $soma;?></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</body>
</html>
