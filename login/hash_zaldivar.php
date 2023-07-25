<?php 

include "login-zaldivar.php";

$hashZaldivar=$cap;

include "login-pullman.php";

$hashPullman=$cap;

date_default_timezone_set("America/Santiago");

$time= date('Y-m-d H:i:s');

include "conexion.php";



  
  $qryZal="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashZaldivar' WHERE (`id` = '4');";

  $resutaldo3 = mysqli_query($mysqli, $qryZal);

  $qryPull="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashPullman' WHERE (`id` = '5');";

  $resutaldo3 = mysqli_query($mysqli, $qryPull);

?>