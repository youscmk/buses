<?php

//$user="IngeGroup";

//$pasw="123";



function Speed($user, $pasw)
{


  include "conexion.php";

  $consulta = "SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

  $resutaldo = mysqli_query($mysqli, $consulta);

  $data = mysqli_fetch_array($resutaldo);

  $hash = $data['hash'];
  //$hash="5b141c217d843e4667e54085a57eac51";

  date_default_timezone_set("America/Santiago");

  $hoy = date("Y-m-d");

  $ayer = date('Y-m-d', strtotime("-3 days"));

  //goto traerDatos;

  include "listadoSpeedTandem.php";


 
 


  $campos = 'hash=' . $hash . '
&title=Informe de violación de velocidad
&trackers=[10180284,10180528,10180706,10182417,10182698,10182708,10182730,10184147,10184148,10184149,10184150,10184151,10184152,10184153,10184154]
&from=2024-05-27 00:00:00
&to=2024-05-27 23:59:59
&time_filter={"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}
&plugin={"hide_empty_tabs":true,"plugin_id":27,"show_seconds":false,"min_duration_minutes":0,"max_speed":55,"group_by_driver":false,"filter":true}';

  

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
      CURLOPT_POSTFIELDS => 'hash=' . $hash . '&title=Informe%20de%20violaci%C3%B3n%20de%20velocidad&trackers=' . $ids . '&from=' . $ayer . '%2000%3A00%3A00&to=' . $ayer . '%2023%3A59%3A59&time_filter=%7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B1%2C2%2C3%2C4%2C5%2C6%2C7%5D%7D&plugin=%7B%22hide_empty_tabs%22%3Atrue%2C%22plugin_id%22%3A27%2C%22show_seconds%22%3Afalse%2C%22min_duration_minutes%22%3A1%2C%22max_speed%22%3A55%2C%22group_by_driver%22%3Afalse%2C%22filter%22%3Atrue%7D',

      CURLOPT_HTTPHEADER => array(
        'Accept: */*',
        'Accept-Language: es-419,es;q=0.9,en;q=0.8',
        'Connection: keep-alive',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'Cookie: _ga=GA1.2.728367267.1665672802; session_key=313bcf73d4cab8b8934bae1556b273e2; _gid=GA1.2.1549217858.1690386194; locale=es; check_audit=313bcf73d4cab8b8934bae1556b273e2; _ga_XXFQ02HEZ2=GS1.2.1690401308.12.1.1690401317.0.0.0',
        'Origin: http://www.trackermasgps.com',
        'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'
      ),
    ));





    $response = curl_exec($curl);

    curl_close($curl);
    $response;



    $arreglo = json_decode($response);

    $reporte = $arreglo->id;

    


    //traerDatos :

    //$reporte=1920703;

    Loop:

    sleep(10);


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
      CURLOPT_POSTFIELDS => 'hash=' . $hash . '&report_id=' . $reporte,
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


    $response = curl_exec($curl);

    curl_close($curl);

    $datos = json_decode($response);

    //$.report.sheets[0].header
    //$.report.sheets[0].entity_ids

    //$.report.sheets[0].sections[1].data[0].rows[0].duration.v
    //$.report.sheets[0].sections[1].data[0].rows[0].start_time.v
    //$.report.sheets[0].sections[1].data[0].rows[0].max_speed.v
    //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.location.lat
    //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.location.lng
    //$.report.sheets[0].sections[1].data[0].rows[0].max_speed_address.v

    //{"status":{"code":229,"description":"Requested data is not ready yet"},"success":false}

    if (isset($datos->report->sheets)) {


      $vehiculos = $datos->report->sheets;



      foreach ($vehiculos as $tracker) {


        $pat = $tracker->header;

        $id_tracker = $tracker->entity_ids[0];

        $eventos = $tracker->sections[1]->data[0]->rows;

        foreach ($eventos as $evento) {

          $direccion = $evento->max_speed_address->v;

          if (str_contains($direccion, 'Zona')) {

            $start_time = $evento->start_time->v;

            $duration = $evento->duration->v;

            $max_speed = $evento->max_speed->v;

            $lat = $evento->max_speed_address->location->lat;

            $lng = $evento->max_speed_address->location->lng;


            echo "<BR>";
            echo $txt = "'$id_tracker', '$pat', '$ayer', '$start_time', '$duration', '$max_speed', '$lat','$lng','$direccion'";
            echo "<BR>";

            $Qry = "INSERT INTO `masgps`.`tandemVelocidad` (`contrato`, `id_tracker`, `patente`, `fecha`, `start_time`, `duration`, `max_speed`, `lat`, `lng`,`direccion`) 
        VALUES ('$user', '$id_tracker', '$pat', '$ayer', '$start_time', '$duration', '$max_speed', '$lat', '$lng','$direccion');
        ";

            $ejecutar = mysqli_query($mysqli, $Qry);
          }
        }
      }
    } else {

      $response;
      goto Loop;
    }
    Fin:
  
  
}
