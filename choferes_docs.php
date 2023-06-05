<?php 



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://sistema.pullmanindustrial.cl/funciones/STM00002/ajax.php?funcion=TraeChofer2&sistema=U1RNMDAwMDI=&formulario=RlJNX0NPTlNVTFRBVklBSkVT&contrato=ICT002',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'funcion=buscar',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: PHPSESSID=d6rm39d0d48pl2ptvbb7k2dnl3',
    'Origin: http://sistema.pullmanindustrial.cl',
    'Referer: http://sistema.pullmanindustrial.cl/trafico.php?sistema=U1RNMDAwMDI=&formulario=RlJNX0NPTlNVTFRBVklBSkVT&contrato=ICT002',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
    'X-Requested-With: XMLHttpRequest'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$arreglo = json_decode($response);
$i=0;

foreach ($arreglo as $item){
  
  $rut =$item->rut;
  
  $nombre=$item->nombre;




    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.pullman.cl/srv-vehiculo-core-web/rest/integracionWit/obtenerInformacionConductor',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
    {
        "rut": "11172161-0"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));

    $response2 = curl_exec($curl);

    curl_close($curl);
    
    $document =json_decode($response2);
    
      $licenciaInterna=$document->documentos[2]->fechaVigencia ;

      $licenciaMunicipal=$document->documentos[3]->fechaVigencia ;

      $ProveedorAcreditado=$document->documentos[1]->fechaVigencia ;



      
    $json =array (

      'rut'=>$rut,
      'nombre'=>$nombre,
      'licenciaMunicipal'=>$licenciaInterna,
      'licenciaInterna'=>$licenciaInterna,
      'ProveedorAcreditado'=>$ProveedorAcreditado
      
    );

    $total[$i]=$json;

    $i++;


}

echo json_encode($total, http_response_code(200));


?>