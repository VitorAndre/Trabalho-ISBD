<?php
header('Access-Control-Allow-Origin: *');
$host = "bqzklystdjoz2nxnr2ox-mysql.services.clever-cloud.com"; 
$user = "ulbzy86asbvbjwzz"; 
$password = "uz42J8NTMq1yVWCrotTo"; 
$dbname = "bqzklystdjoz2nxnr2ox"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];

$sql = "";

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
switch ($method) {
    case 'GET':
      $sql = "select * from equipamento"; 
      break;
    case 'POST':
      if ($_POST['operacao'] == 'POST') {
        $nome = $_POST['nome']; 
        $serial = $_POST['serial']; 
        $status = $_POST['status']; 
        $dataDeAquisicao = $_POST['dataDeAquisicao']; 
  
        $sql = "insert into equipamento (nome, serial, dataDeAquisicao, status) values ('$nome', '$serial', '$dataDeAquisicao', '$status')"; 
        break;
      } elseif ($_POST['operacao'] == 'PUT') {
          $nome = $_POST['nome']; 
          $serial = $_POST['serial']; 
          $status = $_POST['status']; 
          $dataDeAquisicao = $_POST['dataDeAquisicao']; 
    
          $sql = "update equipamento set nome = '$nome' ,dataDeAquisicao = '$dataDeAquisicao', status = '$status'  where serial = '$serial'"; 
          break;
      } elseif ($_POST['operacao'] == 'DELETE') {
          $serial = $_POST['serial'];  //["serial"];
          $sql = "delete from equipamento where serial = '$serial'";
      }
}

$result = mysqli_query($con, $sql);

if (!$result) {
  http_response_code(400);
  die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
}

$con->close();
?>