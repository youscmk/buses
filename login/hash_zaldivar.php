<?php 

include "login-zaldivar.php";

$hash=$cap;

date_default_timezone_set("America/Santiago");

$time= date('Y-m-d H:i:s');

include "conexion.php";



  
  $qry="UPDATE `masgps`.`hash` SET `timestamp` = '$time', `hash` = '$hash' WHERE (`id` = '4');";

  $resutaldo3 = mysqli_query($mysqli, $qry);



?>