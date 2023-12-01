<?php 

date_default_timezone_set("America/Santiago");

$hoy = date("Y-m-d");

$ayer=date('Y-m-d',strtotime("-1 days"));

$user="Particulares";

$pasw="123";

include "manejoBrusco.php";

manejo($user,$pasw,$ayer);




?>