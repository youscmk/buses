<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://sistema.pullmanindustrial.cl/funciones/STM00001/jquery.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'funcion=ObtieneExamenesFiltro&sistema=U1RNMDAwMDE%3D&formulario=RlJNX0NPTlNVTFRBRVhBTUVOVkVOQ0lETw%3D%3D&contrato=ICT002&tipoPersonal=ITP003&tipoExamen=Todos&exVencidos=false',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: PHPSESSID=30tl1j829iflanrjut11naq2s0',
    'Origin: http://sistema.pullmanindustrial.cl',
    'Referer: http://sistema.pullmanindustrial.cl/rrhh.php?sistema=U1RNMDAwMDE=&formulario=RlJNX0NPTlNVTFRBRVhBTUVOVkVOQ0lETw==&contrato=ICT002',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36',
    'X-Requested-With: XMLHttpRequest'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
