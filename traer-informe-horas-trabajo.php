<?php

include "login/login.php";

include "./horas_trabajo.php";

include "login/conexion.php";



$json = json_decode($informe);

$id_informe = $json->id;


echo "<br>";
echo "<br><b>" . "  &nbsp[[ID REPORTE]]</b>";
echo "<br>" . "[[[-->" . $id_informe  . "<--]]]";
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
  CURLOPT_POSTFIELDS => 'hash=' . $cap . '&report_id=' . $id_informe,
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

$response = curl_exec($curl);

$response2 = preg_split("/\,/", $response);

//print_r($response2);
$fecha_r = $response2[0];
//$response11 = preg_split("/\"/", $fecha_r);
//print_r($response11);
//$fechaf_reporte = $response11[5];
echo "<br>";
echo "<b>Fecha Creación Reporte</b><br>";
date_default_timezone_set("America/Santiago");
echo $fecha_r = date("Y-m-d H:i:s", strtotime('-1 day', time()));





curl_close($curl);







sleep(25);



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
  CURLOPT_POSTFIELDS => 'hash=' . $cap . '&report_id=' . $id_informe,
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

$response4 = preg_split("/\"/", $response7);

$men = $response4[7];
echo $men;

if ($men == "Requested data is not ready yet") {


  $variablex = $id_informe;

  header("Location:clone.php?variablex=" . $id_informe);



}




$horas = json_decode($response7);

$buses = $horas->report->sheets[0]->sections[0]->data[0]->rows;



foreach ($buses as $items) {

  echo "<br>";
  $id_r = '';

  echo $plate = $items->tracker->v . ' / ';
  echo $total_horas = $items->duration->v . ' / ';
  echo $ralenti = $items->idle->v . ' / ';
  echo $en_movimiento = $items->in_movement->v . ' / ';
  date_default_timezone_set("America/Santiago");

  echo $fecha_ayer = date("Y-m-d", strtotime('-1 day', time()));

  /*date_default_timezone_set("America/Santiago");
    $fecha_actual = date("Y-m-d", strtotime('-1 day', time()));
    echo $fecha_actual;*/
  //$hoy = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
  //echo $fecha_reporte=$items->created.' / ';

  /*$divpatente = preg_split("/-/", $plate);

  $VarPatente = $divpatente[0];
  $VarId = $divpatente[1];*/


  $sql = "INSERT INTO reporte_ralenti (patenteV, total_horas, ralenti, en_movimiento, fecha) VALUES ('$plate', '$total_horas', '$ralenti', '$en_movimiento', '$fecha_ayer')";

  $datosduplicados = mysqli_query($mysqli, "SELECT * FROM reporte_ralenti WHERE total_horas='$total_horas' AND ralenti='$ralenti' AND en_movimiento='$en_movimiento' AND fecha='$fecha_ayer'");

  if (mysqli_num_rows($datosduplicados) > 0) {
    $sql = "DELETE FROM reporte_ralenti WHERE patenteV='$plate'";
    $ejecutar1  = mysqli_query($mysqli, $sql);

  } else {

    $ejecutar = mysqli_query($mysqli, $sql);
  }


  //ese es el insert 

}
curl_close($curl);
