<?php 


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://sistema.pullmanindustrial.cl/funciones/STM00005/jquery.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'funcion=cargadocumentosdigiweb&sistema=U1RNMDAwMDU%3D&formulario=RlJNX0NPTlNVTFRBRElHSVdFQldQ&contrato=ICT002&patente=0',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: PHPSESSID=d6rm39d0d48pl2ptvbb7k2dnl3',
    'Origin: http://sistema.pullmanindustrial.cl',
    'Referer: http://sistema.pullmanindustrial.cl/flota.php?sistema=U1RNMDAwMDU=&formulario=RlJNX0NPTlNVTFRBRElHSVdFQldQ&contrato=ICT002',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
    'X-Requested-With: XMLHttpRequest'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>