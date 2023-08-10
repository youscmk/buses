<?php 

include "login-zaldivar.php";
echo "<br>";
$hashZaldivar=$cap;

include "login-pullman.php";
echo "<br>";
$hashPullman=$cap;

include "login-bronces.php";
echo "<br>";
$hashLosBronces=$cap;

date_default_timezone_set("America/Santiago");

$time= date('Y-m-d H:i:s');

include "conexion.php";



  
  $qryZal="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashZaldivar' WHERE (`id` = '4');";

  $resutaldo3 = mysqli_query($mysqli, $qryZal);

  $qryPull="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashPullman' WHERE (`id` = '5');";

  $resutaldo3 = mysqli_query($mysqli, $qryPull);

  $qryLosBronces="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashLosBronces' WHERE (`id` = '3');";

  $resutaldo4 = mysqli_query($mysqli, $qryLosBronces);

?>