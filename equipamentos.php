<?php
header('Access-Control-Allow-Origin: *');
$host = "bqzklystdjoz2nxnr2ox-mysql.services.clever-cloud.com"; 
$user = "ulbzy86asbvbjwzz"; 
$password = "uz42J8NTMq1yVWCrotTo"; 
$dbname = "bqzklystdjoz2nxnr2ox"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];
//$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = file_get_contents('php://input');

$sql = "";

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$entrada = json_decode(file_get_contents('php://input'));
// error_log(print_r('entrada: ', true));
// error_log(print_r($_SERVER, true));
// error_log(print_r($_POST, true));
// error_log(print_r($entrada, true));

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
    case 'DELETE':
      break;
    case 'PUT':
      $nome = $entrada->nome; 
      $serial = $entrada->serial; 
      $status = $entrada->status; 
      $dataDeAquisicao = $entrada->dataDeAquisicao; 

      $sql = "update equipamento set nome = '$nome' ,dataDeAquisicao = '$dataDeAquisicao', status = '$status'  where serial = '$serial'"; 
      break;
}

// run SQL statement
$result = mysqli_query($con, $sql);

// die if SQL statement failed
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
} elseif ($method == 'POST' || $method = 'PUT') {
    echo json_encode($result);
} else {
    echo mysqli_affected_rows($con);
  }

$con->close();
?>