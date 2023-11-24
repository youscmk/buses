<?php 
$data=[ 
    [
    "id"=>1,
    "oferta" => "Oferta 1 ",
    "precio" => "$9.990",
    "detalle"   => "Kit basico "
    ],
    [
        "id"=>2,
        "oferta" => "Oferta 2 ",
        "precio" => "$19.990",
        "detalle"   => " Kit avanzado + Camara Web "
        ],
        [
            "id"=>3,
            "oferta" => "Oferta 3 ",
            "precio" => "$15.990",
            "detalle"   => " 2 Kit basicos "
            ],
       

];

$json= json_encode($data);

echo $json;

 
?>