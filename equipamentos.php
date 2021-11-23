<?php
//Responsavel por permitir que qualquer link faca requisicoes a essa pagina
header('Access-Control-Allow-Origin: *');

//Configuracoes para o acesso ao bd
$host = "bqzklystdjoz2nxnr2ox-mysql.services.clever-cloud.com"; 
$user = "ulbzy86asbvbjwzz"; 
$password = "uz42J8NTMq1yVWCrotTo"; 
$dbname = "bqzklystdjoz2nxnr2ox"; 
$id = '';

//Conexao com o bd
$con = mysqli_connect($host, $user, $password,$dbname);

//Recebe que tipo de requiscao foi feita: get ou post
$method = $_SERVER['REQUEST_METHOD'];

//String que recebera qual comando sera feito no bd
$sql = "";

//Caso nao consiga conectar ao bd aborta a chamada
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


switch ($method) {
    //Caso for get faz um select em todos os dados da tabela equipamentos
    case 'GET':
      $sql = "select * from equipamento"; 
      break;
    //Caso for post ele verifica qual operacao sera feito pela operacao passada: POST,PUT e DELETE
    case 'POST':
      //Se a operacao for post ele insere um novo bd, retirando os dados passados no post
      if ($_POST['operacao'] == 'POST') {
        $nome = $_POST['nome']; 
        $serial = $_POST['serial']; 
        $status = $_POST['status']; 
        $dataDeAquisicao = $_POST['dataDeAquisicao']; 
  
        $sql = "insert into equipamento (nome, serial, dataDeAquisicao, status) values ('$nome', '$serial', '$dataDeAquisicao', '$status')"; 
        break;
      //Se a operacao for put ele atualiza um equipamento especificado pelo serial passado no post
      } elseif ($_POST['operacao'] == 'PUT') {
          $nome = $_POST['nome']; 
          $serial = $_POST['serial']; 
          $status = $_POST['status']; 
          $dataDeAquisicao = $_POST['dataDeAquisicao']; 
    
          $sql = "update equipamento set nome = '$nome' ,dataDeAquisicao = '$dataDeAquisicao', status = '$status'  where serial = '$serial'"; 
          break;
      //Se a operacao for delete ele deleta um equipamento especificado pelo serial passado no post
      } elseif ($_POST['operacao'] == 'DELETE') {
          $serial = $_POST['serial'];  //["serial"];
          $sql = "delete from equipamento where serial = '$serial'";
      }
}

//Realiza o comando no bd
$result = mysqli_query($con, $sql);

//Caso falhe o comando retorna um erro
if (!$result) {
  http_response_code(400);
  die(mysqli_error($con));
}

//Caso for o get ele gera a string de retorno com todos os equipamentos
if ($method == 'GET') {
    if (!$id) echo '[';
    //Percorre todos os resultados da consulta e usa a funcao json_encode para imprimir as colunas no formato correto
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
}

//Fecha a conexao com o bd
$con->close();
?>
