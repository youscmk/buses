<?php 



$fromUrl=urlencode($from);

$toUrl=urlencode($to);
$tracker=urlencode("[$id_tracker]");
$speedLimited="55";
$title=urlencode('Informe de horas de motor');
$trackers=urlencode('['.$id_tracker.']');
$time_filter=urlencode('{"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}');
$plugin=urlencode('{"hide_empty_tabs":true,"plugin_id":7,"show_seconds":false,"show_detailed":false,"include_summary_sheet_only":false,"filter":true}');
 
$cadena='hash='.$hash.'&title='.$title.'&trackers='.$trackers.'&from='.$fromUrl.'&to='.$toUrl.'&time_filter='.$time_filter.'&plugin='.$plugin;

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
  CURLOPT_POSTFIELDS =>$cadena,
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

$json=json_decode($informe);

if (isset($json->id)) {


  $reporte = $json->id;

  curl_close($curl);



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
    CURLOPT_POSTFIELDS => 'hash=' . $hash . '&report_id=' . $reporte . '',
    CURLOPT_HTTPHEADER => array(
      'Accept: */*',
      'Accept-Language: es-419,es;q=0.9,en;q=0.8',
      'Connection: keep-alive',
      'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
      'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.183718605.1679328823; locale=es; session_key=cf290712c61924284913e1af01cfaded; check_audit=cf290712c61924284913e1af01cfaded; date_format=m-d-Y; date_format_moment=MM-DD-YYYY',
      'Origin: http://www.trackermasgps.com',
      'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
      'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36'
    ),
  ));

  $responsee = curl_exec($curl);

  curl_close($curl);

  $json2 = json_decode($responsee);

  if (isset($json2->report->sheets[1]->sections[3]->data[0]->rows[0])) {


    $ralenti = $json2->report->sheets[1]->sections[3]->data[0]->rows[0];

    $duration = $ralenti->duration->v;
    $in_movement = $ralenti->in_movement->v;
    $idle = $ralenti->idle->v;

  

   // echo "$id_tracker,$patente,$from,$to,$duration,$in_movement,$idle <br>";

    $QRY="INSERT INTO `masgps`.`informeRalenti` ( `contrato`, `id_tracker`, `patente`,  `fecha`, `duration`, `in_movement`, `idle` ) VALUES 
    ('$user', '$id_tracker', '$patente',  '$ayer', '$duration', '$in_movement', '$idle' )";
  
      echo " $ayer $patente   <br>";
    $res= mysqli_query($mysqli,$QRY);

  }
}


?>