<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include "login/conexion.php";

$user="dorian";

$pasw="123";

include "login/conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$cap=$data['hash'];
echo
$resonse =json_encode(['hash'=>$cap]);

