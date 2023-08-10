
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
  CURLOPT_POSTFIELDS =>'hash=0546367ce85a765c7e7aff60ecce2cbe&title=Informe%20de%20evento&trackers=%5B10182708%2C10196192%2C10196218%2C10196242%2C10196418%2C10196431%2C10196471%2C10196473%2C10196474%2C10196487%2C10196489%2C10196494%2C10196521%2C10196551%2C10196578%2C10196581%2C10196593%5D&from=2023-08-01%2000%3A00%3A00&to=2023-08-08%2023%3A59%3A59&time_filter=%7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B1%2C2%2C3%2C4%2C5%2C6%2C7%5D%7D&plugin=%7B%22hide_empty_tabs%22%3Atrue%2C%22plugin_id%22%3A11%2C%22show_seconds%22%3Afalse%2C%22group_by_type%22%3Atrue%2C%22event_types%22%3A%5B%22auto_geofence_in%22%2C%22auto_geofence_out%22%2C%22cruise_control_off%22%2C%22cruise_control_on%22%2C%22attach%22%2C%22door_alarm%22%2C%22forward_collision_warning%22%2C%22gps_lost%22%2C%22gps_recover%22%2C%22gsm_damp%22%2C%22gps_damp%22%2C%22harsh_driving%22%2C%22headway_warning%22%2C%22hood_alarm%22%2C%22idle_end%22%2C%22idle_start%22%2C%22ignition%22%2C%22inroute%22%2C%22outroute%22%2C%22lane_departure%22%2C%22obd_plug_in%22%2C%22obd_unplug%22%2C%22odometer_set%22%2C%22online%22%2C%22over_speed_reported%22%2C%22output_change%22%2C%22peds_collision_warning%22%2C%22peds_in_danger_zone%22%2C%22security_control%22%2C%22tracker_rename%22%2C%22track_end%22%2C%22track_start%22%2C%22tsr_warning%22%2C%22sensor_inrange%22%2C%22sensor_outrange%22%2C%22work_status_change%22%2C%22call_button_pressed%22%2C%22driver_changed%22%2C%22driver_identified%22%2C%22driver_not_identified%22%2C%22fueling%22%2C%22drain%22%2C%22checkin_creation%22%2C%22tacho%22%2C%22antenna_disconnect%22%2C%22check_engine_light%22%2C%22location_response%22%2C%22backup_battery_low%22%2C%22distance_breached%22%2C%22distance_restored%22%2C%22excessive_parking%22%2C%22excessive_parking_finished%22%2C%22excessive_driving_start%22%2C%22excessive_driving_end%22%2C%22driver_absence%22%2C%22driver_enter%22%2C%22state_field_control%22%2C%22inzone%22%2C%22outzone%22%2C%22speedup%22%2C%22alarmcontrol%22%2C%22battery_off%22%2C%22bracelet_close%22%2C%22bracelet_open%22%2C%22case_closed%22%2C%22case_opened%22%2C%22crash_alarm%22%2C%22detach%22%2C%22g_sensor%22%2C%22input_change%22%2C%22light_sensor_bright%22%2C%22light_sensor_dark%22%2C%22lock_closed%22%2C%22lock_opened%22%2C%22lowpower%22%2C%22offline%22%2C%22parking%22%2C%22poweroff%22%2C%22poweron%22%2C%22sos%22%2C%22strap_bolt_cut%22%2C%22strap_bolt_ins%22%2C%22vibration_start%22%2C%22vibration_end%22%2C%22fatigue_driving%22%2C%22fatigue_driving_finished%22%2C%22driver_distraction_started%22%2C%22driver_distraction_finished%22%2C%22external_device_connected%22%2C%22external_device_disconnected%22%2C%22proximity_violation_start%22%2C%22proximity_violation_end%22%2C%22no_movement%22%2C%22force_location_request%22%2C%22info%22%5D%7D',
  CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.2094478458.1691524041; locale=es; session_key=0546367ce85a765c7e7aff60ecce2cbe; check_audit=0546367ce85a765c7e7aff60ecce2cbe; _ga_XXFQ02HEZ2=GS1.2.1691524044.13.1.1691524092.0.0.0',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

//$.report.sheets[2].entity_ids[0] 
//


//hash: 0546367ce85a765c7e7aff60ecce2cbe
//title: Informe de evento
//trackers: [10182708,10196192,10196218,10196242,10196418,10196431,10196471,10196473,10196474,10196487,10196489,10196494,10196521,10196551,10196578,10196581,10196593]
//from: 2023-07-01 00:00:00
//to: 2023-07-31 23:59:59
//time_filter: {"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}
//plugin: {"hide_empty_tabs":true,"plugin_id":11,"show_seconds":false,"group_by_type":false,"event_types":["over_speed_reported","speedup","auto_geofence_in","harsh_driving","lane_departure"]}