<?php
//include "login/login-lascondes.php";



include "login/conexion.php";

$user="dorian";

$pasw="123";

include "login/conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$cap=$data['hash'];



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

Loop :

foreach ($array as $item) {

  echo "<br>";
  $id = $item->id;

  $imei=$item->source->device_id;



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
  //echo " , &nbsp";

   $lat = $array2 = $json2->state->gps->location->lat;
  //echo " , &nbsp";

   $lng = $array2 = $json2->state->gps->location->lng;
  //echo " , &nbsp";

   $last_u = $array2 = $json2->state->last_update;
  //echo " , &nbsp";
  echo 
   $plate = $item->label;
  //echo " , &nbsp";
  $status=$json2->state->connection_status;

  
  $direcc1 = "**";
	//echo $direcc1;
  
  date_default_timezone_set("America/Santiago");
  echo$hoy = date("Y-m-d h:i:s ");


  $sql = "INSERT INTO lpf (cuenta,id_tracker,`lat`,`long`,`patente`,`direccion`,`fecha`,`last_update`, `imei`,`connection_status` ) VALUES ('lasCondes','$id', '$lat', '$lng', '$plate', '$direcc1', '$hoy','$last_u','$imei', '$status'  )";
 



   $datosduplicados = mysqli_query($mysqli, "SELECT * FROM lpf WHERE id_tracker='$id'");

   if (mysqli_num_rows($datosduplicados) > 0) {

     // LO actualizo conforme a la echa de hoy y tambien a la patente me falta terminar el update
   
     $sql1 = "UPDATE lpf SET `lat`='$lat', `long`='$lng' , `direccion`='$direcc1' ,`last_update`= '$last_u', `fecha`='$hoy', `cuenta`='lasCondes', `imei`='$imei', `connection_status`='$status' WHERE `id_tracker`='$id' ";

    $ejecutar1 = mysqli_query($mysqli, $sql1);
    echo " actualizado <br>";

   } else {

  //   // si no se repite entonces se sube
     $ejecutar = mysqli_query($mysqli, $sql);
     echo " creado <br>";
   }
}

sleep(20);

goto Loop; 