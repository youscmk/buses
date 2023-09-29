<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


include "login/conexion.php";

$consulta="SELECT patente, paradero, direccion, latitud, longitud FROM masgps.paraderos;";

$resutaldo= mysqli_query($mysqli,$consulta);
$i=0;

while($data=mysqli_fetch_array($resutaldo)){

   $dir=substr( $data['direccion'] , 0,35);
   

     $json =[
       'paradero'=> $data['paradero'],
       'patente'=>$data['patente'],
       'direccion'=> $dir ,
       'coord'=>[
       'lat'=>floatval($data['latitud']),
       'lng'=>floatval($data['longitud'])
       ]
    
    
    ];

     $total[$i]=$json;

     $i++;
};

echo json_encode($total, http_response_code(200));





