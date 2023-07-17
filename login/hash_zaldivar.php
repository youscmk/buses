<?php 

include "login-zaldivar.php";

$hash=$cap;

include "conexion.php";



  $consulta = "UPDATE `masgps`.`hash` SET `hash` = '$hash' WHERE (`id` = '4');";

  $resutaldo3 = mysqli_query($mysqli, $consulta);



?>