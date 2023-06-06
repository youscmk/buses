<?php 



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.pullman.cl/srv-vehiculo-core-web/rest/integracionWit/obtenerConductoresPorContrato',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "contrato": "ICT002"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
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
        "rut": "'.$rut.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    echo
    $response2 = curl_exec($curl);

    curl_close($curl);
    
    // $document =json_decode($response2);
    
    //   $licenciaInterna=$document->documentos[2]->fechaVigencia ;

    //   $licenciaMunicipal=$document->documentos[3]->fechaVigencia ;

    //   $ProveedorAcreditado=$document->documentos[1]->fechaVigencia ;



      
    // $json =array (

    //   'rut'=>$rut,
    //   'nombre'=>$nombre,
    //   'licenciaMunicipal'=>$licenciaInterna,
    //   'licenciaInterna'=>$licenciaInterna,
    //   'ProveedorAcreditado'=>$ProveedorAcreditado
      
    // );

    // $total[$i]=$json;

    // $i++;


}

//echo json_encode($total, http_response_code(200));


?>