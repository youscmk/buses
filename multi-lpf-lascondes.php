<?php
require_once './login/login-lascondesm.php';

$listado = '';
$i = 0;
$hash = $cap;

// Inicializar curl multi
$mh = curl_multi_init();

$curlArray = [];
$responseArray = [];

// Primera solicitud para obtener la lista de trackers
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
    CURLOPT_POSTFIELDS => '{"hash":"' . $hash . '"}',
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
curl_close($curl);

$json = json_decode($response2);
$array = $json->list;

// Preparar múltiples solicitudes para obtener el estado de cada tracker
foreach ($array as $item) {
    $id = $item->id;

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
        CURLOPT_POSTFIELDS => '{"hash": "' . $hash . '", "tracker_id": ' . $id . '}',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $curlArray[$id] = $curl;
    curl_multi_add_handle($mh, $curl);
}

// Ejecutar todas las solicitudes de manera asíncrona
$running = null;
do {
    curl_multi_exec($mh, $running);
    curl_multi_select($mh);
} while ($running > 0);

// Recoger las respuestas y cerrar los manejadores de curl
foreach ($curlArray as $id => $curl) {
    $response = curl_multi_getcontent($curl);
    $responseArray[$id] = json_decode($response);
    curl_multi_remove_handle($mh, $curl);
    curl_close($curl);
}

curl_multi_close($mh);

// Procesar las respuestas
$total = [];
foreach ($array as $item) {
    $id = $item->id;
    $imei = $item->source->device_id;
    $plate = $item->label;

    $json2 = $responseArray[$id];
    
    if (isset($json2->state->gps->location->lat)) {
        $lat = $json2->state->gps->location->lat;
    } else {
        $lat = null;
    }
    
    if (isset($json2->state->gps->location->lng)) {
        $lng = $json2->state->gps->location->lng;
    } else {
        $lng = null;
    }
    
    $last_u = $json2->state->last_update;
    $speed = $json2->state->gps->speed;
    $direccion = $json2->state->gps->heading;
    $connection_status = $json2->state->connection_status;
    $movement_status = $json2->state->movement_status;
    $signal_level = $json2->state->gps->signal_level;
    $ignicion = $json2->state->inputs[0];

    //include './odometro.php';
   // include './hmotor.php';

    $json = array(
        'id' => $id,
        'imei' => $imei,
        'patente' => $plate,
        'lat' => $lat,
        'lng' => $lng,
        'speed' => $speed,
        'direccion' => $direccion,
        'connection_status' => $connection_status,
        'signal_level' => $signal_level,
        'movement_status' => $movement_status,
        'ignicion' => $ignicion,
     //   'odometro' => $odometro,
     //   'Hmotor' => $hmotor,
        'ultima-conexion' => $last_u
    );

    $total[$i] = $json;
    $i++;
}

echo json_encode($total, http_response_code(200));
?>
