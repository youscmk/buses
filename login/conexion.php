<?php

//Conexion clase MYSQL
// $obtejoconexion= new MYSQLI(servidor, usuario, password, basedatos);
$mysqli = new mysqli('ls-233cbb9833b65f1d81c7123bc6f953c2597da307.cwdutvqwihot.us-east-1.rds.amazonaws.com','dbmasteruser','J&ye#Ve3*f8dYR~XP~8V(uAj0%Xs|Pe2','masgps-telemetria');
if($mysqli->connect_errno >0){
    die("Error en la conexión". $mysqli->connect_error);
}