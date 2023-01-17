<?php

include "login/login.php";

include "horas_trabajo.php";

include "./login/conexion.php";



$json=json_decode($informe);

$id_informe=$json->id;


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/report/tracker/retrieve',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'hash='.$cap.'&report_id='.$id_informe,
  CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: _ga=GA1.2.728367267.1665672802; locale=es; _gid=GA1.2.621312682.1672338026; session_key=b353a9505ad2379b3924ddd5597be1df; check_audit=b353a9505ad2379b3924ddd5597be1df',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
  ),
));

echo "<br>";
$response7 = curl_exec($curl);

$response4= preg_split("/\"/", $response7);

$men= $response4[7];


if($men=="Requested data is not ready yet"){

  
  $variablex= $id_informe;

  header("location:clone.php?variablex=".$id_informe);

 // aqui se se suponeuq enviamos la variable $variablex al php clone
  // en caso de que falle, reenviamos el mismo id_informe al clone para que pueda leer el informe de ese id, porque el tema
  //es que si hacemos un refresh en este php el id_informe aumenta osea pasamos de 1 a 2 y hacerlo recargar no va a hacer que funcione

  // por ello queria hacer esto, reenviamos el primer id que usamos y en caso de fallar capturar este mismo id y reenviarlo al clone para que si lo haga funcionar

  //se me entiende?

  //ahora un detalle el clone no me captura el $variablex
} 

$horas=json_decode($response7);

$buses=$horas->report->sheets[0]->sections[0]->data[0]->rows;



foreach ($buses as $items){

echo "<br>";
$id_r= '';
echo $plate=$items->tracker->v.' / ' ;
echo $total_horas=$items->duration->v.' / ';
echo $ralenti=$items->idle->v.' / ';
echo $en_movimiento=$items->in_movement->v.' / ';
echo $fecha= $fecha_reporte->report->created.' / ';

$sql= "INSERT INTO reporte_ralenti (id_r, patente, total_horas, ralenti, en_movimiento, fecha) VALUES ('$id_r', '$plate', '$total_horas', '$ralenti', '$en_movimiento', NULL)";

$ejecutar = mysqli_query($mysqli, $sql);
  
}

curl_close($curl);

?>