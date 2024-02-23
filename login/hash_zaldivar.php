<?php 

include "login-ventana.php";
echo "<br>";
$hashVentana=$cap;

include "login-Araucania.php";
echo "<br>";
$hashAraucania=$cap;

include "login-particulares.php";
echo "<br>";
$hashParticulares=$cap;

include "login-vina.php";
echo "<br>";
$hashVina=$cap;

include "login-ingegroup.php";
echo "<br>";
$hashIngegroup=$cap;

include "login-lascondes.php";
echo "<br>";
$hashLasCondes=$cap;

include "login-zaldivar.php";
echo "<br>";
$hashZaldivar=$cap;

include "login-pullman.php";
echo "<br>";
$hashPullman=$cap;

include "login-bronces.php";
echo "<br>";
$hashLosBronces=$cap;

include "login-mel.php";
echo "<br>";
$hashMel=$cap;

include "login-camera.php";
echo "<br>";
$hashCamera=$cap;

date_default_timezone_set("America/Santiago");

$time= date('Y-m-d H:i:s');

include "conexion.php";



  
  $qryZal="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashZaldivar' WHERE (`id` = '4');";

  $resutaldo3 = mysqli_query($mysqli, $qryZal);

  $qryPull="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashPullman' WHERE (`id` = '5');";

  $resutaldo3 = mysqli_query($mysqli, $qryPull);

  $qryLosBronces="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashLosBronces' WHERE (`id` = '3');";

  $resutaldo4 = mysqli_query($mysqli, $qryLosBronces);

  $qryLasCondes="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashLasCondes' WHERE (`id` = '6');";

  $resutaldo4 = mysqli_query($mysqli, $qryLasCondes);

  $qryIngegroup="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashIngegroup' WHERE (`id` = '7');";

  $resutaldo4 = mysqli_query($mysqli, $qryIngegroup);

  $qryVina="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashVina' WHERE (`id` = '8');";

  $resutaldo4 = mysqli_query($mysqli, $qryVina);

  $qryParticulares="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashParticulares' WHERE (`id` = '9');";

  $resutaldo4 = mysqli_query($mysqli, $qryParticulares);


  $qryAraucania="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashAraucania' WHERE (`id` = '10');";

  $resutaldo4 = mysqli_query($mysqli, $qryAraucania);

  $qryVentana="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashVentana' WHERE (`id` = '11');";

  $resutaldo4 = mysqli_query($mysqli, $qryVentana);


  $qryCamera="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashCamera' WHERE (`id` = '12');";

  $resutaldo4 = mysqli_query($mysqli, $qryCamera);

  $qryMel="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hashMel' WHERE (`id` = '13');";

  $resutaldo4 = mysqli_query($mysqli, $qryMel);


?>