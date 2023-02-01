<?php

include "./login/login.php";
include "./listadoBuses.php";
include "./login/conexion.php";


$k = 0;

foreach ($id_trackers as $movil) {

  $movil . ' <br> ';
  $pat = $patentes[$k];
  $k++;



  $bus = $movil;
  $ayer = date("Y-m-d", strtotime("yesterday"));
  $hash = $cap;
  $title = urlencode('Informe de violación de velocidad');
  //$trackers=10184146 ;
  $trackers = urlencode("[$bus]");
  $from = urlencode("$ayer 00:00:00");
  $to = urlencode("$ayer 23:59:59");
  $time_filter = urlencode('{"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}');
  $plugin = urlencode('{"hide_empty_tabs":true,"plugin_id":27,"show_seconds":false,"min_duration_minutes":0,"max_speed":50,"group_by_driver":false,"filter":true}');

  $cadena = 'hash=' . $cap . '&title=' . $title . '&trackers=' . $trackers . '&from=' . $from . '&to=' . $to . '&time_filter=' . $time_filter . '&plugin=' . $plugin;

  echo "<br>";


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/report/tracker/generate',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $cadena,
    CURLOPT_HTTPHEADER => array(
      'Accept: */*',
      'Accept-Language: es-419,es;q=0.9,en;q=0.8',
      'Connection: keep-alive',
      'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
      'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.2074084279.1673293555; locale=es; session_key=16adbc47941655ecc1a34cdf0a9d28fb; check_audit=16adbc47941655ecc1a34cdf0a9d28fb',
      'Origin: http://www.trackermasgps.com',
      'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
    ),
  ));

  $informe = curl_exec($curl);

  curl_close($curl);
  $informe;

  $json = json_decode($informe);

  $id_informe = $json->id;



  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/report/tracker/retrieve',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'hash=' . $cap . '&report_id=' . $id_informe,
    CURLOPT_HTTPHEADER => array(
      'Accept: */*',
      'Accept-Language: es-419,es;q=0.9,en;q=0.8',
      'Connection: keep-alive',
      'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
      'Cookie: _ga=GA1.2.728367267.1665672802; locale=es; _gid=GA1.2.621312682.1672338026; session_key=b353a9505ad2379b3924ddd5597be1df; check_audit=b353a9505ad2379b3924ddd5597be1df',
      'Origin: http://www.trackermasgps.com',
      'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  $json2 = json_decode($response);
  // desglose del $response con jsonpath
  //echo $response;
  //$.report.sheets[0].sections[1].header titulo
  //$.report.sheets[0].sections[1].data[0].rows[0] filas
  //$.report.sheets[0].sections[1].data[0].rows[0].duration.v
  //$.report.sheets[0].sections[1].data[0].rows[0].start_time.v
  //$.report.sheets[0].sections[1].data[0].rows[0].max_speed.v
  //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.v  (direccion)
  //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.location.lat
  //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.location.lng

  

  if ($json2->report->sheets[0]->header <> "No hay datos") {

    echo $json2->report->sheets[0]->sections[1]->header;
    echo "<br>";


    $rows = $json2->report->sheets[0]->sections[1]->data[0]->rows;

    foreach ($rows as $element) {
    
      $id_v = '';

      echo $pat . ' / ';
      echo $ayer . ' / ';
      echo $vel_max = $element->max_speed->v . ' / ';
      echo $duracion = $element->duration->v . ' / ';
      echo $hora = $element->start_time->v . ' / ';
      echo $direcc = $element->max_speed_address->v . ' / ';
      $direcc1 = addslashes($direcc);
      echo $lat = $element->max_speed_address->location->lat . ' / ';
      echo $lng = $element->max_speed_address->location->lng;
      echo "<br>";

      $sql = "INSERT INTO reporte_velocidad (patente, fecha, vel_max, duracion, hora, direcc, latitude, longitude) VALUES ('$pat', '$ayer', '$vel_max', '$duracion', '$hora', '$direcc1', '$lat', '$lng')";

      $datosduplicados = mysqli_query($mysqli, "SELECT * FROM reporte_velocidad WHERE latitude='$lat' AND longitude='$lng' AND hora='$hora'");


      if (mysqli_num_rows($datosduplicados) > 0) {
      } else {

        $ejecutar = mysqli_query($mysqli, $sql);
      }
    }
  }
}
?>