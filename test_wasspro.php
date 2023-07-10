<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.whatspro.la/v1/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"phone\":\"+56950906625\",\"message\":\"Hola este es un mensaje de tes para Caja Ande 😀\"}",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Token: 9db5765ad945eb5b106ecc549ec63f47c91a35a9d440fc45aa8d0cab5f1bd083871c53931c3feaa1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}