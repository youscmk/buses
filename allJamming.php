<?php


$user="Pullman";


$pasw="123";

include "login/conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($mysqli,$consulta);

$data=mysqli_fetch_array($resutaldo);

$hash=$data['hash'];

date_default_timezone_set("America/Santiago");

$hoy = date("Y-m-d");

$ayer=date('Y-m-d',strtotime("-1 days"));


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
  CURLOPT_POSTFIELDS =>'hash='.$hash.'&title=Informe%20de%20evento&trackers=%5B10180276%2C10180279%2C10180283%2C10180305%2C10180308%2C10180311%2C10180314%2C10180323%2C10180324%2C10180357%2C10180358%2C10180361%2C10180364%2C10180367%2C10180375%2C10180377%2C10180379%2C10180381%2C10180415%2C10180420%2C10180426%2C10180528%2C10180661%2C10180666%2C10180669%2C10180673%2C10180676%2C10180678%2C10180679%2C10180680%2C10180682%2C10180685%2C10180687%2C10180708%2C10180710%2C10180713%2C10180715%2C10180721%2C10180771%2C10180772%2C10180774%2C10180775%2C10180786%2C10181420%2C10181421%2C10181427%2C10181428%2C10181429%2C10181430%2C10181431%2C10181478%2C10181479%2C10181483%2C10181485%2C10181488%2C10181490%2C10181503%2C10181513%2C10181698%2C10181755%2C10181756%2C10181758%2C10181759%2C10181765%2C10181766%2C10181770%2C10181771%2C10181773%2C10181774%2C10181775%2C10181780%2C10181799%2C10181864%2C10181875%2C10181883%2C10181887%2C10181939%2C10182060%2C10182064%2C10182068%2C10182069%2C10182071%2C10182079%2C10182080%2C10182087%2C10182123%2C10182416%2C10182419%2C10182420%2C10182428%2C10182433%2C10182610%2C10182614%2C10182618%2C10182624%2C10182629%2C10182707%2C10182720%2C10182734%2C10182751%2C10182752%2C10182764%2C10182773%2C10182804%2C10183250%2C10183263%2C10183275%2C10183838%2C10183839%2C10183841%2C10183843%2C10185408%2C10185409%2C10185482%2C10185483%2C10185484%2C10185485%2C10185490%2C10185491%2C10185492%2C10185506%2C10185510%2C10185763%2C10185768%2C10185772%2C10185779%2C10185781%2C10185782%2C10185811%2C10185816%2C10185819%2C10185842%2C10186010%2C10187196%2C10187199%2C10187210%2C10187214%2C10187217%2C10187218%2C10187527%2C10187532%2C10187533%2C10187534%2C10187705%2C10188097%2C10188152%2C10188209%2C10188210%2C10188423%2C10188426%2C10188427%2C10188599%2C10188600%2C10188601%2C10188603%2C10188685%2C10188687%2C10188698%2C10188754%2C10188755%2C10188756%2C10188757%2C10188758%2C10188760%2C10188761%2C10189047%2C10189051%2C10189054%2C10189056%2C10189058%2C10189170%2C10189181%2C10189193%2C10189197%2C10189224%2C10189225%2C10189237%2C10189240%2C10189252%2C10189255%2C10189258%2C10189259%2C10189261%2C10189262%2C10189265%2C10189266%2C10189268%2C10189366%2C10189372%2C10189437%2C10189438%2C10189440%2C10189442%2C10189443%2C10189446%2C10189447%2C10189450%2C10189451%2C10189463%2C10189465%2C10189466%2C10189467%2C10189470%2C10189473%2C10189474%2C10189477%2C10189480%2C10189482%2C10189514%2C10189529%2C10189547%2C10189778%2C10189783%2C10189786%2C10189787%2C10189792%2C10189794%2C10189796%2C10189807%2C10189809%2C10189810%2C10189816%2C10189817%2C10189818%2C10189819%2C10189820%2C10190092%2C10190203%2C10190206%2C10190210%2C10190214%2C10190215%2C10190216%2C10190217%2C10190218%2C10190219%2C10190220%2C10190223%2C10190224%2C10190225%2C10190229%2C10190230%2C10190231%2C10190233%2C10190241%2C10190243%2C10190244%2C10190558%2C10190559%2C10190560%2C10190562%2C10190564%2C10190579%2C10190580%2C10190581%2C10190582%2C10190583%2C10190584%2C10190586%2C10190588%2C10190593%2C10190603%2C10190604%2C10190608%2C10190609%2C10190621%2C10191082%2C10191083%2C10191094%2C10191097%2C10191099%2C10191100%2C10191104%2C10191112%2C10191203%2C10191216%2C10191236%2C10191238%2C10191239%2C10191242%2C10191247%2C10191252%2C10191253%2C10191255%2C10191256%2C10191260%2C10191262%2C10191263%2C10191266%2C10191269%2C10191270%2C10192117%2C10192120%2C10192121%2C10192125%2C10192136%2C10192138%2C10192140%2C10192141%2C10192143%2C10192144%2C10192147%2C10192148%2C10192202%2C10192210%2C10192251%2C10192295%2C10192595%2C10196194%2C10196206%2C10196208%2C10196256%2C10196259%2C10196465%2C10196495%2C10196539%2C10196576%2C10196594%2C10202505%2C10202508%2C10202517%2C10202541%2C10202715%2C10202716%2C10204618%2C10204923%2C10204931%2C10207086%2C10207091%2C10207092%2C10180284%2C10180689%2C10180706%2C10182417%2C10182698%2C10182708%2C10182730%2C10184147%2C10184148%2C10184149%2C10184150%2C10184151%2C10184152%2C10184153%2C10184154%2C10184155%2C10184156%2C10185487%2C10185488%2C10185489%2C10185501%2C10185765%2C10185766%2C10185793%2C10185814%2C10185837%2C10185841%2C10187193%2C10187200%2C10187219%2C10187415%2C10187416%2C10187418%2C10187422%2C10187424%2C10187425%2C10187426%2C10187525%2C10187528%2C10187529%2C10187530%2C10187531%2C10189202%2C10189254%2C10189478%2C10190205%2C10190209%2C10190605%2C10190607%2C10191084%2C10191213%2C10192135%2C10193887%2C10195912%2C10196191%2C10196192%2C10196196%2C10196199%2C10196200%2C10196201%2C10196203%2C10196205%2C10196207%2C10196209%2C10196210%2C10196211%2C10196212%2C10196214%2C10196216%2C10196218%2C10196219%2C10196220%2C10196221%2C10196222%2C10196223%2C10196226%2C10196227%2C10196228%2C10196229%2C10196230%2C10196231%2C10196232%2C10196233%2C10196234%2C10196237%2C10196238%2C10196239%2C10196241%2C10196242%2C10196245%2C10196248%2C10196249%2C10196250%2C10196254%2C10196255%2C10196257%2C10196258%2C10196260%2C10196261%2C10196397%2C10196399%2C10196400%2C10196412%2C10196414%2C10196415%2C10196418%2C10196420%2C10196421%2C10196425%2C10196427%2C10196429%2C10196431%2C10196437%2C10196469%2C10196471%2C10196473%2C10196474%2C10196476%2C10196487%2C10196489%2C10196492%2C10196493%2C10196494%2C10196499%2C10196502%2C10196515%2C10196520%2C10196521%2C10196528%2C10196530%2C10196531%2C10196534%2C10196537%2C10196541%2C10196543%2C10196547%2C10196548%2C10196549%2C10196550%2C10196551%2C10196552%2C10196553%2C10196555%2C10196556%2C10196557%2C10196558%2C10196560%2C10196561%2C10196562%2C10196563%2C10196564%2C10196565%2C10196566%2C10196575%2C10196578%2C10196580%2C10196581%2C10196583%2C10196584%2C10196587%2C10196588%2C10196590%2C10196591%2C10196592%2C10196593%2C10201705%2C10202042%2C10202055%2C10202057%2C10202059%2C10202061%2C10202082%2C10202131%2C10202135%2C10202163%2C10202173%2C10202191%2C10202273%2C10202274%2C10202275%2C10202286%2C10202287%2C10202288%2C10202289%2C10202307%2C10202308%2C10202368%2C10202369%2C10202370%2C10202385%2C10202386%2C10203169%2C10204598%2C10207366%2C10207368%2C10208028%2C10209030%2C10209398%2C10209407%2C10209408%2C10209410%2C10209411%2C10209414%2C10209415%2C10209416%2C10209418%2C10209428%2C10209429%2C10209432%2C10209462%2C10209463%2C10209464%2C10209465%2C10209466%2C10209481%2C10209483%2C10209485%2C10209490%2C10209517%2C10209541%2C10209542%2C10209544%2C10209552%2C10209553%2C10209554%2C10209555%2C10209559%2C10209560%2C10209561%2C10209877%2C10210547%2C10180686%2C10181781%2C10181787%2C10181791%2C10181793%2C10181795%2C10181797%2C10181852%2C10181854%2C10181862%2C10181863%2C10181884%2C10181896%2C10181917%2C10181925%2C10181928%2C10181930%2C10181935%2C10181936%2C10181938%2C10182081%2C10182082%2C10182083%2C10182085%2C10182570%2C10182572%2C10182578%2C10182630%2C10187417%2C10187435%2C10187526%2C10187609%2C10187678%2C10189055%2C10189172%2C10189173%2C10189175%2C10189177%2C10189246%2C10189247%2C10189248%2C10189251%2C10189345%2C10189351%2C10189361%2C10189363%2C10189365%2C10189476%2C10189570%2C10189766%2C10189780%2C10189790%2C10190095%2C10190207%2C10190208%2C10190234%2C10190235%2C10190237%2C10190239%2C10190589%2C10190591%2C10190595%2C10190596%2C10190610%2C10190622%2C10190625%2C10191103%2C10191105%2C10191107%2C10191108%2C10191109%2C10191113%2C10191204%2C10191205%2C10191208%2C10191209%2C10191210%2C10191212%2C10191222%2C10191227%2C10191230%2C10191232%2C10191233%2C10191234%2C10192115%2C10192130%2C10192132%2C10192134%2C10192242%2C10192245%2C10192246%2C10192247%2C10192249%2C10192279%2C10192286%2C10192288%2C10192291%2C10192292%2C10192596%2C10192597%2C10192598%2C10193766%2C10196197%2C10196252%2C10204620%2C10204925%2C10205706%2C10208019%2C10208020%2C10208021%2C10208022%2C10208328%2C10208333%2C10208345%2C10180690%2C10182728%2C10196198%5D&from='.$ayer.'%2000%3A00%3A00&to='.$ayer.'%2023%3A59%3A59&time_filter=%7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B1%2C2%2C3%2C4%2C5%2C6%2C7%5D%7D&plugin=%7B%22hide_empty_tabs%22%3Atrue%2C%22plugin_id%22%3A11%2C%22show_seconds%22%3Afalse%2C%22group_by_type%22%3Afalse%2C%22event_types%22%3A%5B%22force_location_request%22%2C%22info%22%2C%22output_change%22%5D%7D',
  CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.291072554.1690211388; locale=es; session_key=313bcf73d4cab8b8934bae1556b273e2; check_audit=313bcf73d4cab8b8934bae1556b273e2; _ga_XXFQ02HEZ2=GS1.2.1690216070.10.1.1690216622.0.0.0',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'
  ),
));

$response = curl_exec($curl);

$arreglo=json_decode($response);






$reporte=$arreglo->id;

curl_close($curl);



sleep(15);

//$response1=1444317;


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
  CURLOPT_POSTFIELDS =>'hash='.$hash.'&report_id='.$reporte,
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

$datos=json_decode($response);

//print_r($datos);


//$.report.sheets[0].sections[0].data[0].rows[0].address.location.lat
//$.report.sheets[0].sections[0].data[0].rows[0].address.location.lng
//$.report.sheets[0].sections[0].data[0].rows[0].address.location.address
//$.report.sheets[0].sections[0].data[0].rows[0].time.v
//$.report.sheets[0].sections[0].data[0].rows[0].event.v


 $trackers=$datos->report->sheets;

 foreach ($trackers as $tracker){

          Echo
          $pat=$tracker->header ;
          $id=$tracker->entity_ids[0] ;
       

         $items=$tracker->sections[0]->data[0]->rows;


         foreach ($items as $item){
            
            if($item->event->v='Inicio Detección de Jamming'){

             $evento=$item->event->v ;
           
             $fecha=$item->time->v ;

             $objeto_fecha_hora = DateTime::createFromFormat('d/m/Y H:i', $fecha);
             $fecha_hora_formateada = $objeto_fecha_hora->format('Y-m-d H:i');

             $lat=$item->address->location->lat;
             $lng=$item->address->location->lng;
             "<br>";

             $Q_insert="INSERT INTO `masgps`.`jamming` (`id_tracker`, `patente`, `evento`, `fecha`, `lat`, `lng`) VALUES ('$id', '$pat', '$evento', '$fecha_hora_formateada', '$lat', '$lng')";

            

            

          


             $ejecutar = mysqli_query($mysqli, $Q_insert);


             }


            }
            
         }



 

 fin: