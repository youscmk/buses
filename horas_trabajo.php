<?php

include "./login/login.php";
echo"<br>";

include "./listadoBusesHorasMotor.php";
// genera informe

// $iiiiii= 10177116 .",". 10177117 .",". 10177118 .",". 10177119 .",". 10177120 . "," . 10177121 . "," . 10177122 .",". 10177123;



$hash=$cap;
$title=urlencode('Informe de horas de motor');
$trackers=urlencode('['.$tracketeando.']');
$from=urlencode('2023-01-03 00:00:00');
$to=urlencode('2023-01-03 23:59:59');
$time_filter=urlencode('{"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}');
$plugin=urlencode('{"hide_empty_tabs":true,"plugin_id":7,"show_seconds":false,"show_detailed":false,"include_summary_sheet_only":false,"filter":true}');

$cadena='hash='.$cap.'&title='.$title.'&trackers='.$trackers.'&from='.$from.'&to='.$to.'&time_filter='.$time_filter.'&plugin='.$plugin;

echo"<br>";


//hash=16adbc47941655ecc1a34cdf0a9d28fb&title=Informe de horas de motor&trackers=[10177117]&from=2023-01-01 00:00:00&to=2023-01-07 23:59:59&time_filter={"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}&plugin={"hide_empty_tabs":true,"plugin_id":7,"show_seconds":false,"show_detailed":false,"include_summary_sheet_only":false,"filter":true}





echo"<br>";
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
//echo $informe;


?>