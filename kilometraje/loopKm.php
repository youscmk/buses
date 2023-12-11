<?php 

$user="Vina";

$pasw="123";



include "reporteKm2.php";


date_default_timezone_set("America/Santiago");
$hoy = date("Y-m-d");
for( $i=1 ; $i <=20 ; $i++)
{
$ayer=date('Y-m-d',strtotime("-$i days"));
echo $ayer;
echo "<br>";

reporteKM($user,$pasw,$ayer);

}

?>