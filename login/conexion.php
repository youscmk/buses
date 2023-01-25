<?php

//Conexion clase MYSQL
// $obtejoconexion= new MYSQLI(servidor, usuario, password, basedatos);
$mysqli = new mysqli('localhost','root','','masgps-telemetria');
if($mysqli->connect_errno >0){
    die("Error en la conexión". $mysqli->connect_error);
}