<?php
include "login/login.php";
include "login/conexion.php";


//header("refresh:2");
$listado = '';

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

$array = $json->list;

foreach ($array as $item) {

  echo "<br>";
  echo $id = $item->id;
  echo " , &nbsp";


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/get_state',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"hash": "' . $cap . '", "tracker_id": ' . $id . '}',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));


  $response2 = curl_exec($curl);

  curl_close($curl);

  $json2 = json_decode($response2);
  //$.state.gps.location.lat
  echo " , &nbsp";

  echo $lat = $array2 = $json2->state->gps->location->lat;
  echo " , &nbsp";

  echo $lng = $array2 = $json2->state->gps->location->lng;
  echo " , &nbsp";

  echo $last_u = $array2 = $json2->state->last_update;
  echo " , &nbsp";

  echo $plate = $item->label;
  echo " , &nbsp";


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/geocoder/search_location',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"location":{"lat":' . $lat . ',"lng":' . $lng . '},"lang":"es","hash":"' . $cap . '"}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/plain, */*',
      'Accept-Language: es-419,es;q=0.9,en;q=0.8',
      'Connection: keep-alive',
      'Content-Type: application/json',
      'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.343013326.1670594107; locale=es; session_key=7ceae24d013dd694bdbaa06dd8bac781; check_audit=7ceae24d013dd694bdbaa06dd8bac781',
      'Origin: http://www.trackermasgps.com',
      'Referer: http://www.trackermasgps.com/',
      'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $json1 = json_decode($response);
  $array4 = $json1->value;
  $direcc = $array4;

  $direcc1 = addslashes($direcc);
	echo $direcc1;
  
  date_default_timezone_set("America/Santiago");
  $hoy = date("Y-m-d");


  $sql = "INSERT INTO LPF(id_tracker,latitud,longitud,last_update,patente,direccion_usuario, fecha) VALUES ('$id', '$lat', '$lng', '$last_u', '$plate', '$direcc1', '$hoy' )";




  $datosduplicados = mysqli_query($mysqli, "SELECT * FROM LPF WHERE fecha= '$hoy' AND id_tracker='$id'");

  if (mysqli_num_rows($datosduplicados) > 0) {

    // LO actualizo conforme a la echa de hoy y tambien a la patente me falta terminar el update
    
    $sql1 = "UPDATE LPF SET latitud='$lat', longitud='$lng' , direccion_usuario='$direcc1' ,last_update= '$last_u', fecha='$hoy' WHERE fecha= '$hoy' AND id_tracker='$id' ";

    $ejecutar1 = mysqli_query($mysqli, $sql1);


  } else {

    // si no se repite entonces se sube
    $ejecutar = mysqli_query($mysqli, $sql);
  }
}