<?php

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
  CURLOPT_POSTFIELDS =>'hash=66cbb95a055fe999a4412061bc219705&title=Informe%20de%20viaje&trackers=%5B10171336%2C10174063%2C10174064%2C10174065%2C10174066%2C10174067%2C10174068%2C10174069%2C10174070%2C10174071%2C10174072%2C10174073%2C10174074%2C10174075%2C10174207%2C10174208%2C10174209%2C10174210%2C10174211%2C10174212%2C10181494%2C10181497%2C10189301%2C10189302%2C10192626%2C10192628%2C10192630%2C10192633%2C10192634%2C10192657%5D&from=2023-11-24%2000%3A00%3A00&to=2023-11-30%2023%3A59%3A59&time_filter=%7B%22from%22%3A%2200%3A00%3A00%22%2C%22to%22%3A%2223%3A59%3A59%22%2C%22weekdays%22%3A%5B1%2C2%2C3%2C4%2C5%2C6%2C7%5D%7D&plugin=%7B%22hide_empty_tabs%22%3Atrue%2C%22plugin_id%22%3A4%2C%22show_seconds%22%3Atrue%2C%22include_summary_sheet%22%3Atrue%2C%22include_summary_sheet_only%22%3Atrue%2C%22split%22%3Atrue%2C%22show_idle_duration%22%3Atrue%2C%22show_coordinates%22%3Atrue%2C%22filter%22%3Atrue%2C%22group_by_driver%22%3Afalse%7D',
  CURLOPT_HTTPHEADER => array(
    'authority: www.trackermasgps.com',
    'accept: */*',
    'accept-language: es-419,es;q=0.9,en;q=0.8',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: _ga=GA1.2.728367267.1665672802; session_key=66cbb95a055fe999a4412061bc219705; locale=es; _gid=GA1.2.257955206.1701695706; check_audit=66cbb95a055fe999a4412061bc219705; _ga_XXFQ02HEZ2=GS1.2.1701695707.74.1.1701695714.0.0.0',
    'origin: https://www.trackermasgps.com',
    'referer: https://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
    'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
