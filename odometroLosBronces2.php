<?php
//include "./login/login-lascondes.php";
// include "login/conexion.php";

//require_once './login/login-bronces.php';
$user="losBronces";


$pasw="123";

include "./login/conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$cap=$data['hash'];



//$cap='f6bcdb562c636db0e48c9cb196291662';

date_default_timezone_set("America/Santiago");

$hoy = date("d/m/Y H:i:s");

LISTADO :
//header("refresh:2");
$listado = '';
$i=0;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/list',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"hash":"' . $cap . '"}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/plain, */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Cookie: _ga=GA1.2.728367267.1665672802; locale=es; _gid=GA1.2.967319985.1673009696; _gat=1; session_key=5d7875e2bf96b5966225688ddea8f098',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
  ),
));

$response2 = curl_exec($curl);

$json = json_decode($response2);

if(isset($json->list)){

  $array = $json->list;


//echo '[';
foreach ($array as $item) {

 
   $id = $item->id;
  
   $plate = $item->label;
  

  include './odometro.php';





    $json =array (


      'id'=>$id,
      
      'patente'=>$plate,
      
      'odometro'=>$odometro,
      
      'date'=>$hoy
      
      
    );

    $total[$i]=$json;

    $i++;
}



} else {

  include "./login/login-bronces.php";



  $consulta = "UPDATE `masgps`.`hash` SET `hash` = '$hash' WHERE (`id` = '3');";

  $resutaldo3 = mysqli_query($mysqli, $consulta);

  goto LISTADO;
}


echo json_encode($total, http_response_code(200));

