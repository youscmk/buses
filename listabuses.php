<?php
include "login/login.php";



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
  CURLOPT_POSTFIELDS =>'{"hash":"'.$cap.'"}',
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

$response3 = preg_split("/\"/", $response2);

//print_r($response3);

$patente1 = $response3[49];
$patente2 = $response3[91];
$patente3 = $response3[133];
$patente4 = $response3[175];
$patente5 = $response3[217];
$patente6 = $response3[259];
$patente7 = $response3[301];
$patente8 = $response3[343];
$patente9 = $response3[385];
$patente10 = $response3[427];


// echo "<br>". $patente1 . "&nbsp;". $patente2 ."&nbsp;". $patente3 . " &nbsp;". $patente4 ."&nbsp;". $patente5 . " &nbsp;". $patente6 ."&nbsp;".$patente7 . "&nbsp; ". $patente8 ."&nbsp;". $patente9 . "&nbsp; ". $patente10 . "&nbsp;". "<br>";


//$response2= json_decode($response2);


curl_close($curl);



$lruc = curl_init();

curl_setopt_array($lruc, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/list',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"hash":"'.$cap.'"}',
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

$response = curl_exec($lruc);

curl_close($lruc);

$json=json_decode($response);

$array=$json->list;

foreach ($array as $item){
echo "<br>";
  echo $id= $item->id;



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

$response1 = curl_exec($curl);

$response1= json_decode($response1);

curl_close($curl);

//$.state.gps.location.lat

echo $response1->state->gps->location->lat." , &nbsp;";
echo $lng= $response1->state->gps->location->lng." , &nbsp;";
echo $response1->state->last_update." , &nbsp";

if ($id == 10177116){

  echo $patente1; 


}

if ($id == 10177117){
  echo $patente2;
}

if ($id == 10177118){
  echo $patente3;
}

if ($id == 10177119){
  echo $patente4;
}

if($id == 10177120){
  echo $patente5;
}

if ($id == 10177121){
  echo $patente6;
}

if ($id == 10177122){
  echo $patente7;
}

if($id == 10177123){
  echo $patente8;
}

if ($id == 10177124){
  echo $patente9;

}

if ($id == 10177125){
  echo $patente10;
}



// echo $response2->list[1]->label;




}



?>