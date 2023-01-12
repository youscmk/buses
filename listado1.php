<?php
include "login/login.php";


//header("refresh:2");
$listado='';

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

$json= json_decode($response2);

$array=$json->list;

foreach ($array as $item){

    echo "<br>";
    echo $id=$item->id;
    echo "<br>";
    echo $plate=$item->label;


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
      CURLOPT_POSTFIELDS =>'{"hash": "'.$cap.'", "tracker_id": '.$id.'}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response2 = curl_exec($curl);
    
    curl_close($curl);

    $json2=json_decode($response2);

   echo "<br>";

   echo $lat= $array2=$json2->state->gps->location->lat ;

   echo "<br>";

   echo $lng= $array2=$json2->state->gps->location->lng ;

   echo "<br>";

   echo $hora= $array2=$json2->state->last_update ;



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
  CURLOPT_POSTFIELDS =>'{"location":{"lat":'.$lat.',"lng":'.$lng.'},"lang":"es","hash":"'.$cap.'"}',
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

$response3 = curl_exec($curl);

curl_close($curl);

$array3=json_decode($response3);

$direccion=$array3->value;

echo "<br>";    
echo $direccion;
echo "<br>"; 

  $listado=$listado.','.$id ;
  
}
echo"<br>";
echo $listado;
