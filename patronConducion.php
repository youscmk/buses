<?php


//$hash="8b566d9b188d7d1189b3a07d1f4f458f";
//$from="2023-06-19 00:00:00";
$fromUrl=urlencode($from);
//$to="2023-06-19 23:59:59";
$toUrl=urlencode($to);
//$id_tracker="10196474"; 
$tracker=urlencode("[$id_tracker]");
$speedLimited="55";



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
  CURLOPT_POSTFIELDS =>'hash='.$hash.'&plugin=%7B%22harsh_driving_penalties%22%3A%7B%22harshAcceleration%22%3A5%2C%22harshBraking%22%3A5%2C%22harshTurn%22%3A5%2C%22harshAccelerationNTurn%22%3A12%2C%22harshBrakingNTurn%22%3A12%2C%22harshQuickLaneChange%22%3A12%7D%2C%22speeding_penalties%22%3A%7B%2210%22%3A10%2C%2220%22%3A20%2C%2230%22%3A20%2C%2250%22%3A30%7D%2C%22speed_limit%22%3A55%2C%22idling_penalty%22%3A5%2C%22min_idling_duration%22%3A5%2C%22min_speeding_duration%22%3A1%2C%22check_road_rules_violations%22%3Afalse%2C%22use_vehicle_speed_limit%22%3Atrue%2C%22plugin_id%22%3A46%2C%22show_seconds%22%3Afalse%7D&time_filter=%7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B6%2C7%2C4%2C1%2C2%2C3%2C5%5D%7D&from='.$fromUrl.'&to='.$toUrl.'&trackers='.$tracker.'&plugin_id=46&type=service',
  CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: _ga=GA1.2.728367267.1665672802; session_key=8b566d9b188d7d1189b3a07d1f4f458f; _gid=GA1.2.904423925.1687462453; locale=es; _ga_XXFQ02HEZ2=GS1.2.1687462455.1.1.1687462503.0.0.0',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/pro/applications/fleet/index.html?newuiwrap=1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'
  ),
));

$informe = curl_exec($curl);

$json=json_decode($informe);

if(isset($json->id)){

  echo
$reporte=$json->id;

  echo"<br>";

curl_close($curl);

//$reporte="1409269";

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
  CURLOPT_POSTFIELDS =>'hash=8b566d9b188d7d1189b3a07d1f4f458f&report_id='.$reporte.'',
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

$response = curl_exec($curl); //**** */$.report.sheets[1].sections[0].text 


curl_close($curl);

$json2=json_decode( $response);

 if(isset($json2->report->sheets[1]->sections[2]->data[0]->rows)){

$velocidades=$json2->report->sheets[1]->sections[2]->data[0]->rows ;

$i=0;

foreach ($velocidades as $item){

  //print_r($item);

    if(isset($item->max_speed)){
 
    $max_speed= $item->max_speed->v ;
    $duration= $item->duration->v ;
    $start_time= $item->start_time->v;
    $max_speed_address=$item->max_speed_address->v;
    $lat=$item->max_speed_address->location->lat;
    $lng=$item->max_speed_address->location->lng;

    
    $salida =array (

      'id_tracker'=>$id_tracker,
      'patente'=>$patente,
      'chofer'=>$chofer,
       'id_servicio'=>$id_servicio,
       'servicio'=>$servicio,
      'from'=>$from,
      'to'=>$to,
      'max_speed'=>$max_speed,
      'duration'=>$duration,
      'start_time'=>$start_time,
      'max_speed_address'=>$max_speed_address,
      'lat'=>$lat,
      'lng'=>$lng

      
    );
    
    $QRY="INSERT INTO `masgps`.`speed` (`contrato`, `id_tracker`, `patente`, `chofer`, `id_servicio`, `servicio`, `from`, `to`, `max_speed`, `duration`, `start_time`, `max_speed_address`, `lat`, `lng`,`fecha`) VALUES
     ('ICT-002','$id_tracker', '$patente', '$chofer', '$id_servicio', '$servicio','$from', '$to', $max_speed, '$duration', '$start_time', '$max_speed_address', '$lat', '$lng','$fecha_servicio_formateada')";


    $res= mysqli_query($mysqli,$QRY);

    $total[$i]=$salida;

    $i++;
  };
};
};
};




//INSERT INTO `masgps`.`speed` (`contrato`, `id_tracker`, `patente`, `chofer`, `id_servicio`, `servicio`, `from`, `to`, `max_speed`, `duration`, `start_time`, `max_speed_address`, `lat`, `lng`)
// VALUES ('ICT-002', '12345', 'HHHH-56', 'ASDFGHJ TYUI FGHJ', '34567', 'SDFGHJK THJK GHJ', '2023-06-28 05:45:00', '2023-06-28 08:30:00', '85', '00:10', '07:00', 'Alto Las Condes, Avenida Presidente Kennedy, 9001, Las Condes, Región Metropolitana de Santiago, Chile, 7650191', '-33.38952', '-70.5475616');




// $.report.sheets[1].sections.[2].header    (titulo)  "Las violaciones de la velocidad (con duración de 1+ min.)"
// $.report.sheets[1].sections.[2].data.[0].header
// $.report.sheets[1].sections.[2].data[0].rows[0].speed_limit.v
// $.report.sheets[1].sections.[2].data[0].rows[0].duration.v
// $.report.sheets[1].sections.[2].data[0].rows[0].start_time.v
// $.report.sheets[1].sections.[2].data[0].rows[0].max_speed_address.v
// $.report.sheets[1].sections.[2].data[0].rows[0].max_speed_address.location.lat
//$.report.sheets[1].sections.[2].data[0].rows[0].max_speed_address.location.lng



// $.report.sheets[1].sections.[3].header   "Ralentí (con duración de 5+ min.)"
// $.report.sheets[1].sections.[3].columns
// $.report.sheets[1].sections.[3].data
//$.report.sheets[1].sections.[3].data.[0].rows[0].duration.v
//$.report.sheets[1].sections.[3].data.[0].rows[0].start_time.v
//$.report.sheets[1].sections.[3].data.[0].rows[0].event_address.v
//$.report.sheets[1].sections.[3].data.[0].rows[0].event_address.location.lat
//$.report.sheets[1].sections.[3].data.[0].rows[0].event_address.location.lng


/*
hash: 8b566d9b188d7d1189b3a07d1f4f458f
plugin: %7B%22harsh_driving_penalties%22%3A%7B%22harshAcceleration%22%3A5%2C%22harshBraking%22%3A5%2C%22harshTurn%22%3A5%2C%22harshAccelerationNTurn%22%3A12%2C%22harshBrakingNTurn%22%3A12%2C%22harshQuickLaneChange%22%3A12%7D%2C%22speeding_penalties%22%3A%7B%2210%22%3A10%2C%2220%22%3A20%2C%2230%22%3A20%2C%2250%22%3A30%7D%2C%22speed_limit%22%3A55%2C%22idling_penalty%22%3A5%2C%22min_idling_duration%22%3A5%2C%22min_speeding_duration%22%3A1%2C%22check_road_rules_violations%22%3Afalse%2C%22use_vehicle_speed_limit%22%3Atrue%2C%22plugin_id%22%3A46%2C%22show_seconds%22%3Afalse%7D
time_filter: %7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B6%2C7%2C4%2C1%2C2%2C3%2C5%5D%7D
from: 2023-06-19%2000%3A00%3A00
to: 2023-06-19%2023%3A59%3A59
trackers: %5B10196474%5D
plugin_id: 46
type: service

hash: 8b566d9b188d7d1189b3a07d1f4f458f
plugin: {"harsh_driving_penalties":{"harshAcceleration":5,"harshBraking":5,"harshTurn":5,"harshAccelerationNTurn":12,"harshBrakingNTurn":12,"harshQuickLaneChange":12},"speeding_penalties":{"10":10,"20":20,"30":20,"50":30},"speed_limit":55,"idling_penalty":5,"min_idling_duration":5,"min_speeding_duration":1,"check_road_rules_violations":false,"use_vehicle_speed_limit":true,"plugin_id":46,"show_seconds":false}
time_filter: {"from":"00:00","to":"23:59","weekdays":[6,7,4,1,2,3,5]}
from: 2023-06-19 00:00:00
to: 2023-06-19 23:59:59
trackers: [10196474]
plugin_id: 46
type: service

*/

