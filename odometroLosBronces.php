<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/counter/value/list',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"type":"odometer","trackers":[10182708,
10196192,
10196218,
10196242,
10196418,
10196431,
10196471,
10196473,
10196474,
10196487,
10196489,
10196494,
10196521,
10196531,
10196551,
10196578,
10196581,
10196593],"hash":"237137b98db5bd322febc4d2fa86c158"}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/plain, */*',
    'Referer: http://www.trackermasgps.com/',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


$array=json_decode($response);

foreach ($array as $item){

    print_r($item);
    echo "hola";
}

