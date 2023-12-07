<?php 

//$user="IngeGroup";

//$pasw="123";

//ralenti ("IngeGroup","123"); 

function ralenti($user,$pasw){
   

include "conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$hash=$data['hash'];

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
  CURLOPT_POSTFIELDS => '{"hash": "' . $hash . '"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$list = curl_exec($curl);

curl_close($curl);

date_default_timezone_set("America/Santiago");

$hoy =date("d/m/Y");

$ayer=date('Y-m-d',strtotime("-1 days"));


$from ="$ayer 00:00:00 ";

$to ="$ayer 23:59:00";

$arryList=json_decode($list);

foreach ($arryList->list as $item){

    $id_tracker= $item->id ;
    
    $patente=$item->label;

    include "patron.php";
}

}


?>