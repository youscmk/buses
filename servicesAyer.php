<?php 
$user="losBronces";

$pasw="123";

include "./login/conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$hash=$data['hash'];

include "tandemAgeListado.php";

date_default_timezone_set("America/Santiago");

$hoy = date("d/m/Y");

 $ayer=date('d/m/Y',strtotime("yesterday"));

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://sistema.pullmanindustrial.cl/funciones/STM00002/ajax.php?funcion=TraeViajesAsg&sistema=U1RNMDAwMDI=&formulario=RlJNX0NPTlNVTFRBVklBSkVT&FechaDesde='.$ayer.'&FechaHasta='.$ayer.'&CboServicio=Todos&CboChofer=Todos&CboPatente=Todos&CboEstado=Todos&horadesde=00:00&horahasta=24:00&contrato=ICT002&bloqueo=SI',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'funcion=buscar',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: PHPSESSID=d6rm39d0d48pl2ptvbb7k2dnl3',
    'Origin: http://sistema.pullmanindustrial.cl',
    'Referer: http://sistema.pullmanindustrial.cl/trafico.php?sistema=U1RNMDAwMDI=&formulario=RlJNX0NPTlNVTFRBVklBSkVT&contrato=ICT002',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
    'X-Requested-With: XMLHttpRequest'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$array=json_decode($response);

$k=0;



foreach ($array as $item){

  $id_servicio= $item->codigoviaje ;
  $patente= $item->maquina ;
  $chofer=$item->chofer;
  $servicio=$item->identificacion;

   $fecha_servicio= $item->fechaviaje;
   $fecha_servicio2=date_create_from_format('d-m-Y', $fecha_servicio);
   $fecha_servicio_formateada=date_format($fecha_servicio2, 'Y-m-d');

   $hora_salida= $item->hora_salida;
   $hora_llegada= $item->hora_llegada;

   $from="$fecha_servicio_formateada $hora_salida:00";
   $to="$fecha_servicio_formateada $hora_llegada:00";

  $fila = array_values(

    array_filter(

      $listado,
      function ($item2) use ($patente) {

        return $item2['patente'] == $patente;
      }
    )
  );
  
  if(isset($fila[0]['id_tracker'])){
    echo

    $id_tracker=$fila[0]['id_tracker'];
    echo"-";
  
    include "./patronConducion.php";
    
    if(isset($total)){

      $TOTAL2[$k]=$total;
   
      $k++;
    };

  };

  






}



 echo json_encode($TOTAL2);
